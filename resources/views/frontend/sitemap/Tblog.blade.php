<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($tags as $tag)
        <url>
            <loc>{{route('home.blog.tag',$tag->slug)}}</loc>
            <lastmod>{{ $tag->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.64</priority>
        </url>
    @endforeach
</urlset>
