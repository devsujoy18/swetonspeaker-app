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
                @foreach($listData as $reconkit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reconkit->reconkit->name }}</td>
                        <td>{{ $reconkit->value }}</td>
                        <td>{{ $reconkit->order_no }}</td>
                        <td>
                            @if($reconkit->status == 0)
                                <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-success" wire:click.prevent="changeStatus({{$reconkit->id}})">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            @else
                                <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-danger" 
                                wire:click.prevent="changeStatus({{$reconkit->id}})">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('combination.reconkit.edit', $reconkit->id) }}">
                                <span title="Edit" type="button" class="btn btn-flat btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </a>

                            <a href="javascript:void(0)">
                                <span title="Delete" 
                                type="button" 
                                class="btn btn-flat btn-sm btn-danger" 
                                wire:click.prevent="deleteData({{$reconkit->id}})" 
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

