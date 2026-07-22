<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Tsparameters</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Tsparameters </a></li>
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
	    		<form role="form" action="{{ route('combination.tsparameter.store', $combinationId) }}" method="POST" enctype="multipart/form-data">
	    			@csrf
	    			<div class="form-group">
	                    <label>Specification <span class="text-danger">*</span></label>
	                    <select class="custom-select" name="tsparameter_id">
	                        <option value="">Select</option>
	                        @foreach($tsparameters as $tsparameter)
	                        <option value="{{ $tsparameter->id }}" 
	                        	@selected(old('tsparameter') == $tsparameter->id)>{{ $tsparameter->name }}</option>
	                        @endforeach
	                    </select> 
	                    @if($errors->has('tsparameter_id'))
	                        <x-validation_error class="text-danger" :error="$errors->first('tsparameter_id')"></x-validation_error>
	                    @endif  
	                </div>
	                <div class="form-group">
	                    <label>Value <span class="text-danger">*</span></label>
	                    <input type="text" name="value" class="form-control" placeholder="Enter value" value="{{ old('value') }}">
	                    @if($errors->has('value'))
	                        <x-validation_error class="text-danger" :error="$errors->first('value')"></x-validation_error>
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
