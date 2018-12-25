<?php

namespace App\Services;


use App\Models\Post;

class FullTextSearch
{
    const MIN_SCORE = 0.5;

    /**
     * @param string|null $q
     * @return \Illuminate\Support\Collection
     */
    public function search($q)
    {
        return $this->buildQuery(
            $this->cleanNeedle($q)
        )
        ->get()
        ->map(function($post) {
            $post->score =  $post->name_score + 1 + $post->body_score;

            if ($post->name_score > 0) {
                $post->score += 1;
            }

            return $post;
        })
        ->where('score', '>=', static::MIN_SCORE)
        ->sortByDesc('score');
    }

    /**
     * @param string $needle
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    protected function buildQuery(string $needle)
    {
        return Post::query()
            ->with(['topics'])
            ->topLevel()
            ->selectRaw("
                posts.*,
                MATCH (name) AGAINST (?) as name_score,
                MATCH (body) AGAINST (? IN NATURAL LANGUAGE MODE) as body_score
            ", [$needle, $needle])
            ->whereNotNull('posts.body')
            ->where(function($query) use ($needle) {
                $query
                    ->whereRaw("MATCH (body) AGAINST (? IN NATURAL LANGUAGE MODE)", [$needle])
                    ->orWhereRaw("MATCH (name) AGAINST (?)", [$needle]);
            });
    }

    /**
     * @param $q
     * @return string
     */
    protected function cleanNeedle($q): string
    {
        return strval($q);
    }
}