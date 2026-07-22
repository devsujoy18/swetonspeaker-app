<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Applications for Dealership</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item active"> Applications</li>
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
			                <th>Organisation Name</th>
			                <th>Contact Person</th>
			                <th>Address</th>
			                <th>Mobile No.</th>
			                <th>Interest in</th>
			                <th>Date & Time</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($applicationDealerships as $applicationd)
			        	<tr>
			        		<td>{{ $loop->iteration }}</td>
			        		<td>{{ $applicationd->organisation_name }}</td>
			        		<td>{{ $applicationd->contact_person }}</td>
			        		<td>{{ $applicationd->address }}</td>
			        		<td>{{ $applicationd->mobile_no }}</td>
			        		<td>{{ $applicationd->speaker }}</td>
			        		<td>
			        		    {{ $applicationd->created_at }}
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
