<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Reconkits</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('reconkit.index') }}"> Reconkits </a></li>
	        <li class="breadcrumb-item active"> Create</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
	    <x-admin_card>
	    	<x-slot:card_title> Create </x-slot>
	    	<x-slot:card_body>
	    		<form role="form" action="{{ route('reconkit.store') }}" method="POST" enctype="multipart/form-data">
	    			@csrf
	    			<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Name<span class="text-danger">*</span></label>
								<input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                <x-validation_error class="text-danger" :error="$errors->first('name')"></x-validation_error>
                            	@endif
							</div> 
							<div class="form-group">
								<label>Order No<span class="text-danger">*</span></label>
								<input type="text" name="order_no" class="form-control" placeholder="Enter order no" value="{{ old('order_no') }}">
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
