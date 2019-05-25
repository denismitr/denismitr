<?php

declare(strict_types=1);

namespace App\Services;


use Illuminate\Http\Request;

class ContactHash
{
    /**
     * @param Request $request
     * @return string
     */
    public function fromRequest(Request $request): string
    {
        $ip = $request->ip();
        $today = now()->toDateString();

        return $this->hash($ip, $today);
    }

    /**
     * @param string $ip
     * @param string $today
     * @return string
     */
    protected function hash(string $ip, string $today): string
    {
        return md5($ip.$today);
    }
}