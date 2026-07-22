<div class="card">
	<div class="card-header">
        <h3 class="card-title"> {{$card_title}}</h3>
        <div class="card-tools">
        	{{ $card_tools ?? ''}}
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    	{{ $card_body }}
    </div>
</div>