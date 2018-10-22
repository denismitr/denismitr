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

        factory(\App\Models\Post::class, 10)
            ->states('unpublished')
            ->create()
            ->each($topicSyncher);

        factory(\App\Models\Post::class, 50)
            ->states('published')
            ->create()
            ->each($topicSyncher);
    }
}
