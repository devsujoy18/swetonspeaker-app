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
                @foreach($listData as $keyfeatures)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $keyfeatures->keyfeature->name }}</td>
                        <td>{{ $keyfeatures->value }}</td>
                        <td>{{ $keyfeatures->order_no }}</td>
                        <td>
                            @if($keyfeatures->status == 0)
                                <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-success" wire:click.prevent="changeStatus({{$keyfeatures->id}})">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            @else
                                <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-danger" 
                                wire:click.prevent="changeStatus({{$keyfeatures->id}})">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('combination.keyfeature.edit', $keyfeatures->id) }}">
                                <span title="Edit" type="button" class="btn btn-flat btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </a>

                            <a href="javascript:void(0)">
                                <span title="Delete" 
                                type="button" 
                                class="btn btn-flat btn-sm btn-danger" 
                                wire:click.prevent="deleteData({{$keyfeatures->id}})" 
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
