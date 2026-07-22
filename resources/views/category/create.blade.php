<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Category</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('category.index') }}"> Category </a></li>
	        <li class="breadcrumb-item active"> Create</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
	    <x-admin_card>
	    	<x-slot:card_title> Create </x-slot>
	    	<x-slot:card_body>
	    		<form role="form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
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
				              	<label>Select Type <span class="text-danger">*</span></label>
				              	<select class="custom-select" name="type_id">
					                <option value="">Select</option>
					                <option value="1" @selected(old('type_id') == "1")>PRO LOUDSPEAKER </option>
					                <option value="2" @selected(old('type_id') == "2")>HOME LOUDSPEAKER </option>
					            </select>
					            @if($errors->has('type_id'))
                                <x-validation_error class="text-danger" :error="$errors->first('type_id')"></x-validation_error>
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
								<label>Order No <span class="text-danger">*</span></label>
								<input type="text" name="order_no" class="form-control" placeholder="Enter order no" value="{{ old('order_no') }}">
                                @if($errors->has('order_no'))
                                <x-validation_error class="text-danger" :error="$errors->first('order_no')"></x-validation_error>
                            	@endif
							</div>

							 <div class="form-group">
								<label>Image </label>
								<input type="file" name="image" class="form-control">
                                @if($errors->has('image'))
                                <x-validation_error class="text-danger" :error="$errors->first('image')"></x-validation_error>
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
