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
	    		<form role="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
	    			@csrf
	    			<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Name <span class="text-danger">*</span></label>
								<input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                <x-validation_error class="text-danger" :error="$errors->first('name')"></x-validation_error>
                            	@endif
							</div> 
							
							<div class="form-group">
				              	<label>Category <span class="text-danger">*</span></label>
				              	<select class="custom-select" name="category_id">
					                <option value="">Select</option>
					                @foreach($categories as $category)
					                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
					                	{{ $category->name }}
					                </option>
					                @endforeach
					            </select>
					            @if($errors->has('category_id'))
                                <x-validation_error class="text-danger" :error="$errors->first('category_id')"></x-validation_error>
                            	@endif
				            </div>

				            <div class="form-group">
				              	<label>Show on home </label>
					            <div class="form-check">
						            <input class="form-check-input" type="checkbox" name="show_on_home" value="1" @if(old('show_on_home') == '1') checked @endif>
						            <label class="form-check-label">Yes</label>
					            </div>
				            </div>
				            
				            <div class="form-group">
				              	<label>Is sealable </label>
					            <div class="form-check">
						            <input class="form-check-input" type="checkbox" name="is_sealable" id="is_sealable" value="1" @if(old('is_sealable') == '1') checked @endif>
						            <label class="form-check-label">Yes</label>
					            </div>
				            </div>

				            <div class="form-group" id="buy_link_field" style="display: none;">
								<label>Buy Link <span class="text-danger">*</span></label>
								<input type="text" name="buy_link" class="form-control" placeholder="Enter" value="{{ old('buy_link') }}">
                                @if($errors->has('buy_link'))
                                <x-validation_error class="text-danger" :error="$errors->first('buy_link')"></x-validation_error>
                            	@endif
							</div> 

				            <div class="form-group">
								<label>Order No <span class="text-danger">*</span></label>
								<input type="text" name="order_no" class="form-control" placeholder="Enter order no" value="{{ old('order_no') }}">
                                @if($errors->has('order_no'))
                                <x-validation_error class="text-danger" :error="$errors->first('order_no')"></x-validation_error>
                            	@endif
							</div>
							
							<!--Drawing-->
							<div class="form-group">
								<label>Drawing </label>
								<input type="file" name="drawing" class="form-control">
                                @if($errors->has('drawing'))
                                <x-validation_error class="text-danger" :error="$errors->first('drawing')"></x-validation_error>
                            	@endif
							</div>
							
							<!--Datasheet-->
							<div class="form-group">
								<label>Datasheet </label>
								<input type="file" name="datasheet" class="form-control">
                                @if($errors->has('datasheet'))
                                <x-validation_error class="text-danger" :error="$errors->first('datasheet')"></x-validation_error>
                            	@endif
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
				              	<label>Description </label>
					            <textarea class="form-control summernote" rows="3" name="description">{{ old('description') }}</textarea>
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

<x-slot name="scripts">
	<link rel="stylesheet" href="{{ asset('admin_assets/bootstrap-tagsinput-latest/src/bootstrap-tagsinput.css') }}">
	<script src="{{ asset('admin_assets/bootstrap-tagsinput-latest/src/bootstrap-tagsinput.js') }}"></script>

	<script src="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<script type="text/javascript">
	    $(function () {
	    // Summernote
	    $('.summernote').summernote();
	    
	    toggleBuyLinkField();

	    $('#is_sealable').change(function() {
			toggleBuyLinkField();
		});

		function toggleBuyLinkField() {
			if ($('#is_sealable').is(':checked')) {
				$('#buy_link_field').show();
			} else {
				$('#buy_link_field').hide();
				$('#buy_link').val(''); // Clear the buy link field when hidden
			}
		}

	    
	  })
	</script>
</x-slot>
</x-admin_layout>


