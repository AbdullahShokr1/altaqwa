<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @isset($posts)
        @foreach($posts as $post)
            <url>
                <loc>{{route('home.post',[$post->category->slug,$post->slug])}}</loc>
                <image:image>
                    <image:loc>{{asset('site/images/post/'.$post->photo)}}</image:loc>
                </image:image>
                @foreach($postImages[$post->id] as $image)
                    <image:image>
                        <image:loc>{{$image}}</image:loc>
                    </image:image>
                @endforeach
            </url>
        @endforeach
    @endisset
    @isset($page)
        @foreach($page as $mypage)
            <url>
                <loc>{{route('home.page',$mypage->slug)}}</loc>
                <image:image>
                    <image:loc>{{asset('site/images/page/'.$mypage->photo)}}</image:loc>
                </image:image>
                @foreach($pageImages[$mypage->id] as $image)
                    <image:image>
                        <image:loc>{{$image}}</image:loc>
                    </image:image>
                @endforeach
            </url>
        @endforeach
    @endisset
    @isset($blog)
        @foreach($blog as $post)
            <url>
                <loc>{{route('home.blog.post',$post->slug)}}</loc>
                <image:image>
                    <image:loc>{{asset('site/images/blog/'.$post->photo)}}</image:loc>
                </image:image>
                @foreach($blogImages[$post->id] as $image)
                    <image:image>
                        <image:loc>{{$image}}</image:loc>
                    </image:image>
                @endforeach
            </url>
        @endforeach
    @endisset
    @isset($categories)
        @foreach($categories as $category)
            <url>
                <loc>{{route('home.category',$category->slug)}}</loc>
                <image:image>
                    <image:loc>{{asset('site/images/category/'.$post->photo)}}</image:loc>
                </image:image>
            </url>
        @endforeach
    @endisset
    @isset($products)
        @foreach($products as $product)
            <url>
                <loc>{{route('home.product',$product->slug)}}</loc>
                @foreach(explode('|',$product->photos) as $photo)
                    <image:image>
                        <image:loc>{{asset('site/images/products/'.$photo)}}</image:loc>
                    </image:image>
                @endforeach
            </url>
        @endforeach
    @endisset
</urlset>
