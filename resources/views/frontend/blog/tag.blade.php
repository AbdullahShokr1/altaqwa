<x-front>
    <section class=" mx-auto py-5"></section>
    <!--#2 Start Breadcrumb-->
    <nav class="breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home.index')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('home.blog.tags')}}">الوسوم</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$tag->title}}</li>
        </ol>
    </nav>
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
        <section id='Last-Posts'>
            <section class="album py-5 bg-light">
                <section class="container">
                    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/background.webp" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (1).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (2).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (3).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (4).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (5).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (6).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (7).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (8).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (1).jpg" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (1).webp" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                        <section class="col">
                            <section class="card shadow-sm">
                                <img src="images/images (4).webp" class="my-carousel d-block w-100" alt="...">
                                <section class="layout"></section>
                                <h2><a href="#">شركة تنظيف بجدة</a></h2>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!--#6 End Category's Posts-->
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
</x-front>
