@extends("layouts.app")
@section('title', 'Articles')

@section('content')
    <section class="ftco-section">
        <div class="container-fluid">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6 col-lg-4 blog-wrap blog-wrap-2 px-md-5 ftco-animate">
                        <a href="blog-single.html" class="img img-blog w-100 border d-block"
                           style="background-image: url({{ $post->image_url }});">
                        </a>
                        <div class="text text-2 py-4 p-0 ftco-animate">
                            <p class="meta">
                                <a href="#"><span class="fa fa-calendar mr-2"></span>{{ $post->release_date }}</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>{{ strtoupper($post->user->role) }}</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> {{ $post->comments->count() }}</a>
                            </p>
                            <h2 class="mb-4"><a href="blog-single.html">{{ $post->title }}</a>
                            </h2>
                            <div class="icon d-flex align-items-center">
                                <x-avatar :name="$post->user->name"/>
                                <div class="position pl-3">
                                    <h4 class="mb-0">{{ $post->user->name }}</h4>
                                    <span>CEO, Product Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
