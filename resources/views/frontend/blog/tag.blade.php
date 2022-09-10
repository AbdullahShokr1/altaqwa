<x-front>
    <section class="in-mobile">
        <section class=" mx-auto py-5"></section>
        <section class=" mx-auto py-3"></section>
    </section>
    <!--#2 Start Breadcrumb-->
    <section class="mybreadcrumb">
        <nav class="breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home.index')}}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{route('home.blog.tags')}}">الوسوم</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$tag->title}}</li>
            </ol>
        </nav>
    </section>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <section id="Categories" class="container marketing">
        <section class="row my-4 justify-content-center">
            <section class="col-md-3 text-center my-3">
                <h2>{{$tag->title}}</h2>
                <p class="lead text-muted">{{$tag->description}}</p>
                <hr>
            </section><!-- /.col-lg-3 -->
        </section>
        <!--#6 Start Category's Posts-->
        @if(!($tag->tagblog)->isEmpty())
            <section id='Last-Posts'>
                <section class="album py-5 bg-light">
                    <section class="py-2 text-center container">
                        <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                            @foreach($tag->tagblog as $post)
                                <section class="col">
                                    <section class="card shadow-sm">
                                        <img src="{{asset('site/images/blog/'.$post->blog->photo)}}" class="my-carousel d-block w-100" alt="{{$post->blog->title}}">
                                        <section class="layout"></section>
                                        <h3><a href="{{route('home.blog.post',$post->blog->slug)}}">{{$post->blog->title}}</a></h3>
                                    </section>
                                </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        @else
            <p class="text-center h3">لا توجد مقالات في هذا التاج.</p>
        @endif

        <!--#6 End Category's Posts-->
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
</x-front>
