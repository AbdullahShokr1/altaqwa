<x-front>
    <!--#2 Start Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb home">
            <li class="breadcrumb-item active" aria-current="page">الرئيسية</li>
        </ol>
    </nav>
    <!--#2 End Breadcrumb-->
    <!--#2 Start Carousel-->
    <section id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <section class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </section>
        <section class="carousel-inner">
            @if(($posts->count())<0)
                <section class="carousel-item active">
                    <img src="{{asset('site/images/'.$settings->photo)}}" class="my-carousel d-block w-100" alt="{{$settings->name}}">
                    <section class="layout"></section>
                    <section class="container">
                        <section class="carousel-caption">
                            <p>{{$settings->name}}</p>
                            <h1>{{$settings->description}}</h1>
                        </section>
                    </section>
                </section>
            @else
                <section class="carousel-item active">
                    <img src="{{asset('site/images/'.$settings->photo)}}" class="my-carousel d-block w-100"  alt="{{$settings->name}}">
                    <section class="layout"></section>
                    <section class="container">
                        <section class="carousel-caption">
                            <p class="h1">{{$settings->name}}</p>
                            <h1>{{$settings->description}}</h1>
                        </section>
                    </section>
                </section>
                @foreach($carouselPosts as $post)
                    <div class="carousel-item">
                        <img src="{{ asset('site/images/post/'.$post->photo)}}" class="d-block w-100" alt="{{$post->title}}">
                        <section class="layout"></section>
                        <div class="carousel-caption d-md-block">
                            <h3>{{$post->title}}</h3>
                            <p>{{$post->description}}</p>
                            <a class="btn btn-lg btn-primary" href="{{route('home.post',[$post->category->slug,$post->slug])}}">عرض</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">التالي</span>
        </button>
    </section>
    <!--#2 End Carousel-->
    <!--#4 Start Categories-->
    @if($categories)
    <section id="Categories" class="container marketing">
        <!-- Three columns of text below the carousel -->
        <section class="col-lg-6 col-md-8 mx-auto text-center py-4">
            <p class="fw-light h1" >الأقسام</p>
        </section>
        <section class="row my-4">
            @foreach($categories as $category)
                <section class="col-md-3 text-center my-3">
                    <img class="catego-img rounded-circle" src="{{asset('site\images\category/'.$category->photo)}}" alt="{{$category->title}}">
                    <h3><a href="{{route('home.category',$category->slug)}}">{{$category->title}}</a></h3>
                </section><!-- /.col-lg-3 -->
            @endforeach
        </section><!-- /.row -->
    </section>
    @endif
    <!--#4 End Categories-->
    <!--#5 Start Best Posts-->
    @if($imposts)
        <section id='Best-Posts'>
            <section class="album py-5 bg-light">
                <section class="py-2 text-center container">
                    <section class="row py-lg-5">
                        <section class="col-lg-6 col-md-8 mx-auto">
                            <h2 class="fw-light h1">أفضل عروض شركات التنظيف ومكافحة الحشرات </h2>
                            <h3 class="lead ">أفضل شركات التنظيف و مكافحة الحشرات والفئران وغسيل وتنظيف الخزانات والفلل ونقل العفش والأثاث</h3>
                        </section>
                    </section>
                </section>
                <section class="container">
                    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                        @foreach($imposts as $myPost)
                            <section class="col">
                                <section class="card cardd shadow-sm">
                                    <img src="{{asset('site/images/post/'.$myPost->photo)}}" class="my-carousel d-block w-100" alt="{{$myPost->title}}">
                                    <section class="card-body">
                                        <h3>{{$myPost->title}}</h3>
                                        <p class="card-text">{{$myPost->description}}</p>
                                        <section class="d-flex justify-content-between align-items-center">
                                            <section class="btn-group">
                                                <a class="btn btn-sm btn-outline-secondary" href="{{route('home.post',[$myPost->category->slug,$myPost->slug])}}">
                                                    عرض الاعلان
                                                </a>
                                            </section>
                                            <small class="text-muted">{{$myPost->updated_at->diffForHumans()}}</small>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        @endforeach
                    </section>
                </section>
            </section>
        </section>
    @endif
    <!--#5 End Best Posts-->
    <!--#3 Start Info-->
    <section id="Info" class="px-4 py-5 text-center">
        <section class="container d-flex justify-content-cente ">
            <img class="info-img d-block mx-auto" src="{{asset('site/images/'.$settings->logo)}}" alt="{{$settings->name}}" width="72" height="57">
        </section>
        <p class="display-5 fw-bold h1">من نحن</p>
        <section class="col-lg-6 mx-auto">
            <p class="lead mb-4"> وصف قصير حول الألبوم أدناه (محتوياته ، ومنشؤه ، وما إلى ذلك). اجعله قصير ولطيف، ولكن ليست قصير جدًا حتى لا يتخطى الناس هذا الألبوم تمامًا.وصف قصير حول الألبوم أدناه (محتوياته ، ومنشؤه ، وما إلى ذلك). اجعله قصير ولطيف، ولكن ليست قصير جدًا حتى لا يتخطى الناس هذا الألبوم تمامًا.وصف قصير حول الألبوم أدناه (محتوياته ، ومنشؤه ، وما إلى ذلك). اجعله قصير ولطيف، ولكن ليست قصير جدًا حتى لا يتخطى الناس هذا الألبوم تمامًا.</p>
            <section class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3 text-center">معرفة المزيد</button>
            </section>
        </section>
    </section>
    <!--#3 End Info-->
    <!--#6 Start Last Posts-->
    @if($blogs)
        <section id='Last-Posts'>
            <section class="album py-5 bg-light">
                <section class="py-2 text-center container">
                    <section class="row py-lg-5">
                        <section class="col-lg-6 col-md-8 mx-auto">
                            <p class="fw-light h1">المدونة</p>
                            <p class="lead">وصف قصير حول الألبوم أدناه . </p>
                        </section>
                    </section>
                </section>
                <section class="container">
                    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach($blogs as $blog)
                            <section class="col">
                                <section class="card shadow-sm">
                                    <img src="{{asset('site/images/blog/'.$blog->photo)}}" class="my-carousel d-block w-100" alt="{{$blog->title}}">
                                    <section class="layout"></section>
                                    <h3><a class="text-center" href="{{route('home.blog.post',$blog->slug)}}">{{$blog->title}}</a></h3>
                                </section>
                            </section>
                        @endforeach
                    </section>
                </section>
            </section>
        </section>
    @endif
    <!--#6 End Last Posts-->
    <!--#6 Start Last Product-->
    @if($products)
        <section id='Last-Posts' class="px-4 py-5 text-center">
            <section class="album py-5 ">
                <section class="py-2 text-center container">
                    <section class="row py-lg-5">
                        <section class="col-lg-6 col-md-8 mx-auto">
                            <p class="fw-light h1">الاثاث المستعمل والعفش</p>
                            <p class="lead text-muted">وصف قصير حول الألبوم أدناه . </p>
                        </section>
                    </section>
                </section>
                <section class="container">
                    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach($products as $product)
                            <section class="col">
                                <section class="card shadow-sm">

                                    <section id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <section class="carousel-inner">
                                            @foreach(explode('|',$product->photos) as $photo)
                                                <section class="carousel-item @if ($loop->first) active @endif">
                                                    <img src="{{asset('site\images\products/'.$photo)}}" class="my-carousel d-block w-100" alt="{{$product->title}}">
                                                </section>
                                            @endforeach
                                            <section class="layout"></section>
                                        </section>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </section>
                                    <h3><a class="text-center" href="{{route('home.product',$product->slug)}}">{{$product->title}}</a></h3>
                                </section>
                            </section>
                        @endforeach
                    </section>
                </section>
            </section>
        </section>
    @endif
    <!--#6 End Last Product-->
</x-front>
