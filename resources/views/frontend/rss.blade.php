<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
>

    <channel>
        <title><![CDATA[ {{$settings->name}} ]]></title>
        <atom:link href="{{route('home.index')}}/feed.xml" rel="self" type="application/rss+xml" />
        <link><![CDATA[ {{route('home.index')}} ]]></link>
        <description><![CDATA[ Your {{$settings->description}} ]]></description>
        <language>ar</language>

        <image>
            <url>{{asset('site/images/'.$settings->logo)}}</url>
            <title>{{$settings->name}}</title>
            <link>{{route('home.index')}}</link>
            <width>32</width>
            <height>32</height>
        </image>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->title }}]]></title>
                <link>{{route('home.post',[$post->category->slug,$post->slug])}}</link>
                <description><![CDATA[{!! $post->description !!}]]></description>
                <category>{{ $post->category->title }}</category>
                <author>abdullahshokr8@gmial.com (Abdullah Shokr)</author>
                <guid isPermaLink="false">{{route('home.post',[$post->category->slug,$post->slug])}}</guid>
                <pubDate>{{ $post->created_at->toRssString()}}</pubDate>
                <content:encoded><![CDATA[{!! $post->my_content !!}]]></content:encoded>
            </item>
        @endforeach
    </channel>
</rss>





