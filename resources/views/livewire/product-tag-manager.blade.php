<div>
    @if($message = Session::get('success'))
        <x-alert type="success" :message="$message"></x-alert>
    @endif

    <x-admin_card>
        <x-slot:card_title> List </x-slot>
        <x-slot:card_tools>
            <a class="btn btn-primary btn-sm" href="{{ route('product.create')}}">
                <i class="fas fa-plus"></i> Create
            </a>
        </x-slot>
        <x-slot:card_body>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Order No</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->order_no }}</td>
                            <td>
                                @forelse($product->tags as $tag)
                                    <span class="badge badge-info">{{ $tag->title }}</span>
                                @empty
                                    <span class="text-muted">No tags</span>
                                @endforelse
                            </td>
                            <td>
                                @if($product->status == 0)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <x-admin_editbtn>
                                    <x-slot:edit_link>
                                        {{ route('product.edit', $product->id) }}
                                    </x-slot>
                                </x-admin_editbtn>

                                @if($product->status == 0)
                                    <x-admin_changestatusbtn>
                                        <x-slot:status_link>{{ route('product.status', $product->id) }}</x-slot>
                                        <x-slot:status_class>btn-success</x-slot>
                                        <x-slot:status_text>Active</x-slot>
                                    </x-admin_changestatusbtn>
                                @else
                                    <x-admin_changestatusbtn>
                                        <x-slot:status_link>{{ route('product.status', $product->id) }}</x-slot>
                                        <x-slot:status_class>btn-danger</x-slot>
                                        <x-slot:status_text>Inactive</x-slot>
                                    </x-admin_changestatusbtn>
                                @endif

                                <button 
                                    type="button"
                                    class="btn btn-flat btn-sm btn-secondary"
                                    wire:click="openTagModal({{ $product->id }})"
                                    wire:loading.attr="disabled"
                                    wire:target="openTagModal({{ $product->id }})"
                                >
                                    <span wire:loading.remove wire:target="openTagModal({{ $product->id }})">
                                        <i class="fas fa-tags"></i>
                                    </span>

                                    <span wire:loading wire:target="openTagModal({{ $product->id }})">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                </button>

                                <button
                                    type="button"
                                    class="btn btn-flat btn-sm btn-info"
                                    wire:click="openQrCodeModal({{ $product->id }})"
                                    wire:loading.attr="disabled"
                                    wire:target="openQrCodeModal({{ $product->id }})"
                                    title="{{ $product->qr_codes_count ? 'View QR codes' : 'Create QR code' }}"
                                >
                                    <span wire:loading.remove wire:target="openQrCodeModal({{ $product->id }})">
                                        <i class="fas fa-qrcode"></i>
                                    </span>

                                    <span wire:loading wire:target="openQrCodeModal({{ $product->id }})">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                </button>

                                <x-admin_showbtn>
                                    <x-slot:show_link>
                                        {{ route('product.show', $product->id) }}
                                    </x-slot>
                                </x-admin_showbtn>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-slot>
    </x-admin_card>

    <x-admin_modal name="product-tags" title="Manage Tags">
        <x-slot:modalBody>
            <div class="mb-2"><strong>Product:</strong> {{ $tagProductName }}</div>
            <div class="row">
                @forelse($allTags as $tag)
                    <div class="col-6 col-md-4">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" wire:model.defer="selectedTags">
                            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->title }}</label>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <span class="text-muted">No active tags found.</span>
                    </div>
                @endforelse
            </div>
            <div class="mt-3">
                <button type="button" class="btn btn-primary" wire:click="saveProductTags" wire:loading.attr="disabled">
                    <span wire:loading.remove>Save</span>
                    <span wire:loading>Saving...</span>
                </button>
                <button type="button" class="btn btn-secondary" x-on:click="$dispatch('close-modal')">Cancel</button>
            </div>
        </x-slot>
    </x-admin_modal>

    <x-admin_modal name="product-qr-code" title="Product QR Code">
        <x-slot:modalBody>
            <div class="mb-3"><strong>Product:</strong> {{ $qrCodeProductName }}</div>

            <p class="text-muted">Create one QR code for each source. Existing QR codes are listed below.</p>

            @php($createdQrCodeSources = array_column($qrCodes, 'source'))

            <div class="form-group">
                <label for="qr-code-source">Add QR code source</label>
                <select id="qr-code-source" class="form-control @error('qrCodeSource') is-invalid @enderror" wire:model="qrCodeSource">
                    <option value="">Choose an option</option>
                    <option value="carton" @disabled(in_array('carton', $createdQrCodeSources))>Carton</option>
                    <option value="counter" @disabled(in_array('counter', $createdQrCodeSources))>Counter</option>
                    <option value="cat" @disabled(in_array('cat', $createdQrCodeSources))>CAT</option>
                </select>
                @error('qrCodeSource')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="button" class="btn btn-primary mb-4" wire:click="createQrCode" wire:loading.attr="disabled" wire:target="createQrCode">
                <span wire:loading.remove wire:target="createQrCode"><i class="fas fa-qrcode"></i> Create QR Code</span>
                <span wire:loading wire:target="createQrCode"><i class="fas fa-spinner fa-spin"></i> Creating...</span>
            </button>

            <div class="row">
                @forelse($qrCodes as $qrCode)
                    <div class="col-md-6 mb-4" wire:key="qr-code-{{ $qrCode['id'] }}">
                        <div class="border rounded p-3 h-100 text-center">
                            <div class="mb-2">{!! $qrCode['svg'] !!}</div>
                            <p class="mb-1"><strong>Source:</strong> {{ ucfirst($qrCode['source']) }}</p>
                            <a href="{{ $qrCode['url'] }}" target="_blank" rel="noopener noreferrer" class="d-block text-break mb-2">{{ $qrCode['url'] }}</a>
                            <div class="btn-group" role="group" aria-label="QR code actions">
                                <a href="{{ $qrCode['download_url'] }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-download"></i> Download
                                </a>
                                <button type="button" class="btn btn-secondary btn-sm" wire:click="openQrCodeScansModal({{ $qrCode['id'] }})" wire:loading.attr="disabled" wire:target="openQrCodeScansModal({{ $qrCode['id'] }})">
                                    <span wire:loading.remove wire:target="openQrCodeScansModal({{ $qrCode['id'] }})"><i class="fas fa-history"></i> Scans</span>
                                    <span wire:loading wire:target="openQrCodeScansModal({{ $qrCode['id'] }})"><i class="fas fa-spinner fa-spin"></i> Loading...</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" wire:click="deleteQrCode({{ $qrCode['id'] }})" wire:loading.attr="disabled" wire:target="deleteQrCode({{ $qrCode['id'] }})">
                                    <span wire:loading.remove wire:target="deleteQrCode({{ $qrCode['id'] }})"><i class="fas fa-trash"></i> Delete</span>
                                    <span wire:loading wire:target="deleteQrCode({{ $qrCode['id'] }})"><i class="fas fa-spinner fa-spin"></i> Deleting...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12"><p class="text-muted">No QR codes have been created for this product yet.</p></div>
                @endforelse
            </div>

            <button type="button" class="btn btn-secondary ml-2" x-on:click="$dispatch('close-modal')">Close</button>
        </x-slot>
    </x-admin_modal>

    <x-admin_modal name="qr-code-scans" title="QR Code Scan History">
        <x-slot:modalBody>
            <div class="mb-3"><strong>Source:</strong> {{ ucfirst($scanQrCodeSource) }}</div>

            <div class="table-responsive">
                <table class="table table-bordered table-sm mb-0">
                    <thead>
                        <tr>
                            <th>Scanned At</th>
                            <th>Device</th>
                            <th>Approximate Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($qrCodeScans as $scan)
                            <tr wire:key="qr-code-scan-{{ $loop->index }}">
                                <td>{{ $scan['scanned_at'] }}</td>
                                <td>{{ $scan['device'] }}</td>
                                <td>{{ $scan['location'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No scans recorded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-secondary mt-3" x-on:click="$dispatch('close-modal')">Close</button>
        </x-slot>
    </x-admin_modal>
</div>
