<x-frontend_layout>
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url('{{ asset("public_assets/images/backgrounds/page-header-bg.jpg") }}')"></div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Compare</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><span>></span></li>
                    <li>Compare</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="product-details">
    <div class="container">
        {{--<div class="row">
            @foreach ($products_with_combinations as $product)
                @foreach ($product->combinations as $combination)
                    <div class="col-md-4">
                        <h3>{{ $product->name }} ({{ $product->category->name }}) {{ $combination->name }}</h3>

                        <!-- Key Features -->
                        <h5>Key Features</h5>
                        <ul>
                            @if($combination->productkeyfeatures && $combination->productkeyfeatures->isNotEmpty())
                                @foreach ($combination->productkeyfeatures as $feature)
                                    <li>{{ $feature->keyfeature->name }} - {{ $feature->value }}</li>
                                @endforeach
                            @else
                                <li>No data available</li>
                            @endif
                        </ul>
                        <hr>

                        <!-- Specifications -->
                        <h5>Specification</h5>
                        <ul>
                            @if($combination->productspecifications && $combination->productspecifications->isNotEmpty())
                                @foreach ($combination->productspecifications as $specification)
                                    <li>{{ $specification->specification->name }} - {{ $specification->value }}</li>
                                @endforeach
                            @else
                                <li>No data available</li>
                            @endif
                        </ul>
                        <hr>

                        <!-- Tsparameters -->
                        <h5>Tsparameter</h5>
                        <ul>
                            @if($combination->producttsparameters && $combination->producttsparameters->isNotEmpty())
                                @foreach ($combination->producttsparameters as $tsparameter)
                                    <li>{{ $tsparameter->tsparameter->name }} - {{ $tsparameter->value }}</li>
                                @endforeach
                            @else
                                <li>No data available</li>
                            @endif
                        </ul>
                        <hr>

                        <!-- Mounting Info -->
                        <h5>Mounting Info</h5>
                        <ul>
                            @if($combination->productmountinginfos && $combination->productmountinginfos->isNotEmpty())
                                @foreach ($combination->productmountinginfos as $mountinginfo)
                                    <li>{{ $mountinginfo->mountinginfo->name }} - {{ $mountinginfo->value }}</li>
                                @endforeach
                            @else
                                <li>No data available</li>
                            @endif
                        </ul>
                        <hr>

                        <!-- Recon Kit -->
                        <h5>Recon Kit</h5>
                        <ul>
                            @if($combination->productreconkits && $combination->productreconkits->isNotEmpty())
                                @foreach ($combination->productreconkits as $reconkit)
                                    <li>{{ $reconkit->reconkit->name }} - {{ $reconkit->value }}</li>
                                @endforeach
                            @else
                                <li>No data available</li>
                            @endif
                        </ul>
                    </div>
                @endforeach
            @endforeach
        </div>--}}
        
        <div class="compare-blk">
            <h4>Keyfeatures</h4>
            <div class="row">
                @foreach($keyfeatures as $keyfeatureName => $keyfeatureValues)    
                    <div class="col-md-4">
                        <div class="blkcomp-inn">
                            <h5>{{ $keyfeatureName }}</h5>
                            <ul>
                                @foreach($keyfeatureValues as $value)
                                <li>
                                    <h6>{{ $value['product_name'] }} {{ $value['combination_name'] }}</h6>
                                    <p>{{ $value['value'] }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="compare-blk">
            <h4>Specification</h4>
            <div class="row">
                @foreach($specifications as $specName => $specValues)    
                    <div class="col-md-4">
                        <div class="blkcomp-inn">
                            <h5>{{ $specName }}</h5>
                            <ul>
                                @foreach($specValues as $value)
                                <li>
                                    <h6>{{ $value['product_name'] }} {{ $value['combination_name'] }}</h6>
                                    <p>{{ $value['value'] }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="compare-blk">
            <h4>Tsparameter</h4>
            <div class="row">
                @foreach($tsparameters as $tsparameterName => $tsparameterValues)    
                    <div class="col-md-4">
                        <div class="blkcomp-inn">
                            <h5>{{ $tsparameterName }}</h5>
                            <ul>
                                @foreach($tsparameterValues as $value)
                                <li>
                                    <h6>{{ $value['product_name'] }} {{ $value['combination_name'] }}</h6>
                                    <p>{{ $value['value'] }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="compare-blk">
            <h4>Mounting Info</h4>
            <div class="row">
                @foreach($mountinginfos as $mountinginfoName => $mountinginfoValues)    
                    <div class="col-md-4">
                        <div class="blkcomp-inn">
                            <h5>{{ $mountinginfoName }}</h5>
                            <ul>
                                @foreach($mountinginfoValues as $value)
                                <li>
                                    <h6>{{ $value['product_name'] }} {{ $value['combination_name'] }}</h6>
                                    <p>{{ $value['value'] }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="compare-blk">
            <h4>Recon Kit</h4>
            <div class="row">
                @foreach($reconkits as $reconkitName => $reconkitValues)    
                    <div class="col-md-4">
                        <div class="blkcomp-inn">
                            <h5>{{ $reconkitName }}</h5>
                            <ul>
                                @foreach($reconkitValues as $value)
                                <li>
                                    <h6>{{ $value['product_name'] }} {{ $value['combination_name'] }}</h6>
                                    <p>{{ $value['value'] }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</section>

    
</x-frontend_layout>