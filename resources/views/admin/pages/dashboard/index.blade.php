@extends("admin.layouts.master")
@section("title", "Dashboard")
@section("content")
    Hello, {{ auth()->user()->name }}
@endsection
