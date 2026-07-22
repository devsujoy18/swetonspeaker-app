<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Product Enquiries</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item active"> Enquiries</li>
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
							<th></th>
			                <th>Sl No</th>
			                <th>Name</th>
			                <th>Whatsapp No.</th>
			                <th>Email</th>
			                <th>Product Name</th>
			                <th>Quantity</th>
			                <th>Location</th>
			                <th>Comments</th>
			                <th>Date & Time</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($productenquiries as $productenq)
			        	<tr>
							<td></td>
			        		<td>{{ $loop->iteration }}</td>
			        		<td>{{ $productenq->name }}</td>
			        		<td>{{ $productenq->whatsapp_no }}</td>
			        		<td>{{ $productenq->email }}</td>
			        		<td>{{ $productenq->product_name }}</td>
			        		<td>{{ $productenq->quantity }}</td>
			        		<td>{{ $productenq->location }}</td>
			        		<td>{{ $productenq->comments }}</td>
			        		<td>{{ $productenq->created_at }}</td>
			        		<td>
			        			<form action="{{ route('product.enquiry.delete', $productenq->id) }}" method="POST" style="display:inline;">
			        				@csrf
			        				@method('DELETE')
			        				<button type="submit" class="btn btn-flat btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this enquiry?')">
			        					<i class="fa fa-trash"></i>
			        				</button>
			        			</form>
			        		</td>
			        	</tr>
			        	@endforeach
			        </tbody>
			    </table>
	    	</x-slot>
	    </x-admin_card>
	</section>
	<x-slot:scripts>

		{{-- DataTables CSS --}}
		<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

		{{-- Buttons CSS --}}
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">

		{{-- jQuery --}}
		<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

		{{-- DataTables --}}
		<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

		{{-- Buttons --}}
		<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>

		{{-- Export Buttons --}}
		<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

		{{-- Excel --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

		{{-- PDF --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

		<link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.3/css/select.dataTables.min.css">
		<script src="https://cdn.datatables.net/select/2.0.3/js/dataTables.select.min.js"></script>

		<script>
			$(function () {

				let table = new DataTable('#myTable', {

					columnDefs: [
						{
							orderable: false,
							render: DataTable.render.select(),
							targets: 0
						},
						{
							orderable: false,
							targets: -1
						}
					],

					select: {
						style: 'multi',
						selector: 'td:first-child'
					},

					order: [[1, 'asc']],

					layout: {
						topStart: {
							buttons: [

								{
									extend: 'selectAll',
									text: 'Select All'
								},

								{
									extend: 'selectNone',
									text: 'Unselect'
								},

								{
									extend: 'csv',
									exportOptions: {
										rows: { selected: true },
										columns: [1,2,3,4,5,6,7,8,9]
									}
								},

								{
									extend: 'excel',
									text: 'Export Excel',
									exportOptions: {
										rows: { selected: true },

										// Skip checkbox column and action column
										columns: [1,2,3,4,5,6,7,8,9],

										format: {
											body: function (data, row, column, node) {
												return $('<div>').html(data).text();
											}
										}
									}
								},

								{
									extend: 'pdf',
									exportOptions: {
										rows: { selected: true },
										columns: [1,2,3,4,5,6,7,8,9]
									}
								}

							]
						}
					}

				});

			});		
		</script>

	</x-slot>
</x-admin_layout>