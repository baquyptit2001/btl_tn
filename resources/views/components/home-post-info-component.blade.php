<div class="col-md-6">
    <div class="text p-md-5 py-5 px-4 ftco-animate">
        <p class="meta">
            <a href="#"><span class="fa fa-calendar mr-2"></span>{{ $post->release_date }}</a>
            <a href="#"><span class="fa fa-user mr-2"></span>{{ strtoupper($post->user->role) }}</a>
            <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
        </p>
        <h2 class="mb-4"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
        <div class="icon d-flex align-items-center">
            <div class="img" style="background-image: url({{asset("assets/images/person_1.jpg")}});"></div>
            <div class="position pl-3">
                <h4 class="mb-0">{{ $post->user->name }}</h4>
                <span>CEO, Product Designer</span>
            </div>
        </div>
    </div>
</div>
