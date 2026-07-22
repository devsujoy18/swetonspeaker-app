<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Keyfeature</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Keyfeature </a></li>
	        <li class="breadcrumb-item active"> Create</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('error'))
        <x-alert type="danger" :message="$message"></x-alert>
        @endif
	    <x-admin_card>
	    	<x-slot:card_title> Create </x-slot>
	    	<x-slot:card_body>
	    		<form role="form" action="{{ route('combination.keyfeature.store', $combinationId) }}" method="POST" enctype="multipart/form-data">
	    			@csrf
	    			<div class="form-group">
	                    <label>Keayfeature <span class="text-danger">*</span></label>
	                    <select class="custom-select" name="keyfeature_id">
	                        <option value="">Select</option>
	                        @foreach($keyfeatures as $keyfeature)
	                        <option value="{{ $keyfeature->id }}" 
	                        	@selected(old('keyfeature_id') == $keyfeature->id)>{{ $keyfeature->name }}</option>
	                        @endforeach
	                    </select> 
	                    @if($errors->has('keyfeature_id'))
	                        <x-validation_error class="text-danger" :error="$errors->first('keyfeature_id')"></x-validation_error>
	                    @endif  
	                </div>
	                <div class="form-group">
	                    <label>Value <span class="text-danger">*</span></label>
	                    <input type="text" name="keyfeature_value" class="form-control" placeholder="Enter keyfeature value" value="{{ old('keyfeature_value') }}">
	                    @if($errors->has('keyfeature_value'))
	                        <x-validation_error class="text-danger" :error="$errors->first('keyfeature_value')"></x-validation_error>
	                    @endif  
	                </div>
	                <div class="form-group">
	                    <label>Order No <span class="text-danger">*</span></label>
	                    <input type="text" name="order_no" class="form-control" placeholder="Enter order no" value="{{ old('order_no') }}">  
	                    @if($errors->has('order_no'))
	                        <x-validation_error class="text-danger" :error="$errors->first('order_no')"></x-validation_error>
	                    @endif   
	                </div>
					<button type="submit" name="submit" value="Submit" class="btn btn-primary">
						Submit
					</button>
	    		</form>
	    	</x-slot>
	    </x-admin_card>
	</section>
</x-admin_layout>
