<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Console\Command;
use Psy\Util\Str;

class SeedDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $categoryIds = Category::all()->pluck('id')->toArray();
//        $this->info('Seeding data...');
//        $numberOfPosts = $this->ask('How many posts do you want to seed?');
//        while (!is_numeric($numberOfPosts)) {
//            $this->error('Please enter a number!');
//            $numberOfPosts = $this->ask('How many posts do you want to seed?');
//        }
//        $faker = Factory::create();
//        $this->info("Seeding {$numberOfPosts} posts...");
//        while ($numberOfPosts--) {
//            $title = self::quickRandom(10);
//            $content = self::quickRandom(100);
//            $category_id = $categoryIds[array_rand($categoryIds)];
//            $image = 'https://picsum.photos/1200/800';
//            $user_id = 1;
//            $post = new Post();
//            $post->title = $faker->sentence;
//            $post->content = $faker->paragraphs(3, true);
//            $post->is_published = true;
//            $post->category_id = $category_id;
//            $post->image = $image;
//            $post->user_id = $user_id;
//            $post->save();
//        }
//        for ($i = 0; $i < 1000; $i++) {
//            $postView = new \App\Models\PostView();
//            $post_ids = Post::all()->pluck('id')->toArray();
//            $postView->post_id = $post_ids[array_rand($post_ids)];
//            $postView->user_id = array_rand([1, 2, null]);
//            $postView->created_at = now()->subDays(rand(0, 30));
//            $postView->save();
//        }
//        $postViews = \App\Models\PostView::all();
//        foreach ($postViews as $postView) {
//            if ($postView->user_id == 0) {
//                $postView->user_id = null;
//                $postView->save();
//            }
//        }
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

}
