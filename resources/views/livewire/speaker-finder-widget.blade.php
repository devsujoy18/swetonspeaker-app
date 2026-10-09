<div class="speaker-finder-widget">
    <style>
        .speaker-finder-widget__launcher {
            align-items: center;
            background: #cf1f1f;
            border: 0;
            border-radius: 50%;
            bottom: auto;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .2);
            color: #fff;
            display: flex;
            font-size: 22px;
            height: 58px;
            justify-content: center;
            position: fixed;
            right: 24px;
            top: 50%;
            transform: translateY(-50%);
            width: 58px;
            z-index: 1080;
        }

        .speaker-finder-widget__launcher::before,
        .speaker-finder-widget__launcher::after {
            opacity: 0;
            pointer-events: none;
            position: absolute;
            transition: opacity .2s ease, transform .2s ease;
            visibility: hidden;
        }

        .speaker-finder-widget__launcher::after {
            background: #303030;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .2);
            color: #fff;
            content: attr(data-tooltip);
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.4;
            max-width: min(230px, calc(100vw - 100px));
            padding: 10px 12px;
            right: calc(100% + 12px);
            text-align: left;
            top: 50%;
            transform: translate(6px, -50%);
            white-space: normal;
            width: max-content;
        }

        .speaker-finder-widget__launcher::before {
            border: 6px solid transparent;
            border-left-color: #303030;
            content: '';
            right: calc(100% + 1px);
            top: 50%;
            transform: translate(6px, -50%);
        }

        .speaker-finder-widget__launcher:hover::before,
        .speaker-finder-widget__launcher:hover::after,
        .speaker-finder-widget__launcher:focus-visible::before,
        .speaker-finder-widget__launcher:focus-visible::after {
            opacity: 1;
            transform: translate(0, -50%);
            visibility: visible;
        }

        .speaker-finder-widget__panel {
            background: #fff;
            border-radius: 14px;
            bottom: auto;
            box-shadow: 0 12px 40px rgba(0, 0, 0, .22);
            display: flex;
            flex-direction: column;
            max-height: min(720px, calc(100vh - 120px));
            overflow: hidden;
            position: fixed;
            right: 24px;
            top: 50%;
            transform: translateY(-50%);
            width: min(390px, calc(100vw - 32px));
            z-index: 1080;
        }

        .speaker-finder-widget__header {
            align-items: center;
            background: #303030;
            color: #fff;
            display: flex;
            justify-content: space-between;
            padding: 14px 16px;
        }

        .speaker-finder-widget__header h3 {
            color: inherit;
            font-size: 18px;
            margin: 0;
        }

        .speaker-finder-widget__close {
            background: transparent;
            border: 0;
            color: inherit;
            font-size: 22px;
            line-height: 1;
        }

        .speaker-finder-widget__body {
            overflow-y: auto;
            padding: 14px;
        }

        .speaker-finder-widget__messages {
            display: grid;
            gap: 8px;
            margin-bottom: 14px;
        }

        .speaker-finder-widget__message {
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.45;
            max-width: 92%;
            padding: 9px 11px;
        }

        .speaker-finder-widget__message--bot {
            background: #f1f3f5;
            justify-self: start;
        }

        .speaker-finder-widget__message--user {
            background: #cf1f1f;
            color: #fff;
            justify-self: end;
        }

        .speaker-finder-widget__choices {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .speaker-finder-widget__choice {
            background: #fff;
            border: 1px solid #cf1f1f;
            border-radius: 999px;
            color: #cf1f1f;
            cursor: pointer;
            font-size: 13px;
            padding: 7px 11px;
        }

        .speaker-finder-widget__choice.is-selected,
        .speaker-finder-widget__choice:hover {
            background: #cf1f1f;
            color: #fff;
        }

        .speaker-finder-widget__size-form {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }

        .speaker-finder-widget__size-form input {
            border: 1px solid #ced4da;
            border-radius: 6px;
            min-width: 0;
            padding: 8px 10px;
            width: 100%;
        }

        .speaker-finder-widget__action {
            background: #303030;
            border: 0;
            border-radius: 6px;
            color: #fff;
            padding: 8px 12px;
            white-space: nowrap;
        }

        .speaker-finder-widget__selected {
            color: #555;
            font-size: 13px;
            margin: 10px 0 0;
        }

        .speaker-finder-widget__results {
            display: grid;
            gap: 10px;
            margin-top: 14px;
        }

        .speaker-finder-widget__product {
            border: 1px solid #e2e5e8;
            border-radius: 9px;
            display: grid;
            gap: 10px;
            grid-template-columns: 64px 1fr;
            padding: 9px;
        }

        .speaker-finder-widget__product img {
            border-radius: 6px;
            height: 64px;
            object-fit: cover;
            width: 64px;
        }

        .speaker-finder-widget__product h4 {
            font-size: 14px;
            margin: 0 0 4px;
        }

        .speaker-finder-widget__product p {
            color: #555;
            font-size: 12px;
            margin: 0 0 6px;
        }

        .speaker-finder-widget__product a {
            color: #cf1f1f;
            font-size: 12px;
            font-weight: 700;
        }

        .speaker-finder-widget__reset {
            background: transparent;
            border: 0;
            color: #cf1f1f;
            font-size: 13px;
            margin-top: 14px;
            padding: 0;
        }

        @media (max-width: 575px) {
            .speaker-finder-widget__launcher {
                bottom: auto;
                right: 16px;
            }

            .speaker-finder-widget__panel {
                bottom: auto;
                right: 16px;
                top: 50%;
            }
        }
    </style>

    @if($isOpen)
        <section class="speaker-finder-widget__panel" role="dialog" aria-modal="false" aria-labelledby="speaker-finder-title">
            <header class="speaker-finder-widget__header">
                <h3 id="speaker-finder-title">Speaker Finder</h3>
                <button type="button" class="speaker-finder-widget__close" wire:click="closeWidget" aria-label="Close speaker finder">&times;</button>
            </header>

            <div class="speaker-finder-widget__body">
                <div class="speaker-finder-widget__messages" aria-live="polite">
                    @foreach($messages as $message)
                        <div wire:key="speaker-finder-message-{{ $loop->index }}" class="speaker-finder-widget__message speaker-finder-widget__message--{{ $message['role'] }}">
                            {{ $message['text'] }}
                        </div>
                    @endforeach
                </div>

                @if($step === 'series')
                    <div class="speaker-finder-widget__choices">
                        @foreach($seriesOptions as $option)
                            <button type="button" class="speaker-finder-widget__choice" wire:click="chooseSeries({{ $option['type_id'] }})">
                                {{ $option['label'] }}
                            </button>
                        @endforeach
                    </div>
                @elseif($step === 'size')
                    <div class="speaker-finder-widget__choices">
                        @foreach($availableSizes as $size)
                            <button type="button" class="speaker-finder-widget__choice {{ in_array($size, $selectedSizes, true) ? 'is-selected' : '' }}" wire:click="toggleSize({{ $size }})">
                                {{ $size }}"
                            </button>
                        @endforeach
                    </div>

                    <form class="speaker-finder-widget__size-form" wire:submit="submitSizeInput">
                        <input type="text" wire:model="sizeInput" placeholder="Type sizes, e.g. 8, 10" aria-label="Enter speaker sizes">
                        <button type="submit" class="speaker-finder-widget__action">Add</button>
                    </form>

                    @if($selectedSizes !== [])
                        <p class="speaker-finder-widget__selected">Selected: {{ implode('", "', $selectedSizes) }}"</p>
                        <button type="button" class="speaker-finder-widget__action mt-2" wire:click="continueFromSizes">Continue</button>
                    @endif
                @elseif($step === 'application')
                    <div class="speaker-finder-widget__choices">
                        @foreach($applicationOptions as $option)
                            <button type="button" class="speaker-finder-widget__choice" wire:click="chooseApplication('{{ $option['value'] }}')">
                                {{ $option['label'] }}
                            </button>
                        @endforeach
                    </div>
                @elseif($step === 'results')
                    @if($results !== [])
                        <div class="speaker-finder-widget__results">
                            @foreach($results as $result)
                                @php
                                    $type = $result['type_id'] === 1 ? 'pro-loudspeaker' : 'home-loudspeaker';
                                @endphp
                                <article wire:key="speaker-finder-result-{{ $result['id'] }}" class="speaker-finder-widget__product">
                                    @if($result['image'])
                                        <img src="{{ asset('uploads/'.$result['image']) }}" alt="{{ $result['name'] }}" loading="lazy">
                                    @endif
                                    <div>
                                        <h4>{{ $result['name'] }}</h4>
                                        @if($result['combinations'] !== [])
                                            <p>Available: {{ implode(', ', $result['combinations']) }}</p>
                                        @endif
                                        <a href="{{ route('product.public.details', ['type' => $type, 'category' => $result['category_slug'], 'slug' => $result['slug']]) }}">View product</a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif

                    <button type="button" class="speaker-finder-widget__reset" wire:click="resetConversation">Start over</button>
                @endif
            </div>
        </section>
    @endif

    @if(! $isOpen)
        <button type="button" class="speaker-finder-widget__launcher" data-tooltip="Need help finding your perfect speaker? Let's find it together!" wire:click="openWidget" wire:loading.attr="disabled" wire:target="openWidget" aria-label="Open speaker finder. Need help finding your perfect speaker? Let's find it together." aria-expanded="false">
            <span wire:loading.remove wire:target="openWidget">
                <i class="fas fa-comments" aria-hidden="true"></i>
            </span>
            <span wire:loading wire:target="openWidget" aria-label="Opening speaker finder">
                <i class="fas fa-spinner fa-spin" aria-hidden="true"></i>
            </span>
        </button>
    @endif
</div>
