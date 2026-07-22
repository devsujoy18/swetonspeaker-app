<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Category</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('category.index') }}"> Category </a></li>
	        <li class="breadcrumb-item"><a href="{{ route('category.show', $category->id) }}"> {{ $category->name }} </a></li>
	        <li class="breadcrumb-item active"> Edit</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('error'))
        <x-alert type="danger" :message="$message"></x-alert>
        @endif
	    <x-admin_card>
	    	<x-slot:card_title> Edit </x-slot>
	    	<x-slot:card_body>
	    		<form role="form" action="{{ route('category.keyfeatures.update', $category->id) }}" method="POST" enctype="multipart/form-data">
	    			@csrf
	    			@method('PUT')
	    			<input type="hidden" name="editId" value="{{ $category_keyfeature->pivot->id }}">
	    			<div class="form-group">
	                    <label>Keayfeature <span class="text-danger">*</span></label>
	                    <select class="custom-select" name="keyfeature_id">
	                        <option value="">Select</option>
	                        @foreach($keyfeatures as $keyfeature)
	                        <option value="{{ $keyfeature->id }}" 
	                        	@selected(old('keyfeature_id', $category_keyfeature->id) == $keyfeature->id)>{{ $keyfeature->name }}</option>
	                        @endforeach
	                    </select> 
	                    @if($errors->has('keyfeature_id'))
	                        <x-validation_error class="text-danger" :error="$errors->first('keyfeature_id')"></x-validation_error>
	                    @endif  
	                </div>
	                <div class="form-group">
	                    <label>Value <span class="text-danger">*</span></label>
	                    <input type="text" name="keyfeature_value" class="form-control" placeholder="Enter keyfeature value" value="{{ old('keyfeature_value', $category_keyfeature->pivot->keyfeature_value) }}">
	                    @if($errors->has('keyfeature_value'))
	                        <x-validation_error class="text-danger" :error="$errors->first('keyfeature_value')"></x-validation_error>
	                    @endif  
	                </div>
	                <div class="form-group">
	                    <label>Order No <span class="text-danger">*</span></label>
	                    <input type="text" name="order_no" class="form-control" placeholder="Enter order no" value="{{ old('order_no', $category_keyfeature->pivot->order_no) }}">  
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
