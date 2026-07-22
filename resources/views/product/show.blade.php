<x-admin_layout>
	<x-admin_breadcrumb>
		<x-slot:page_header>Product</x-slot>
	    <x-slot:breadcrumb_list>
	        <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Product </a></li>
	        <li class="breadcrumb-item active"> Show</li>
	    </x-slot>
	</x-admin_breadcrumb>
	<section class="content">
		@if($message = Session::get('success'))
	    <x-alert type="success" :message="$message"></x-alert>
	    @endif

	    <div class="row">
	    	<!--Product Details-->
	    	<div class="col-md-6">
	    		<x-admin_card>
			    	<x-slot:card_title> Details  </x-slot>
			    	<x-slot:card_body>
			    		<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Name </label>
				            <div class="col-sm-8">{{ $product->name }}</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Category </label>
				            <div class="col-sm-8">{{ $product->category->name }}</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Show on home  </label>
				            <div class="col-sm-8">{{ $product->show_on_home == 1 ? "Yes" : "No" }}</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Order No  </label>
				            <div class="col-sm-8">{{ $product->order_no }}</div>
		            	</div>

		            	<div class="form-group row">
		              		<label class="col-sm-2 col-form-label"> Status  </label>
				            <div class="col-sm-8">@if($product->status == 0) Active @else Inactive @endif</div>
		            	</div>
		            	
		            	@if($product->drawing)
		            	<div class="form-group row">
                            <label class="col-sm-3 col-form-label">Drawing</label>
                            <div class="col-sm-7">
                                @if(in_array(pathinfo($product->drawing, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp']))
                                    <img src="{{ url('/') }}/uploads/{{ $product->drawing }}" style="height:120px;width:120px;">
                                @else
                                    <a href="{{ url('/') }}/uploads/{{ $product->drawing }}" target="_blank">View drawing</a>
                                @endif
                                
                                
                                <!-- Delete button with proper confirmation -->
                                <form action="{{ route('remove.drawing', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-flat btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this drawing?')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endif
                        
                        @if($product->datasheet)
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Datasheet</label>
                            <div class="col-sm-7">
                                @if(in_array(pathinfo($product->datasheet, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp']))
                                    <img src="{{ url('/') }}/uploads/{{ $product->datasheet }}" style="height:120px;width:120px;">
                                @else
                                    <a href="{{ url('/') }}/uploads/{{ $product->datasheet }}" target="_blank">View datasheet</a>
                                @endif
                                
                                <!-- Delete button with proper confirmation -->
                                <form action="{{ route('remove.datasheet', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-flat btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this datasheet?')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endif

			    	</x-slot>
			    </x-admin_card>
	    	</div>
	    	<!--End Product Details-->

	    	<!--Product Images-->
	    	<div class="col-md-6">
	    		<livewire:product-images :productId="$product->id" />
	    	</div>
	    	<!--End Product Images-->
	    	
	    	<!--Product Combinations starts-->
	    	<div class="col-md-12">
	    		<x-admin_card>
            		<x-slot:card_title> Combinations </x-slot>
		            <x-slot:card_tools>
		                <a class="btn btn-primary btn-sm" href="{{ route('product.combination.add', $product->id) }}">
		                    <i class="fas fa-plus"></i> Create
		                </a>
		            </x-slot>
            		<x-slot:card_body>
			    		@if($product->combinations)
			    			@foreach($product->combinations as $combination)
			    				<x-admin_card>
			    					<x-slot:card_title> 
			    						{{ $combination->name }}  

			    						<a href="{{ route('product.combination.edit', ['productId' => $product->id, 'combinationId' => $combination->id]) }}">
		                                    <span title="Edit" type="button" class="btn btn-flat btn-sm btn-primary">
		                                        <i class="fa fa-edit"></i>
		                                    </span>
		                                </a>

			    					</x-slot>
			    					<x-slot:card_body>
			    					    
			    						<x-admin_card>
			    							<x-slot:card_title> Keyfeatures </x-slot>
			    							<x-slot:card_tools>
										        <a class="btn btn-primary btn-sm" href="{{ route('combination.keyfeature.add', $combination->id)}}">
								                    <i class="fas fa-plus"></i> Create
								                </a>
								            </x-slot>
								            <x-slot:card_body>
								            	@if($combination->productkeyfeatures)
								                <livewire:product-keyfeature-list :results="$combination->productkeyfeatures" />
								                @endif
								            </x-slot>
			    						</x-admin_card>
			    						
			    						<x-admin_card>
			    							<x-slot:card_title> Specifications </x-slot>
			    							<x-slot:card_tools>
										        <a class="btn btn-primary btn-sm" href="{{ route('combination.specification.add', $combination->id)}}">
								                    <i class="fas fa-plus"></i> Create
								                </a>
								            </x-slot>
								            <x-slot:card_body>
								            	@if($combination->productspecifications)
								                <livewire:product-specification-list :results="$combination->productspecifications" />
								                @endif
								            </x-slot>
			    						</x-admin_card>
			    						
			    						<x-admin_card>
			    							<x-slot:card_title> Tsparameters </x-slot>
			    							<x-slot:card_tools>
										        <a class="btn btn-primary btn-sm" href="{{ route('combination.tsparameter.add', $combination->id)}}">
								                    <i class="fas fa-plus"></i> Create
								                </a>
								            </x-slot>
								            <x-slot:card_body>
								            	@if($combination->producttsparameters)
								                <livewire:product-tsparameter-list :results="$combination->producttsparameters" />
								                @endif
								            </x-slot>
			    						</x-admin_card>

			    						<x-admin_card>
			    							<x-slot:card_title> Mountinginfos </x-slot>
			    							<x-slot:card_tools>
										        <a class="btn btn-primary btn-sm" href="{{ route('combination.mountinginfo.add', $combination->id)}}">
								                    <i class="fas fa-plus"></i> Create
								                </a>
								            </x-slot>
								            <x-slot:card_body>
								            	@if($combination->productmountinginfos)
								                <livewire:product-mountinginfo-list :results="$combination->productmountinginfos" />
								                @endif
								            </x-slot>
			    						</x-admin_card>
			    						
			    						<x-admin_card>
			    							<x-slot:card_title> Reconkits </x-slot>
			    							<x-slot:card_tools>
										        <a class="btn btn-primary btn-sm" href="{{ route('combination.reconkit.add', $combination->id)}}">
								                    <i class="fas fa-plus"></i> Create
								                </a>
								            </x-slot>
								            <x-slot:card_body>
								            	@if($combination->productreconkits)
								                <livewire:product-reconkit-list :results="$combination->productreconkits" />
								                @endif
								            </x-slot>
			    						</x-admin_card>
						                
			    					</x-slot:card_body>
			    				</x-admin_card>
			    			@endforeach
			    		@endif
			    	</x-slot>
			    </x-admin_card>
	    	</div>
	    	<!--Product Combinations ends-->
	    </div>  
	</section>
</x-admin_layout>




