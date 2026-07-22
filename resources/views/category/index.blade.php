<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Categories</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item active"> Categories</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('success'))
	    <x-alert type="success" :message="$message"></x-alert>
	    @endif
	    <x-admin_card>
	    	<x-slot:card_title> List </x-slot>
	    	<x-slot:card_tools>
	    		<a class="btn btn-primary btn-sm" href="{{ route('category.create')}}">
	                <i class="fas fa-plus"></i> Create
	            </a>
	    	</x-slot>
	    	<x-slot:card_body>
	    		<table id="myTable" class="table table-bordered table-striped">
			        <thead>
			            <tr>
			                <th>Sl No</th>
			                <th>Name</th>
			                <th>Order No</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($categories as $category)
			        	<tr>
			        		<td>{{ $loop->iteration }}</td>
			        		<td>{{ $category->name }}</td>
			        		<td>{{ $category->order_no }}</td>
			        		<td>
			        			@if($category->status == 0) 
			        				Active 
			        			@else 
			        				Inactive 
			        			@endif
			        		</td>
			        		<td>
			        			<x-admin_editbtn>
			        				<x-slot:edit_link>
			        					{{ route('category.edit', $category->id) }}
			        				</x-slot>
			        			</x-admin_editbtn>

			        			@if($category->status == 0)
			        			<x-admin_changestatusbtn>
			        				<x-slot:status_link>{{ route('category.status', $category->id) }}</x-slot>
			        				<x-slot:status_class>btn-success</x-slot>
			        				<x-slot:status_text>Active</x-slot>
			        			</x-admin_changestatusbtn>
			        			@else
			        			<x-admin_changestatusbtn>
			        				<x-slot:status_link>{{ route('category.status', $category->id) }}</x-slot>
			        				<x-slot:status_class>btn-danger</x-slot>
			        				<x-slot:status_text>Inactive</x-slot>
			        			</x-admin_changestatusbtn>
			        			@endif

			        			<x-admin_showbtn>
			        				<x-slot:show_link>
			        					{{ route('category.show', $category->id) }}
			        				</x-slot>
			        			</x-admin_showbtn>
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
