<?php

if (!function_exists('present_post_title')) {
    function present_post_title(string $title): string {
        $words = explode(' ', $title);
        $result = [];

        foreach ($words as $index=>$word) {
            $cleanWord = htmlentities($word);
            $result[] = $index % 2 !== 0 ? '<span class="text-red">'.$cleanWord.'</span>' : $cleanWord;
        }

        return implode(' ', $result);
    }
}

if (!function_exists('present_post_body')) {
    function present_post_body(string $body): string {
        return \App\Facades\MD::text($body);
    }
}