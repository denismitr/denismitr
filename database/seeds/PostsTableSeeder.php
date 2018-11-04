<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = \App\Models\Topic::all();

        $topicSyncher = function($post) use ($topics) {
            $post->topics()->attach($topics->shuffle()->random()->id);
            $post->topics()->attach($topics->shuffle()->random()->id);
            $post->topics()->attach($topics->shuffle()->random()->id);
        };

        factory(\App\Models\Post::class, 15)
            ->states('unpublished')
            ->create()
            ->each($topicSyncher);

        $parentPosts = factory(\App\Models\Post::class, 40)
            ->states('published')
            ->create()
            ->each($topicSyncher);

        $parentPosts->each(function($post) {
            if (!mt_rand(0, 7)) {
                factory(\App\Models\Post::class, mt_rand(2, 4))->states('child')->create([
                    'parent_id' => $post,
                ]);
            }
        });
    }
}
