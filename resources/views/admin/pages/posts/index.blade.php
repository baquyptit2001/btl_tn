@extends("admin.layouts.master")

@section("title", "Post List")

@section("content")
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Slug</th>
            <th>User</th>
            <th>Category</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" width="100">
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    @if($post->is_published == 1)
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route("admin.posts.edit", $post->slug) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route("admin.posts.destroy", $post->slug) }}" class="btn btn-danger"
                       onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>STT</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
@endsection

@section("js")
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
