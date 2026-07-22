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
</div>
