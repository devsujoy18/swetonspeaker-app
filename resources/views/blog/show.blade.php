<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Details</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}"> Details </a></li>
	        <li class="breadcrumb-item active"> Show</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('success'))
	    <x-alert type="success" :message="$message"></x-alert>
	    @endif
	   <div class="row">
	    	<div class="col-md-12">
	    		<x-admin_card>
			    	<x-slot:card_title> Details  </x-slot>
			    	<x-slot:card_body>

			    		<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Title </label>
				            <div class="col-sm-8">{{ $blog->title }}</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Order No  </label>
				            <div class="col-sm-8">{{ $blog->order_no }}</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Status  </label>
				            <div class="col-sm-8">@if($blog->status == 0) Active @else Inactive @endif</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Main Image </label>
				            <div class="col-sm-8"><img src="{{ url('/') }}/uploads/{{ $blog->image_path }}" style="height:120px;width: 120px;"></div>
		            	</div>

		            	<div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Publish Date </label>
                            <div class="col-sm-8">{{ $blog->publish_date }}</div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Author </label>
                            <div class="col-sm-8">{{ $blog->author }}</div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Video Link </label>
                            <div class="col-sm-8">{{ $blog->video_link }}</div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Short Description </label>
                            <div class="col-sm-8">{{ $blog->short_description }}</div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Long Description </label>
                            <div class="col-sm-8">{!! $blog->long_description !!}</div>
                        </div>
			    	</x-slot>
			    </x-admin_card>
	    	</div>
	    	<div class="col-md-6">
	    		
	    	</div>
	   </div> 
	</section>
</x-admin_layout>