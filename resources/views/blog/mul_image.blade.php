<x-admin_layout>
    <x-admin_breadcrumb>
        <x-slot:page_header>Blog</x-slot>
        <x-slot:breadcrumb_list>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}"> Blog </a></li>
            <li class="breadcrumb-item active"> Create</li>
        </x-slot>
    </x-admin_breadcrumb>
    <section class="content">
        @if($message = Session::get('success'))
        <x-alert type="success" :message="$message"></x-alert>
        @endif
        <x-admin_card>
            <x-slot:card_title> Create </x-slot>
            <x-slot:card_body>
                <form role="form" action="{{ route('blog.uploadImages', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Images </label>
                                <input type="file" name="img_path[]" class="form-control" multiple>
                                @if($errors->has('img_path'))
                                <x-validation_error class="text-danger" :error="$errors->first('img_path')"></x-validation_error>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" value="Submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8 input-group">
                        <div class="timeline-item">
                        <div class="timeline-body">
                          @foreach($blog->blogimages as $img)
                          <img src="{{ url('/') }}/uploads/{{ $img->img_path }}" style="height:60px;width: 60px;">
                          <a href="{{ route('delete.uploadImages', $img->id)}}" onclick="return confirm('Are you sure you want to delete this image?')"><i class="fas fa-trash-alt"></i></a>
                          @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-admin_card>
    </section>
</x-admin_layout>
