<div>
    <x-admin_card>
            <x-slot:card_title> Imges </x-slot>
            <x-slot:card_tools>
                <a class="btn btn-primary btn-sm" href="{{ route('product.image', $product->id)}}">
                    <i class="fas fa-plus"></i> Create
                </a>
            </x-slot>
            <x-slot:card_body>
                <div class="row">
                    @if($product->productimages)
                        @foreach($product->productimages as $productimg)
                            <div class="col-md-6" wire:key="{{ $productimg->id }}">
                                <img src="{{ url('/') }}/uploads/thumbnails/{{ $productimg->path }}" style="height:120px;width: 120px;">
                                @if($productimg->status == 0)
                                    <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-success" wire:click.prevent="changeStatus({{$productimg->id}})">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                    @else
                                    <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-danger" 
                                    wire:click.prevent="changeStatus({{$productimg->id}})">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                @endif
                                <a href="{{ route('product.image.edit', ['productId' => $productimg->product_id, 'editId' => $productimg->id]) }}">
                                    <span title="Edit" type="button" class="btn btn-flat btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                </a>
                                <a href="#">
                                    <span title="Delete" 
                                    type="button" 
                                    class="btn btn-flat btn-sm btn-danger" 
                                    wire:click.prevent="deleteImage({{$productimg->id}})" 
                                    wire:confirm="Are you sure you want to delete this image ?">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </x-slot:card_body>
    </x-admin_card>
</div>
