@extends("admin.layouts.master")

@section("title", "Home Post List")

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Post to show</label>
                    <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected">Select a post</option>
                        @foreach($posts as $post)
                            <option value="{{ $post->slug }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div id="sortable">
        @foreach($homePosts as $key => $homePost)
            <div id="item-{{ $homePost->id }}" class="sort-item" postId="{{ $homePost->id }}">
                <div class="row justify-content-between align-items-center">
                    <div>
                        {{ $homePost->post->title }}
                    </div>
                    <div>
                        <a href="{{ route("admin.home-posts.destroy", $homePost->id) }}" class="btn btn-danger"
                           onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <form method="POST" id="saveOrderForm" action="{{ route("admin.home-posts.update-order") }}">
        @csrf
        <input type="hidden" name="idCsv">
    </form>
    <button id="saveOrder" class="btn btn-primary">Save</button>
@endsection

@section("js")
    <script>
        $(function () {
            $("#sortable").sortable()
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                placeholder: "Select a post",
            })
            $(".select2bs4").on("select2:select", function (e) {
                let post_slug = e.params.data.element.value;
                window.location.href = "{{ route("admin.home-posts.save") }}" + "/" + post_slug;
            })
            $("#saveOrder").click(function () {
                let order = [];
                $(".sort-item").each(function () {
                    order.push($(this).attr("postId"));
                })
                $("#saveOrderForm input[name=idCsv]").val(order.join(","));
                $("#saveOrderForm").submit();
            })
        });
    </script>
@endsection

@section('css')
    <style>
        .sort-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            cursor: move;
        }
    </style>
@endsection
