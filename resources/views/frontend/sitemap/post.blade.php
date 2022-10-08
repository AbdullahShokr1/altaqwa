<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url>
            <loc>{{route('home.index')}}</loc>
            @isset($post->updated_at)
                <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            @endisset
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
        @foreach ($posts as $post)
            @if ($loop->first || $loop->iteration  <= 10)
        <url>
            <loc>{{route('home.post',[$post->category->slug,$post->slug])}}</loc>
            <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>1.0</priority>
        </url>
            @else
        <url>
            <loc>{{route('home.post',[$post->category->slug,$post->slug])}}</loc>
            <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
            @endif
        @endforeach
</urlset>

