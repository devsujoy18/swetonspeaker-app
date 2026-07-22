<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>All Contact us messages</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item active"> Contact us</li>
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
			                <th>Name</th>
			                <th>Email</th>
			                <th>Phone</th>
			                <th>Subject</th>
			                <th>Comments</th>
			                <th>Date & Time</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($contactuses as $contactus)
			        	<tr>
			        		<td>{{ $loop->iteration }}</td>
			        		<td>{{ $contactus->name }}</td>
			        		<td>{{ $contactus->email }}</td>
			        		<td>{{ $contactus->phone }}</td>
			        		<td>{{ $contactus->subject }}</td>
			        		<td>{{ $contactus->message }}</td>
			        		<td>{{ $contactus->created_at }}</td>
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
