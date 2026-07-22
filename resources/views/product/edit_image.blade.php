<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Product</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Product </a></li>
	        <li class="breadcrumb-item active"> Create</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
	    <x-admin_card>
	    	<x-slot:card_title> Create </x-slot>
	    	<x-slot:card_body>
	    		<form role="form" action="{{ route('product.image.update', $productimagge->product_id) }}" method="POST" enctype="multipart/form-data">
	    			@csrf
	    			@method('PUT')
	    			<input type="hidden" name="editId" value="{{ $productimagge->id }}">
	    			<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Image </label>
								<input type="file" name="image" class="form-control">
                                @if($errors->has('image'))
                                <x-validation_error class="text-danger" :error="$errors->first('image')"></x-validation_error>
                            	@endif
							</div>

							<img src="{{ url('/') }}/uploads/thumbnails/{{ $productimagge->path }}" style="height:60px;width: 60px;">
							
				            <div class="form-group">
								<label>Order No <span class="text-danger">*</span></label>
								<input type="text" name="order_no" class="form-control" placeholder="Enter order no" value="{{ old('order_no', $productimagge->order_no) }}">
                                @if($errors->has('order_no'))
                                <x-validation_error class="text-danger" :error="$errors->first('order_no')"></x-validation_error>
                            	@endif
							</div> 
						</div>
						
					</div>
					<button type="submit" name="submit" value="Submit" class="btn btn-primary">
						Submit
					</button>
	    		</form>
	    	</x-slot>
	    </x-admin_card>
	</section>
</x-admin_layout>


