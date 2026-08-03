@php
    use App\Models\PageFaq;

    $isActive = old('is_active', $pageFaq->is_active ?? true);
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Page Type</label>
            <select class="custom-select" name="page_type" data-page-faq-type>
                @foreach($pageTypeLabels as $value => $label)
                    <option value="{{ $value }}" @selected($selectedType === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @if($errors->has('page_type'))
                <x-validation_error class="text-danger" :error="$errors->first('page_type')"></x-validation_error>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Select Page</label>
            <select class="custom-select" name="page_key" data-page-faq-select data-selected="{{ $selectedKey }}"></select>
            @if($errors->has('page_key'))
                <x-validation_error class="text-danger" :error="$errors->first('page_key')"></x-validation_error>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label>FAQ Title <span class="text-danger">*</span></label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $pageFaq->title ?? '') }}" required>
    @if($errors->has('title'))
        <x-validation_error class="text-danger" :error="$errors->first('title')"></x-validation_error>
    @endif
</div>

<div class="form-group">
    <label>FAQ Description</label>
    <textarea name="description" class="form-control summernote-faq" rows="6">{{ old('description', $pageFaq->description ?? '') }}</textarea>
    @if($errors->has('description'))
        <x-validation_error class="text-danger" :error="$errors->first('description')"></x-validation_error>
    @endif
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Order No <span class="text-danger">*</span></label>
            <input type="number" min="0" name="order_no" class="form-control" value="{{ old('order_no', $pageFaq->order_no ?? 0) }}" required>
            @if($errors->has('order_no'))
                <x-validation_error class="text-danger" :error="$errors->first('order_no')"></x-validation_error>
            @endif
        </div>
    </div>
</div>

<div class="form-group form-check">
    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="page-faq-active-{{ $pageFaq->id ?? 'new' }}" @checked((bool) $isActive)>
    <label class="form-check-label" for="page-faq-active-{{ $pageFaq->id ?? 'new' }}">Active</label>
</div>
