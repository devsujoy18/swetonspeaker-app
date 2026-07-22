<section class="content-header">
	<div class="container-fluid">
	    <div class="row mb-2">
	        <div class="col-sm-6 clearfix">
	            <h1 style="float: left">{{ $page_header }}</h1>
    			<div style="clear:both;"></div>
	        </div>
	        <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
	              {!! $breadcrumb_list !!}
	            </ol>
	        </div>
	    </div>
	</div>
</section>