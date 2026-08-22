<?php

namespace App\Support;

class KolkataDates
{
    /**
     * @return array<string, array<string, mixed>>
     */
    public static function categories(): array
    {
        return config('kolkata_dates.categories', []);
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function category(string $slug): ?array
    {
        $category = self::categories()[$slug] ?? null;

        if (! is_array($category)) {
            return null;
        }

        $category['slug'] = $slug;

        return $category;
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function place(string $categorySlug, string $placeSlug): ?array
    {
        $category = self::category($categorySlug);

        if (! $category) {
            return null;
        }

        $place = $category['places'][$placeSlug] ?? null;

        if (! is_array($place)) {
            return null;
        }

        $place['slug'] = $placeSlug;
        $place['category_slug'] = $categorySlug;
        $place['category_name'] = $category['name'];
        $place['category_emoji'] = $category['emoji'];

        return $place;
    }
}
