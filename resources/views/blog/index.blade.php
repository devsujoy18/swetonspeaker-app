<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Blogs</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item active"> Blogs</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('success'))
	    <x-alert type="success" :message="$message"></x-alert>
	    @endif
	    <x-admin_card>
	    	<x-slot:card_title> List </x-slot>
	    	<x-slot:card_tools>
	    		<a class="btn btn-primary btn-sm" href="{{ route('blog.create')}}">
	                <i class="fas fa-plus"></i> Create
	            </a>
	    	</x-slot>
	    	<x-slot:card_body>
	    		<table id="myTable" class="table table-bordered table-striped">
			        <thead>
			            <tr>
			                <th>Sl No</th>
			                <th>Type</th>
			                <th>Title</th>
			                <th>Order No</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($blogs as $blog)
			        	<tr>
			        		<td>{{ $loop->iteration }}</td>
			        		<td>
			        			{{ $blog->type == 'blog' ? 'Blog' : 'Event' }}
			        		</td>
			        		<td>{{ $blog->title }}</td>
			        		<td>{{ $blog->order_no }}</td>
			        		<td>
			        			@if($blog->status == 0) 
			        				Active 
			        			@else 
			        				Inactive 
			        			@endif
			        		</td>
			        		<td>
			        			<x-admin_editbtn>
			        				<x-slot:edit_link>
			        					{{ route('blog.edit', $blog->id) }}
			        				</x-slot>
			        			</x-admin_editbtn>

			        			@if($blog->status == 0)
			        			<x-admin_changestatusbtn>
			        				<x-slot:status_link>{{ route('blog.status', $blog->id) }}</x-slot>
			        				<x-slot:status_class>btn-success</x-slot>
			        				<x-slot:status_text>Active</x-slot>
			        			</x-admin_changestatusbtn>
			        			@else
			        			<x-admin_changestatusbtn>
			        				<x-slot:status_link>{{ route('blog.status', $blog->id) }}</x-slot>
			        				<x-slot:status_class>btn-danger</x-slot>
			        				<x-slot:status_text>Inactive</x-slot>
			        			</x-admin_changestatusbtn>
			        			@endif

			        			<x-admin_showbtn>
			        				<x-slot:show_link>
			        					{{ route('blog.show', $blog->id) }}
			        				</x-slot>
			        			</x-admin_showbtn>

			        			<a href="{{ route('blog.images', $blog->id) }}">
								  <span title="Images" type="button" class="btn btn-flat btn-sm btn-danger">
								    <i class="fa fa-image"></i> Images
								  </span>
								</a>
			        		</td>
			        	</tr>
			        	@endforeach
			        </tbody>
			    </table>
	    	</x-slot>
	    </x-admin_card>
	</section>
	<x-slot:scripts>
		<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
		<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
		<script>
		    $(function () {
		       let table = new DataTable('#myTable');
		      });
		</script>
	</x-slot>
</x-admin_layout>
