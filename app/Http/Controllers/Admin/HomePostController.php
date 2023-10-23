<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePost;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->whereNotIn('id', (new \App\Models\HomePost)->getIdsAttribute())
            ->get();
        $homePosts = HomePost::query()
            ->orderBy('order')
            ->get();
        return view('admin.pages.home-posts.index', compact('posts', 'homePosts'));
    }

    public function save(Request $request, $slug) {
        $post = Post::query()
            ->where('slug', $slug)
            ->firstOrFail();
        $homePost = new HomePost();
        $homePost->post_id = $post->id;
        $maxOrder = HomePost::query()
            ->max('order');
        $homePost->order = $maxOrder + 1;
        $homePost->save();
        return redirect()->back();
    }

    public function destroy(HomePost $homePost)
    {
        $homePost->delete();
        return redirect()->back();
    }

    public function updateOrder(Request $request)
    {
        $idCsv = $request->get('idCsv');
        $ids = explode(',', $idCsv);
        $order = 1;
        foreach ($ids as $id) {
            $homePost = HomePost::query()
                ->where('id', $id)
                ->firstOrFail();
            $homePost->order = $order++;
            $homePost->save();
        }

        return redirect()->back();
    }
}
