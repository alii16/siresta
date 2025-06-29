<?php
namespace App\Helpers;

class BadwordFilter
{
    public static function filter($text)
    {
        $badwords = config('badwords');
        foreach ($badwords as $word) {
            $pattern = '/\b(' . preg_quote($word, '/') . ')\b/i';
            $text = preg_replace_callback($pattern, function ($matches) {
                $bad = $matches[1];
                $len = mb_strlen($bad);
                if ($len <= 2) {
                    // Jika kata hanya 2 huruf atau kurang, sensor semua
                    return str_repeat('*', $len);
                }
                // Ambil huruf pertama dan terakhir, tengah jadi *
                $first = mb_substr($bad, 0, 1);
                $last = mb_substr($bad, -1, 1);
                $middle = str_repeat('*', $len - 2);
                return $first . $middle . $last;
            }, $text);
        }
        return $text;
    }
}