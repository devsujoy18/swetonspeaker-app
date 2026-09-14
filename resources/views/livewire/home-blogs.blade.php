@include('livewire.partials.home-content-section', [
    'contentItems' => $blogs,
    'tagline' => 'Our Blogs',
    'sectionTitle' => 'Recent Blogs',
    'detailRoute' => 'public.blog.show',
    'emptyMessage' => 'No blogs available at the moment.',
])
