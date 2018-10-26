<?php

namespace App\Models;


trait Publishable
{
    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return !! $this->published_at;
    }

    public function publish()
    {
        if (!$this->published_at) {
            $this->update([
                'published_at' => now()
            ]);
        }
    }

    public function unpublish()
    {
        if ($this->isPublished()) {
            $this->update([
                'published_at' => null
            ]);
        }
    }
}