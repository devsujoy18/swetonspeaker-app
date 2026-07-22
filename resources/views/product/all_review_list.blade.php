<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Product reviews</x-slot>
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
			                <th>Product</th>
			                <th>Ratting</th>
			                <th>Comment</th>
			                <th>Name</th>
			                <th>Email</th>
			                <th>Status</th>
			                <th></th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($productreviews as $productreview)
			        	<tr>
			        		<td>{{ $loop->iteration }}</td>
			        		<td>{{ $productreview->product->name }}</td>
			        		<td>{{ $productreview->user_rate }}</td>
			        		<td>{{ $productreview->comment }}</td>
			        		<td>{{ $productreview->name }}</td>
			        		<td>{{ $productreview->email }}</td>
			        		<td>
			        			@if($productreview->status == 0) 
			        				Pending 
			        			@elseif($productreview->status == 1) 
			        				Approved 
			        			@else
			        				Reject
			        			@endif
			        		</td>
			        		<td>
			        		    @if($productreview->status == 0)
			        			<x-admin_changestatusbtn>
			        				<x-slot:status_link>{{ route('product.review.status', $productreview->id) }}</x-slot>
			        				<x-slot:status_class>btn-success</x-slot>
			        				<x-slot:status_text>Approved ?</x-slot>
			        			</x-admin_changestatusbtn>
			        			@else
			        			<x-admin_changestatusbtn>
			        				<x-slot:status_link>{{ route('product.review.status', $productreview->id) }}</x-slot>
			        				<x-slot:status_class>btn-warning</x-slot>
			        				<x-slot:status_text>Pending ?</x-slot>
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
