<div x-data="{ show: false }" x-init="
    setInterval(() => {
        $wire.$refresh()
    }, 1000)
">
    <div class="comp-blk">
        <div class="head-comp-blk-show">
            <a href="#" class="count-comp">{{ $cart_count }}</a>
            <i class="fas fa-arrows-alt-h" @click="show = !show"></i>
            <ul class="comp-ul" x-show="show">
                @if($cart_items)
                    @foreach($cart_items as $item)
                    <li>
                        <a href="javascript:void(0)">{{ $item['product_name'] }} ( {{$item['combination'] }} )</a>
                        <a href="javascript:void(0)" class="cross-comp" 
                            wire:click.prevent="removeItem({{ $item['productId'] }}, {{ $item['combinationId'] }})">
                            <i class="far fa-times-circle"></i>
                        </a>
                    </li>
                    @endforeach
                
                    @if($cart_count > 1)
                    <li style="background: #b10000;">
                        <a href="{{ route('product.compare') }}" ><i class="fas fa-arrows-alt-h"></i> Compare</a>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>

