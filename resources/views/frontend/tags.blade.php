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
                <li class="breadcrumb-item active" aria-current="page">الوسوم</li>
            </ol>
        </nav>
    </section>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Tags-->
    <section id="Categories" class="container marketing">
        <section class="row my-4 justify-content-center">
            <section class="col-md-3 text-center my-3">
                <h2>الوسوم</h2>
                <hr>
            </section><!-- /.col-lg-3 -->
        </section>
        <!--#6 Start Category's Posts-->
        <section id='Last-Posts'>
            <section class="album py-5 bg-light">
                <section class="container">
                    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                        @foreach($tags as $tag)
                            <section class="tags">
                                <a  href="{{route('home.tag',$tag->slug)}}">{{$tag->title}}</a>
                            </section>
                        @endforeach
                    </section>
                </section>
            </section>
        </section>
        <!--#6 End Category's Posts-->
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
</x-front>
