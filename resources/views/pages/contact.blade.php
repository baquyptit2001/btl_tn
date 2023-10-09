@extends("layouts.app")
@php($title = "Contact")
@section('title', $title)
@section('active', 'contact')

@section('content')
    <x-hero-bread :$title name="contact" />
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('li[nav-name="contact"]').addClass('active');
        });
    </script>
@endsection
