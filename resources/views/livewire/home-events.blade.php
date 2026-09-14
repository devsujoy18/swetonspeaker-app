@include('livewire.partials.home-content-section', [
    'contentItems' => $events,
    'tagline' => 'Our Events',
    'sectionTitle' => 'Recent Events',
    'detailRoute' => 'public.event.show',
    'emptyMessage' => 'No events available at the moment.',
])
