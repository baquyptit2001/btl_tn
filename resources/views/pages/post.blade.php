@extends('layouts.app')

@section('title', $post->title)

@section('active', 'post')

@section('css')
<style>
    .reply-comment {
        cursor: pointer;
    }
</style>
@endsection

@section('content')
    <section class="hero-wrap hero-wrap-2">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 text-center ftco-animate pt-5">
                    <h1 class="mb-3 bread">Our Blog</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Blog Details<i
                                class="fa fa-chevron-right"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container-fluid px-md-4">
            <div class="row no-gutters">
                <div class="col-md-12 blog-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img img-blog js-fullheight"
                             style="background-image: url({{ $post->image_url }});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 py-5 px-4 ftco-animate">
                                <p class="meta">
                                    <a href="#"><span class="fa fa-calendar mr-2"></span>{{ $post->release_date }}</a>
                                    <a href="#"><span class="fa fa-user mr-2"></span>{{ ucfirst($post->user->role) }}
                                    </a>
                                    <a href="#"><span class="fa fa-eye"></span>{{ $post->view_count }}</a>
                                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                                </p>
                                <h2 class="mb-4"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
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
                    </div>
                    <div class="row justify-content-center pt-4 py-md-5">
                        <div class="col-md-7">
                            <div class="py-4">
                                {!! $post->content !!}
                            </div>
                            <div class="tag-widget post-tag-container mb-5 mt-5">
                                <div class="tagcloud">
                                    <a href="#" class="tag-cloud-link">Life</a>
                                    <a href="#" class="tag-cloud-link">Sport</a>
                                    <a href="#" class="tag-cloud-link">Tech</a>
                                    <a href="#" class="tag-cloud-link">Work</a>
                                </div>
                            </div>
                            <div class="comment-post py-5">
                                <h3 class="mb-5">{{ $post->comment_count }} Comments</h3>
                                <ul class="comment-list">
                                    @foreach($post->comments as $comment)
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <x-avatar :name="$comment->user->name"/>
                                            </div>
                                            <div class="comment-body">
                                                <h3>{{ $comment->user->name }}</h3>
                                                <div class="meta">{{ $comment->date }}</div>
                                                <p>{{ $comment->content }}</p>
                                                <p class="reply-comment" comment-id="{{ $comment->id }}"><a class="reply">Reply</a></p>
                                            </div>
                                        </li>
                                        <ul class="children">
                                            @foreach($comment->children as $child)
                                                <li class="comment">
                                                    <div class="vcard bio">
                                                        <x-avatar :name="$child->user->name"/>
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>{{ $child->user->name }}</h3>
                                                        <div class="meta">{{ $child->date }}</div>
                                                        <p>{{ $child->content }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <form id="reply-{{ $comment->id }}" style="display: none" action="{{ route('comments.save') }}" method="post" class="comment-form">
                                                @csrf
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="message">Reply</label>
                                                        <textarea name="content" id="message" cols="30" rows="10"
                                                                  class="form-control"></textarea>
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="submit" value="Post Comment"
                                                               class="btn py-3 px-4 btn-primary">
                                                    </div>
                                                </div>
                                            </form>
                                        </ul>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Leave a comment</h3>
                                @auth()
                                    <form action="{{ route('comments.save') }}" method="post" class="p-5 comment-form">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea name="content" id="message" cols="30" rows="10"
                                                          class="form-control"></textarea>
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Post Comment"
                                                       class="btn py-3 px-4 btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                @endauth
                                @guest()
                                    <p>Please <a href="{{ route('login') }}">login</a> to comment</p>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.reply-comment').click(function () {
                let commentId = $(this).attr('comment-id');
                console.log($(`#reply-${commentId}`))
                $(`#reply-${commentId}`).show();
            });
        });
    </script>
@endsection
