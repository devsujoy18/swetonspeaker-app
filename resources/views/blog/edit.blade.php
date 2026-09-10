<x-admin_layout>
    <x-admin_breadcrumb>
        <x-slot:page_header>Blog</x-slot>
        <x-slot:breadcrumb_list>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}"> Blog </a></li>
            <li class="breadcrumb-item active"> Edit</li>
        </x-slot>
    </x-admin_breadcrumb>
    <section class="content">
        <x-admin_card>
            <x-slot:card_title> Edit </x-slot>
            <x-slot:card_body>
                <form role="form" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title', $blog->title) }}">
                                @if($errors->has('title'))
                                <x-validation_error class="text-danger" :error="$errors->first('title')"></x-validation_error>
                                @endif
                            </div> 
                            
                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <select class="custom-select" name="type">
                                    <option value="">Select</option>
                                    <option value="blog" @selected(old('type', $blog->type) == "blog")>Blog</option>
                                    <option value="event" @selected(old('type', $blog->type) == "event")>Event</option>
                                </select>
                                @if($errors->has('type'))
                                <x-validation_error class="text-danger" :error="$errors->first('type')"></x-validation_error>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Publish Date</label>
                                <input 
                                    type="date" 
                                    name="publish_date" 
                                    class="form-control" 
                                    value="{{ old('publish_date', $blog->publish_date ? $blog->publish_date->format('Y-m-d') : '') }}">
                                @if($errors->has('publish_date'))
                                    <x-validation_error class="text-danger" :error="$errors->first('publish_date')"></x-validation_error>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" name="author" class="form-control" placeholder="Enter Author" value="{{ old('author', $blog->author) }}">
                                @if($errors->has('author'))
                                <x-validation_error class="text-danger" :error="$errors->first('author')"></x-validation_error>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Video Link</label>
                                <input type="text" name="video_link" class="form-control" placeholder="Enter Video Link" value="{{ old('video_link', $blog->video_link) }}">
                                @if($errors->has('video_link'))
                                <x-validation_error class="text-danger" :error="$errors->first('video_link')"></x-validation_error>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" class="form-control" placeholder="Enter Short Description">{{ old('short_description', $blog->short_description) }}</textarea>
                                @if($errors->has('short_description'))
                                <x-validation_error class="text-danger" :error="$errors->first('short_description')"></x-validation_error>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Long Description</label>
                                <textarea name="long_description" class="form-control summernote" placeholder="Enter Long Description">{{ old('long_description', $blog->long_description) }}</textarea>
                                @if($errors->has('long_description'))
                                <x-validation_error class="text-danger" :error="$errors->first('long_description')"></x-validation_error>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Order No <span class="text-danger">*</span></label>
                                <input type="text" name="order_no" class="form-control" placeholder="Enter Order No" value="{{ old('order_no', $blog->order_no) }}">
                                @if($errors->has('order_no'))
                                <x-validation_error class="text-danger" :error="$errors->first('order_no')"></x-validation_error>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Is Current Event</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_current_event" value="1" @if(old('is_current_event', $blog->is_current_event) == '1') checked @endif>
                                    <label class="form-check-label">Yes</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
				              	<label>Show on home </label>
					            <div class="form-check">
						            <input class="form-check-input" type="checkbox" name="show_on_home" value="1" @if(old('show_on_home', $blog->show_on_home) == '1') checked @endif>
						            <label class="form-check-label">Yes</label>
					            </div>
			            </div>

                            <div class="form-group">
                                <label for="show_main_image_on_details">Show Main Image on Details Page</label>
                                <select id="show_main_image_on_details" name="show_main_image_on_details" class="form-control">
                                    <option value="1" @selected((string) old('show_main_image_on_details', $blog->show_main_image_on_details ? '1' : '0') === '1')>Yes</option>
                                    <option value="0" @selected((string) old('show_main_image_on_details', $blog->show_main_image_on_details ? '1' : '0') === '0')>No</option>
                                </select>
                                @if($errors->has('show_main_image_on_details'))
                                <x-validation_error class="text-danger" :error="$errors->first('show_main_image_on_details')"></x-validation_error>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Main Image </label>
                                <input type="file" name="image_path" class="form-control">
                                @if($errors->has('image_path'))
                                <x-validation_error class="text-danger" :error="$errors->first('image_path')"></x-validation_error>
                                @endif
                            </div>

                            <div class="form-group">
                                <img src="{{ url('/') }}/uploads/{{ $blog->image_path }}" style="height:60px;width: 60px;">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" value="Submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </x-slot>
        </x-admin_card>
    </section>
<x-slot name="scripts">
<script src="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('.summernote').summernote({
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            callbacks: {
                onImageUpload(files) {
                    Array.from(files).forEach((file) => uploadBlogContentImage(file, this));
                },
            },
        });
    });

    function uploadBlogContentImage(file, editor) {
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('image', file);

        $.ajax({
            url: '{{ route('blog.content-image.upload') }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success(response) {
                $(editor).summernote('insertImage', response.url);
            },
            error(response) {
                const message = response.responseJSON?.message || 'The image could not be uploaded.';
                alert(message);
            },
        });
    }
</script>
</x-slot>
</x-admin_layout>
