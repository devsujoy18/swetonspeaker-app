<div class="custom-pill-row" style="margin-top: 0; margin-bottom: 25px;">
    @foreach($tags as $tag)
        <a href="{{ route('tag.search', ['tag' => $tag->slug]) }}" class="custom-pill">
            {{ $tag->title }}
        </a>
    @endforeach

    @if($typeId == 1)                           
        <a href="https://www.swetonspeakers.com/speaker/pro-loudspeaker"
           class="custom-btn-primary custom-pill"
           style="background-color: #cf1f1f;">
           View Pro Audio Range
        </a>
    @elseif($typeId == 2)
        <a href="https://www.swetonspeakers.com/speaker/home-loudspeaker"
           class="custom-btn-primary custom-pill"
           style="background-color: #cf1f1f;">
           Home Audio Drivers
        </a>
    @endif
</div>