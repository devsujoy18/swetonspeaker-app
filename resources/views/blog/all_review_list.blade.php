<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Blog reviews</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item active"> reviews</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('success'))
	    <x-alert type="success" :message="$message"></x-alert>
	    @endif
	    <x-admin_card>
	    	<x-slot:card_title> List </x-slot>
	    	<x-slot:card_tools>
	    	</x-slot>
	    	<x-slot:card_body>
	    		<table id="myTable" class="table table-bordered table-striped">
			        <thead>
			            <tr>
			                <th>Sl No</th>
			                <th>Blog</th>
			                <th>Comment</th>
			                <th>Name</th>
			                <th>Email</th>
			                <th>Status</th>
			                <th></th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($blogreviews as $blogreview)
			        	<tr>
			        		<td>{{ $loop->iteration }}</td>
			        		<td>{{ $blogreview->blog->title }}</td>
			        		<td>{{ $blogreview->comment }}</td>
			        		<td>{{ $blogreview->name }}</td>
			        		<td>{{ $blogreview->email }}</td>
			        		<td>
			        			@if($blogreview->status == 0) 
			        				Inactive 
			        			@elseif($blogreview->status == 1) 
			        				Approved 
			        			@else
			        				Reject
			        			@endif
			        		</td>
			        		<td>
			        		    @if($blogreview->status == 0)
			        			<x-admin_changestatusbtn>
			        				<x-slot:status_link>{{ route('blog.review.status', $blogreview->id) }}</x-slot>
			        				<x-slot:status_class>btn-success</x-slot>
			        				<x-slot:status_text>Approved ?</x-slot>
			        			</x-admin_changestatusbtn>
			        			@else
			        			<x-admin_changestatusbtn>
			        				<x-slot:status_link>{{ route('blog.review.status', $blogreview->id) }}</x-slot>
			        				<x-slot:status_class>btn-warning</x-slot>
			        				<x-slot:status_text>Inactive ?</x-slot>
			        			</x-admin_changestatusbtn>
			        			@endif
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
