@php
    use App\Models\BlogScript;
@endphp

<x-admin_layout>
    <x-admin_breadcrumb>
        <x-slot:page_header>Blog/Event Scripts</x-slot>
        <x-slot:breadcrumb_list>
            <li class="breadcrumb-item active">Blog/Event Scripts</li>
        </x-slot:breadcrumb_list>
    </x-admin_breadcrumb>

    <section class="content">
        @if($message = Session::get('success'))
            <x-alert type="success" :message="$message"></x-alert>
        @endif

        <x-admin_card>
            <x-slot:card_title>List</x-slot>
            <x-slot:card_tools>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addBlogScriptModal">
                    <i class="fas fa-plus"></i> Add Script
                </button>
            </x-slot:card_tools>
            <x-slot:card_body>
                <table id="blogScriptTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Content Type</th>
                            <th>Blog/Event</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogScripts as $blogScript)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($blogScript->page_type) }}</td>
                                <td>{{ $blogScript->blog?->title ?? 'Deleted content' }}</td>
                                <td>{{ ucfirst($blogScript->position) }}</td>
                                <td>{{ $blogScript->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editBlogScriptModal{{ $blogScript->id }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </button>
                                    <form action="{{ route('blog-script.destroy', $blogScript) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this script?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-slot:card_body>
        </x-admin_card>
    </section>

    <div class="modal fade blog-script-modal" id="addBlogScriptModal" tabindex="-1" role="dialog" aria-labelledby="addBlogScriptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form class="modal-content" action="{{ route('blog-script.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <h4 class="mb-4" id="addBlogScriptModalLabel">Add Blog/Event Script</h4>
                    @include('blog_script.partials.form', [
                        'blogScript' => null,
                        'selectedType' => old('page_type', BlogScript::PageTypeBlog),
                        'selectedBlogId' => old('blog_id', ''),
                    ])
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    @foreach($blogScripts as $blogScript)
        <div class="modal fade blog-script-modal" id="editBlogScriptModal{{ $blogScript->id }}" tabindex="-1" role="dialog" aria-labelledby="editBlogScriptModalLabel{{ $blogScript->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <form class="modal-content" action="{{ route('blog-script.update', $blogScript) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <h4 class="mb-4" id="editBlogScriptModalLabel{{ $blogScript->id }}">Edit Blog/Event Script</h4>
                        @include('blog_script.partials.form', [
                            'blogScript' => $blogScript,
                            'selectedType' => old('page_type', $blogScript->page_type),
                            'selectedBlogId' => old('blog_id', (string) $blogScript->blog_id),
                        ])
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <x-slot:scripts>
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
        <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script>
            const blogScriptOptions = @json($contentOptions);

            function populateBlogScriptSelect(modal) {
                const typeSelect = modal.querySelector('[data-blog-script-type]');
                const contentSelect = modal.querySelector('[data-blog-script-select]');
                const selectedValue = contentSelect.getAttribute('data-selected') || '';
                const options = blogScriptOptions[typeSelect.value] || {};

                contentSelect.innerHTML = '';

                Object.entries(options).forEach(([id, title]) => {
                    const option = document.createElement('option');
                    option.value = id;
                    option.textContent = title;
                    option.selected = id === selectedValue;
                    contentSelect.appendChild(option);
                });
            }

            $(function () {
                new DataTable('#blogScriptTable');

                document.querySelectorAll('.blog-script-modal').forEach((modal) => {
                    populateBlogScriptSelect(modal);

                    const typeSelect = modal.querySelector('[data-blog-script-type]');
                    const contentSelect = modal.querySelector('[data-blog-script-select]');

                    typeSelect.addEventListener('change', function () {
                        contentSelect.setAttribute('data-selected', '');
                        populateBlogScriptSelect(modal);
                    });

                    contentSelect.addEventListener('change', function () {
                        contentSelect.setAttribute('data-selected', contentSelect.value);
                    });
                });
            });
        </script>
    </x-slot:scripts>
</x-admin_layout>
