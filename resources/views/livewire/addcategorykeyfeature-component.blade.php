<div>
    @if($message = Session::get('error'))
        <x-alert type="danger" :message="$message"></x-alert>
        @endif
    <form wire:submit.prevent="storeData">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Keayfeature <span class="text-danger">*</span></label>
                    <select class="custom-select" wire:model="keyfeature_id">
                        <option value="">Select</option>
                        @foreach($keyfeatures as $keyfeature)
                        <option value="{{ $keyfeature->id }}">{{ $keyfeature->name }}</option>
                        @endforeach
                    </select> 
                    @if($errors->has('keyfeature_id'))
                        <x-validation_error class="text-danger" :error="$errors->first('keyfeature_id')"></x-validation_error>
                    @endif  
                </div>
                <div class="form-group">
                    <label>Value <span class="text-danger">*</span></label>
                    <input type="text" wire:model="keyfeature_value" class="form-control" placeholder="Enter keyfeature value">
                    @if($errors->has('keyfeature_value'))
                        <x-validation_error class="text-danger" :error="$errors->first('keyfeature_value')"></x-validation_error>
                    @endif  
                </div>
                <div class="form-group">
                    <label>Order No <span class="text-danger">*</span></label>
                    <input type="text" wire:model="order_no" class="form-control" placeholder="Enter order no" >  
                    @if($errors->has('order_no'))
                        <x-validation_error class="text-danger" :error="$errors->first('order_no')"></x-validation_error>
                    @endif   
                </div>
            </div>
        </div>
        <button value="Submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</div>
