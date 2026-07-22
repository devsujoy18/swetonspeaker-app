<div>
    @if($message = Session::get('success'))
        <x-alert type="success" :message="$message"></x-alert>
    @endif

    <x-admin_card>
        <x-slot:card_title> List </x-slot>
        <x-slot:card_tools>
            <button type="button" class="btn btn-primary btn-sm" wire:click="openCreateModal">
                <i class="fas fa-plus"></i> Create
            </button>
        </x-slot>
        <x-slot:card_body>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tags as $tag)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tag->title }}</td>
                            <td>{{ $this->types[$tag->type_id] ?? 'N/A' }}</td>
                            <td>
                                @if($tag->status == 0)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-flat btn-sm btn-primary" wire:click="openEditModal({{ $tag->id }})">
                                    <i class="fa fa-edit"></i>
                                </button>
                                @if($tag->status == 0)
                                    <button type="button" class="btn btn-flat btn-sm btn-success" wire:click.prevent="changeStatus({{ $tag->id }})">
                                        <i class="fas fa-toggle-on"></i>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-flat btn-sm btn-danger" wire:click.prevent="changeStatus({{ $tag->id }})">
                                        <i class="fas fa-toggle-off"></i>
                                    </button>
                                @endif
                                <button type="button" class="btn btn-flat btn-sm btn-danger" wire:click="deleteTag({{ $tag->id }})" onclick="return confirm('Delete this tag?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-slot>
    </x-admin_card>

    <x-admin_modal name="tag-form" title="{{ $tagId ? 'Edit Tag' : 'Add Tag' }}">
        <x-slot:modalBody>
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="tag-title">Name</label>
                    <input id="tag-title" type="text" class="form-control" wire:model.defer="title" placeholder="Enter tag name">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="tag-type">Type</label>
                    <select id="tag-type" class="form-control" wire:model.defer="typeId">
                        <option value="">Select Type</option>
                        @foreach($this->types as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('typeId') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="tag-status">Status</label>
                    <select id="tag-status" class="form-control" wire:model.defer="status">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" x-on:click="$dispatch('close-modal')">Cancel</button>
                </div>
            </form>
        </x-slot>
    </x-admin_modal>
</div>
