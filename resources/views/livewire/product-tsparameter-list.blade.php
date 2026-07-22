<div 
x-init="
        setInterval(() => {
            $wire.$refresh()
        }, 1000)
    ">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Name</th>
                <th>Value</th>
                <th>Order No</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($listData)
                @foreach($listData as $tsparameter)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tsparameter->tsparameter->name }}</td>
                        <td>{{ $tsparameter->value }}</td>
                        <td>{{ $tsparameter->order_no }}</td>
                        <td>
                            @if($tsparameter->status == 0)
                                <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-success" wire:click.prevent="changeStatus({{$tsparameter->id}})">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            @else
                                <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-danger" 
                                wire:click.prevent="changeStatus({{$tsparameter->id}})">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('combination.tsparameter.edit', $tsparameter->id) }}">
                                <span title="Edit" type="button" class="btn btn-flat btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </a>

                            <a href="javascript:void(0)">
                                <span title="Delete" 
                                type="button" 
                                class="btn btn-flat btn-sm btn-danger" 
                                wire:click.prevent="deleteData({{$tsparameter->id}})" 
                                wire:confirm="Are you sure you want to delete this image ?">
                                    <i class="fa fa-times"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

