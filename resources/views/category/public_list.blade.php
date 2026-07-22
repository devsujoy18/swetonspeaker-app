<x-frontend_layout>
	<section class="page-header">
        <div class="page-header-bg" style="background-image: url('{{ asset("public_assets/images/backgrounds/page-header-bg.jpg") }}')"></div>
        <div class="container">
                <div class="page-header__inner">
                    <h2>{{ $typeName }}</h2>
                    
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>//</span></li>
                        <li>{{ $typeName }}</li>
                    </ul>
                </div>
            </div>

    </section>
	<!--Product Start-->
        <section class="product">
            <div class="container">
                <div class="row">
                    
                    <div class="col-xl-12 col-lg-12">
                        <div class="product__items">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__showing-result">
                                        <div class="product__showing-text-box">
                                            <p class="product__showing-text">Showing {{ count($categories) }} of {{ count($categories) }} results</p>
                                        </div>
                                        <div class="product__showing-sort">
                                            <div class="select-box">
                                                 <div class="btn-group">
                                                    <a href="#" id="list" class="btn btn-default btn-sm"><i class="fas fa-list"></i></a> 
                                                    <a href="#" id="grid" class="btn btn-default btn-sm"><i class="fas fa-th-large"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__all">
                                <div class="row" id="products">

                                    @if($categories)
                        				@foreach($categories as $category)
		                                    <div class="item col-xl-6 col-lg-6 col-md-6">
		                                       <div class="services-one1__single sv-wth">
		                                            <div class="services-one1__img">
		                                                <div class="thumbnail">
		                                                   <img src="{{ url('/') }}/uploads/{{ $category->image }}" alt="{{ $category->name }}"> 
		                                                </div>
		                                            </div>
		                                            <div class="services-one1__content">
		                                                <h3 class="services-one__title"><a href="#">{{ $category->name }}</a></h3>
		                                                <div class="hm-keyft">
		                                                    <div class="row">
		                                                        
		                                                         @if($category->keyfeatures)
			                                                    @foreach($category->keyfeatures as $keyfeature)
			                                                    <div class="col-6 col-md-12">
			                                                        <p><strong>{{ $keyfeature->name }} :</strong><br>{{ $keyfeature->pivot->keyfeature_value }}</p>
			                                                        </div>
			                                                    @endforeach
			                                                @endif    
		                                                        
		                                                    </div>
		                                                              
		                                                </div>
		                                                @php
                                                            $type = $category->type_id == 1 ? "pro-loudspeaker" : "home-loudspeaker";
                                                        @endphp
		                                                <div class="services-one__btn-box">
		                                                    <a href="{{ route('category.products', [ 
                                                            'type' => $type, 
                                                            'slug' => $category->slug
                                                            ] )}}" class="thm-btn services-one__btn">Show More</a>
                                                            
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
	                                    @endforeach
                    				@endif
                                    
                                    
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Product End-->
</x-frontend_layout>