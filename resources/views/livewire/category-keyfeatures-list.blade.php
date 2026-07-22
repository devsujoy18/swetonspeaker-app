<div>
    <x-admin_card>
            <x-slot:card_title> Keyfeatures </x-slot>
            <x-slot:card_tools>
                <a class="btn btn-primary btn-sm" href="{{ route('category.keyfeatures.add', $categoryId) }}">
                    <i class="fas fa-plus"></i> Create
                </a>
            </x-slot>
            <x-slot:card_body>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th style="width: 40px">Label</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($category->keyfeatures as $keyfeature)
                        <tr>
                            <td>{{ $keyfeature->pivot->order_no }}</td>
                            <td>{{ $keyfeature->name }}</td>
                            <td>{{ $keyfeature->pivot->keyfeature_value }}</td>
                            <td>
                                @if($keyfeature->pivot->status == 0)
                                <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-success" wire:click.prevent="changeStatus({{$keyfeature->pivot->id}})">
                                    <i class="fas fa-check-circle"></i> Active
                                </span>
                                @else
                                <span title="Change Status" type="button" class="btn btn-flat btn-sm btn-danger" wire:click.prevent="changeStatus({{$keyfeature->pivot->id}})">
                                    <i class="fas fa-check-circle"></i> Inctive
                                </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('category.keyfeatures.edit', ['categoryId' => $categoryId, 'keyfeatureId' => $keyfeature->pivot->id]) }}">
                                    <span title="Edit" type="button" class="btn btn-flat btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach

                    @if($category->keyfeatures->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">No data found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </x-slot:card_body>
    </x-admin_card>
</div>