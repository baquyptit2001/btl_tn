@extends("admin.layouts.master")

@section("title", "Create Category")

@section("content")
    <form method="post" action="{{ route("admin.categories.store") }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter Description"></textarea>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
