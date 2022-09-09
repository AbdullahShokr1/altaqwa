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
                <li class="breadcrumb-item active" aria-current="page">المدونة</li>
            </ol>
        </nav>
    </section>
    <!--#2 End Breadcrumb-->
    <!--#2 Start Breadcrumb-->
    <section class="container-fluid blog">
        <section class=" mx-auto py-5"></section>
        <section class="container">
            <section class="row justify-content-around">
                <!--Start right section-->
                <section class="col-lg-8 r-blog">
                    @foreach($posts as $post)
                        <section class="card mb-3 myCard">
                            <section class="row g-0 ">
                                <section class="col-md-4">
                                    <img src="{{asset('site/images/blog/'.$post->photo)}}" class="img-fluid rounded-start" alt="{{$post->title}}">
                                    <section class="blogDate position-absolute">
                                        <p class="card-text"><small>{{$post->updated_at->diffForHumans()}}</small></p>
                                    </section>
                                </section>
                                <section class="col-md-8">
                                    <section class="card-body">
                                        <h3 class="card-title">{{$post->title}}</h3>
                                        <span>
                                           <a href="{{route('home.blog.category',$post->category->slug)}}" class="text-decoration-none text-info bg-dark">{{$post->category->title}}</a>
                                        </span>
                                        <p class="card-text">{{$post->description}}</p>
                                        <a href="{{route('home.blog.post',$post->slug)}}" class="btn btn-primary">عرض المقالة</a>
                                    </section>
                                </section>
                            </section>
                        </section>
                    @endforeach
                    <section class="row g-0 p-3">
                        ADS
                    </section>
                </section>
                <!--End right section-->
                <!--Start Left section-->
                <section class="col-lg-3 l-blog">
                    <section class="card mb-3 myCard">
                        <section class="row g-0 p-3">
                            @if(!($categories->isEmpty()))
                                <section class="col">
                                    <h3>الاقسام</h3>
                                    <ul class="list-group">
                                        @foreach($categories as $category)
                                            <li class="list-group-item" ><a href="{{route('home.blog.category',$category->slug)}}">{{$category->title}}</a></li>
                                        @endforeach

                                    </ul>
                                </section>
                            @endif
                        </section>
                        <section class="row g-0 p-3">
                            @if(!($ads->isEmpty()))
                                <section class="col">
                                    <h3>اعلان خدمات</h3>
                                    <ul class="list-group">
                                        @foreach($ads as $mypost)
                                            <li class="list-group-item" ><a href="{{route('home.post',[$mypost->category->slug,$mypost->slug])}}">{{$mypost->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </section>
                            @endif
                        </section>
                        <section class="row g-0 p-3">
                            ADS
                        </section>
                        <section class="row g-0 p-3">
                            @if(!($products->isEmpty()))
                                <section class="col">
                                    <h3>السوق</h3>
                                    @foreach($products as $product)
                                        <section class="card" >
                                            <section id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                <section class="carousel-inner">
                                                    @foreach(explode('|',$product->photos) as $photo)
                                                        <section class="carousel-item @if ($loop->first) active @endif">
                                                            <img src="{{asset('site\images\products/'.$photo)}}" class="d-block w-100" alt="{{$product->title}}">
                                                        </section>
                                                    @endforeach
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
                                            <section class="card-body">
                                                <h3 class="card-title">{{$product->title}}</h3>
                                                <p class="card-text">{{\Illuminate\Support\Str::limit($product->description, 60, '.....')}}</p>
                                                <a href="{{route('home.product',$product->slug)}}" class="btn btn-primary">اشتري الان</a>
                                            </section>
                                        </section>
                                    @endforeach
                                </section>
                            @endif
                        </section>
                    </section>
                    <section>
                    </section>
                </section>
                <!--End Left section-->
            </section>
        </section>
        <section class=" mx-auto py-5"></section>
    </section>
    <!--#4 End Categories-->
</x-front>
