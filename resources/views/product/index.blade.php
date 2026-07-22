<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Products</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item active"> Products</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('success'))
	    <x-alert type="success" :message="$message"></x-alert>
	    @endif
	    <livewire:product-tag-manager />
	</section>
</x-admin_layout>
