@extends("admin.layouts.master")

@section("title", "Edit Post")

@section("content")
    <form method="post" action="{{ route("admin.posts.update", $post->slug) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="exampleSelectBorder">Category</label>
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="category_id">
                    <option>-- Select Category --</option>
                    @foreach($categories as $category)
                        @if($category->id == $post->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Thumbnail</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile"
                               onchange="$('#thumbnail').attr('src', window.URL.createObjectURL(this.files[0]))"
                               name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>

                <img id="thumbnail" style="margin-top:15px;max-height:100px;"
                     src="{{ $post->image_url }}" alt="">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content"
                          placeholder="Enter Content"></textarea>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section("js")
    <script>
        tinymce.init({
            selector: "#content",
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            setup: function (editor) {
                editor.on('init', function (e) {
                    editor.setContent(`{!! $post->content !!}`);
                });
            },
            file_picker_callback: function (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                let type = 'image' === meta.filetype ? 'Images' : 'Files',
                    url = '/laravel-filemanager?editor=tinymce5&type=' + type;

                tinymce.activeEditor.windowManager.openUrl({
                    url: url,
                    title: 'Post Image',
                    width: x * 0.8,
                    height: y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            },
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
        });

        $(function () {
            bsCustomFileInput.init();
            {{--function insert_contents(inst){--}}
            {{--    inst.setContent(`{{$post->content}}`);--}}
            {{--}--}}
        });
    </script>
@endsection
