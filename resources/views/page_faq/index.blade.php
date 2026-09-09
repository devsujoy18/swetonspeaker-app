@php
    use App\Models\PageFaq;

    $pageTypeLabels = [
        PageFaq::PageTypePage => 'Page',
        PageFaq::PageTypeCategory => 'Category',
        PageFaq::PageTypeProduct => 'Product',
        PageFaq::PageTypeBlog => 'Blog',
        PageFaq::PageTypeEvent => 'Event',
    ];

    $selectedPageKey = function (PageFaq $pageFaq): string {
        if ($pageFaq->entity_id) {
            return (string) $pageFaq->entity_id;
        }

        return trim((string) $pageFaq->path, '/') ?: 'home';
    };
@endphp

<x-admin_layout>
    <x-admin_breadcrumb>
        <x-slot:page_header>Page FAQ</x-slot>
        <x-slot:breadcrumb_list>
            <li class="breadcrumb-item active">Page FAQ</li>
        </x-slot>
    </x-admin_breadcrumb>

    <section class="content">
        @if($message = Session::get('success'))
            <x-alert type="success" :message="$message"></x-alert>
        @endif

        <x-admin_card>
            <x-slot:card_title>List</x-slot>
            <x-slot:card_tools>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPageFaqModal">
                    <i class="fas fa-plus"></i> Add FAQ
                </button>
            </x-slot>
            <x-slot:card_body>
                <table id="pageFaqTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Page Type</th>
                            <th>Page</th>
                            <th>FAQ Title</th>
                            <th>Order No</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pageFaqs as $pageFaq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($pageFaq->page_type) }}</td>
                                <td>{{ $pageFaq->slug ?: $pageFaq->path }}</td>
                                <td>{{ $pageFaq->title }}</td>
                                <td>{{ $pageFaq->order_no }}</td>
                                <td>{{ $pageFaq->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editPageFaqModal{{ $pageFaq->id }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </button>
                                    <form action="{{ route('page-faq.destroy', $pageFaq) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this FAQ?')">
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
            </x-slot>
        </x-admin_card>
    </section>

    <div class="modal fade page-faq-modal" id="addPageFaqModal" tabindex="-1" role="dialog" aria-labelledby="addPageFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form class="modal-content" action="{{ route('page-faq.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <h4 class="mb-4" id="addPageFaqModalLabel">Add FAQ</h4>
                    @include('page_faq.partials.form', [
                        'pageFaq' => null,
                        'pageOptions' => $pageOptions,
                        'pageTypeLabels' => $pageTypeLabels,
                        'selectedType' => old('page_type', PageFaq::PageTypePage),
                        'selectedKey' => old('page_key', 'home'),
                    ])
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    @foreach($pageFaqs as $pageFaq)
        <div class="modal fade page-faq-modal" id="editPageFaqModal{{ $pageFaq->id }}" tabindex="-1" role="dialog" aria-labelledby="editPageFaqModalLabel{{ $pageFaq->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <form class="modal-content" action="{{ route('page-faq.update', $pageFaq) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <h4 class="mb-4" id="editPageFaqModalLabel{{ $pageFaq->id }}">Edit FAQ</h4>
                        @include('page_faq.partials.form', [
                            'pageFaq' => $pageFaq,
                            'pageOptions' => $pageOptions,
                            'pageTypeLabels' => $pageTypeLabels,
                            'selectedType' => old('page_type', $pageFaq->page_type),
                            'selectedKey' => old('page_key', $selectedPageKey($pageFaq)),
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
        <script src="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script>
            const pageFaqOptions = @json($pageOptions);

            function populatePageFaqSelect(modal) {
                const pageTypeSelect = modal.querySelector('[data-page-faq-type]');
                const pageSelect = modal.querySelector('[data-page-faq-select]');
                const selectedValue = pageSelect.getAttribute('data-selected') || 'home';
                const options = pageFaqOptions[pageTypeSelect.value] || {};

                pageSelect.innerHTML = '';

                Object.entries(options).forEach(([key, option]) => {
                    const item = document.createElement('option');
                    item.value = key;
                    item.textContent = option.label;
                    item.selected = key === selectedValue;
                    pageSelect.appendChild(item);
                });
            }

            $(function () {
                new DataTable('#pageFaqTable');

                document.querySelectorAll('.page-faq-modal').forEach((modal) => {
                    populatePageFaqSelect(modal);

                    const pageTypeSelect = modal.querySelector('[data-page-faq-type]');
                    const pageSelect = modal.querySelector('[data-page-faq-select]');

                    pageTypeSelect.addEventListener('change', function () {
                        pageSelect.setAttribute('data-selected', '');
                        populatePageFaqSelect(modal);
                    });

                    pageSelect.addEventListener('change', function () {
                        pageSelect.setAttribute('data-selected', pageSelect.value);
                    });
                });

                $('.page-faq-modal').on('shown.bs.modal', function () {
                    $(this).find('.summernote-faq').each(function () {
                        if ($(this).next('.note-editor').length) {
                            return;
                        }

                        $(this).summernote({
                            height: 180,
                        });
                    });
                });
            });
        </script>
    </x-slot>
</x-admin_layout>
