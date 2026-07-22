<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Details</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('category.index') }}"> Details </a></li>
	        <li class="breadcrumb-item active"> Show</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('success'))
	    <x-alert type="success" :message="$message"></x-alert>
	    @endif
	   <div class="row">
	    	<div class="col-md-6">
	    		<x-admin_card>
			    	<x-slot:card_title> Details  </x-slot>
			    	<x-slot:card_body>

			    		<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Name </label>
				            <div class="col-sm-8">{{ $category->name }}</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Order No  </label>
				            <div class="col-sm-8">{{ $category->order_no }}</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Status  </label>
				            <div class="col-sm-8">@if($category->status == 0) Active @else Inactive @endif</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Image </label>
				            <div class="col-sm-8"><img src="{{ url('/') }}/uploads/thumbnails/{{ $category->image }}" style="height:120px;width: 120px;"></div>
		            	</div>
			    	</x-slot>
			    </x-admin_card>
	    	</div>
	    	<div class="col-md-6">
	    		<livewire:category-keyfeatures-list :category_id="$category->id" />
	    	</div>
	   </div> 
	</section>
</x-admin_layout>