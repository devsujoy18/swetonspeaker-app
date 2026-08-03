@php
    use App\Models\SeoMeta;

    $robots = old('robots', $seoMeta->robots ?? 'index, follow');
    $isActive = old('is_active', $seoMeta->is_active ?? true);
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Page Type</label>
            <select class="custom-select" name="page_type" data-seo-page-type>
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
            <select class="custom-select" name="page_key" data-seo-page-select data-selected="{{ $selectedKey }}"></select>
            @if($errors->has('page_key'))
                <x-validation_error class="text-danger" :error="$errors->first('page_key')"></x-validation_error>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label>SEO Title <span class="text-danger">*</span></label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $seoMeta->title ?? '') }}" required>
    @if($errors->has('title'))
        <x-validation_error class="text-danger" :error="$errors->first('title')"></x-validation_error>
    @endif
</div>

<div class="form-group">
    <label>Keywords</label>
    <textarea name="keywords" class="form-control" rows="3">{{ old('keywords', $seoMeta->keywords ?? '') }}</textarea>
    @if($errors->has('keywords'))
        <x-validation_error class="text-danger" :error="$errors->first('keywords')"></x-validation_error>
    @endif
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description', $seoMeta->description ?? '') }}</textarea>
    @if($errors->has('description'))
        <x-validation_error class="text-danger" :error="$errors->first('description')"></x-validation_error>
    @endif
</div>

<div class="form-group">
    <label>Page Description</label>
    <textarea name="page_description" class="form-control summernote-seo" rows="6">{{ old('page_description', $seoMeta->page_description ?? '') }}</textarea>
    @if($errors->has('page_description'))
        <x-validation_error class="text-danger" :error="$errors->first('page_description')"></x-validation_error>
    @endif
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Canonical URL</label>
            <input type="url" name="canonical_url" class="form-control" placeholder="https://example.com/page" value="{{ old('canonical_url', $seoMeta->canonical_url ?? '') }}">
            @if($errors->has('canonical_url'))
                <x-validation_error class="text-danger" :error="$errors->first('canonical_url')"></x-validation_error>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Robots <span class="text-danger">*</span></label>
            <input type="text" name="robots" class="form-control" value="{{ $robots }}" required>
            @if($errors->has('robots'))
                <x-validation_error class="text-danger" :error="$errors->first('robots')"></x-validation_error>
            @endif
        </div>
    </div>
</div>

<div class="form-group form-check">
    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="seo-active-{{ $seoMeta->id ?? 'new' }}" @checked((bool) $isActive)>
    <label class="form-check-label" for="seo-active-{{ $seoMeta->id ?? 'new' }}">Active</label>
</div>
