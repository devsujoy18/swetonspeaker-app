@php
    $rangeLink = $typeId === 1
        ? ['label' => 'View Pro Audio Range', 'url' => route('category.list', 'pro-loudspeaker')]
        : ['label' => 'Home Audio Drivers', 'url' => route('category.list', 'home-loudspeaker')];
@endphp

<div
    class="custom-pill-row home-tags"
    data-home-tags
    style="margin-top: 0; margin-bottom: 25px;"
>
    @foreach ($tags as $tag)
        <a href="{{ route('tag.search', ['tag' => $tag->slug]) }}" class="custom-pill">
            {{ $tag->title }}
        </a>
    @endforeach

    <a
        href="{{ $rangeLink['url'] }}"
        class="custom-btn-primary custom-pill"
        style="background-color: #cf1f1f;"
    >
        {{ $rangeLink['label'] }}
    </a>
</div>
