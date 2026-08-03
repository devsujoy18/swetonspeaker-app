@php
    use App\Models\SeoMeta;

    $pageTypeLabels = [
        SeoMeta::PageTypePage => 'Page',
        SeoMeta::PageTypeCategory => 'Category',
        SeoMeta::PageTypeProduct => 'Product',
    ];

    $selectedPageType = function (SeoMeta $seoMeta): string {
        if ($seoMeta->page_type === SeoMeta::PageTypeDefault) {
            return SeoMeta::PageTypePage;
        }

        return $seoMeta->page_type;
    };

    $selectedPageKey = function (SeoMeta $seoMeta): string {
        if ($seoMeta->page_type === SeoMeta::PageTypeDefault) {
            return 'default';
        }

        if ($seoMeta->entity_id) {
            return (string) $seoMeta->entity_id;
        }

        return trim((string) $seoMeta->path, '/') ?: 'home';
    };
@endphp

<x-admin_layout>
    <x-admin_breadcrumb>
        <x-slot:page_header>SEO Meta</x-slot>
        <x-slot:breadcrumb_list>
            <li class="breadcrumb-item active">SEO Meta</li>
        </x-slot>
    </x-admin_breadcrumb>

    <section class="content">
        @if($message = Session::get('success'))
            <x-alert type="success" :message="$message"></x-alert>
        @endif

        <x-admin_card>
            <x-slot:card_title>List</x-slot>
            <x-slot:card_tools>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSeoMetaModal">
                    <i class="fas fa-plus"></i> Add SEO Data
                </button>
            </x-slot>
            <x-slot:card_body>
                <table id="seoMetaTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Page Type</th>
                            <th>Page</th>
                            <th>SEO Title</th>
                            <th>Robots</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seoMetas as $seoMeta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($seoMeta->page_type) }}</td>
                                <td>
                                    {{ $seoMeta->slug ?: ($seoMeta->path ?: 'Default SEO') }}
                                </td>
                                <td>{{ $seoMeta->title }}</td>
                                <td>{{ $seoMeta->robots }}</td>
                                <td>{{ $seoMeta->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editSeoMetaModal{{ $seoMeta->id }}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </button>
                                    <form action="{{ route('seo-meta.destroy', $seoMeta) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this SEO data?')">
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

    <div class="modal fade seo-meta-modal" id="addSeoMetaModal" tabindex="-1" role="dialog" aria-labelledby="addSeoMetaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form class="modal-content" action="{{ route('seo-meta.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <h4 class="mb-4" id="addSeoMetaModalLabel">Add SEO Data</h4>
                    @include('seo_meta.partials.form', [
                        'seoMeta' => null,
                        'pageOptions' => $pageOptions,
                        'pageTypeLabels' => $pageTypeLabels,
                        'selectedType' => old('page_type', SeoMeta::PageTypePage),
                        'selectedKey' => old('page_key', 'default'),
                    ])
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    @foreach($seoMetas as $seoMeta)
        <div class="modal fade seo-meta-modal" id="editSeoMetaModal{{ $seoMeta->id }}" tabindex="-1" role="dialog" aria-labelledby="editSeoMetaModalLabel{{ $seoMeta->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <form class="modal-content" action="{{ route('seo-meta.update', $seoMeta) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <h4 class="mb-4" id="editSeoMetaModalLabel{{ $seoMeta->id }}">Edit SEO Data</h4>
                        @include('seo_meta.partials.form', [
                            'seoMeta' => $seoMeta,
                            'pageOptions' => $pageOptions,
                            'pageTypeLabels' => $pageTypeLabels,
                            'selectedType' => old('page_type', $selectedPageType($seoMeta)),
                            'selectedKey' => old('page_key', $selectedPageKey($seoMeta)),
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
            const seoPageOptions = @json($pageOptions);

            function populateSeoPageSelect(modal) {
                const pageTypeSelect = modal.querySelector('[data-seo-page-type]');
                const pageSelect = modal.querySelector('[data-seo-page-select]');
                const selectedValue = pageSelect.getAttribute('data-selected') || 'default';
                const options = seoPageOptions[pageTypeSelect.value] || {};

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
                new DataTable('#seoMetaTable');

                document.querySelectorAll('.seo-meta-modal').forEach((modal) => {
                    populateSeoPageSelect(modal);

                    const pageTypeSelect = modal.querySelector('[data-seo-page-type]');
                    const pageSelect = modal.querySelector('[data-seo-page-select]');

                    pageTypeSelect.addEventListener('change', function () {
                        pageSelect.setAttribute('data-selected', '');
                        populateSeoPageSelect(modal);
                    });

                    pageSelect.addEventListener('change', function () {
                        pageSelect.setAttribute('data-selected', pageSelect.value);
                    });
                });

                $('.seo-meta-modal').on('shown.bs.modal', function () {
                    $(this).find('.summernote-seo').each(function () {
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
