@php
    use App\Models\BlogScript;

    $isActive = old('is_active', $blogScript->is_active ?? true);
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="blog-script-page-type-{{ $blogScript->id ?? 'new' }}">Content Type</label>
            <select id="blog-script-page-type-{{ $blogScript->id ?? 'new' }}" class="custom-select" name="page_type" data-blog-script-type>
                <option value="{{ BlogScript::PageTypeBlog }}" @selected($selectedType === BlogScript::PageTypeBlog)>Blog</option>
                <option value="{{ BlogScript::PageTypeEvent }}" @selected($selectedType === BlogScript::PageTypeEvent)>Event</option>
            </select>
            @if($errors->has('page_type'))
                <x-validation_error class="text-danger" :error="$errors->first('page_type')"></x-validation_error>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="blog-script-target-{{ $blogScript->id ?? 'new' }}">Select Blog/Event</label>
            <select id="blog-script-target-{{ $blogScript->id ?? 'new' }}" class="custom-select" name="blog_id" data-blog-script-select data-selected="{{ $selectedBlogId }}"></select>
            @if($errors->has('blog_id'))
                <x-validation_error class="text-danger" :error="$errors->first('blog_id')"></x-validation_error>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <label for="blog-script-position-{{ $blogScript->id ?? 'new' }}">Add Script To</label>
    <select id="blog-script-position-{{ $blogScript->id ?? 'new' }}" class="custom-select" name="position">
        <option value="{{ BlogScript::PositionHeader }}" @selected(old('position', $blogScript->position ?? BlogScript::PositionHeader) === BlogScript::PositionHeader)>Header</option>
        <option value="{{ BlogScript::PositionFooter }}" @selected(old('position', $blogScript->position ?? BlogScript::PositionHeader) === BlogScript::PositionFooter)>Footer</option>
    </select>
    @if($errors->has('position'))
        <x-validation_error class="text-danger" :error="$errors->first('position')"></x-validation_error>
    @endif
</div>

<div class="form-group">
    <label for="blog-script-content-{{ $blogScript->id ?? 'new' }}">Script <span class="text-danger">*</span></label>
    <textarea id="blog-script-content-{{ $blogScript->id ?? 'new' }}" name="script" class="form-control font-monospace" rows="12" spellcheck="false" required>{{ old('script', $blogScript->script ?? '') }}</textarea>
    <small class="form-text text-muted">Paste the complete <code>&lt;script&gt;...&lt;/script&gt;</code> block exactly as provided. It is intentionally not altered or sanitized.</small>
    @if($errors->has('script'))
        <x-validation_error class="text-danger" :error="$errors->first('script')"></x-validation_error>
    @endif
</div>

<div class="form-group form-check">
    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="blog-script-active-{{ $blogScript->id ?? 'new' }}" @checked((bool) $isActive)>
    <label class="form-check-label" for="blog-script-active-{{ $blogScript->id ?? 'new' }}">Active</label>
</div>
