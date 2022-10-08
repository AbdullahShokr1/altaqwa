<x-front>
    <section class="in-mobile">
        <section class=" mx-auto py-5"></section>
        <section class=" mx-auto py-3"></section>
    </section>
    <!--#2 Start Breadcrumb-->

    <section class="mybreadcrumb">
        <nav class="breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="{{route('home.index')}}">
                        <span itemprop="name">الرئيسية</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
                <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">البحث</span>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </nav>
    </section>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Page-->
    <section class=" mx-auto py-5"></section>
    @isset($posts)
        @if(!($posts)->isEmpty())
            <section id='Last-Posts'>
                <section class="album py-5 bg-light">
                    <section class="py-2 text-center container">
                        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                            @foreach($posts as $post)
                                <section class="col">
                                    <section class="card shadow-sm">
                                        <img src="{{asset('site/images/post/'.$post->photo)}}" class="my-carousel d-block w-100" alt="{{$post->title}}">
                                        <section class="layout"></section>
                                        <h3><a href="{{route('home.post',[$post->category->slug,$post->slug])}}">{{$post->title}}</a></h3>
                                    </section>
                                </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        @else
            <p class="text-center h3">لا توجد مقالات </p>
        @endif
    @endisset
    <!--#4 End Page-->
    <section class=" mx-auto py-5"></section>
</x-front>
