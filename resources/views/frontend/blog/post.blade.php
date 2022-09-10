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
                <li class="breadcrumb-item"><a href="{{route('home.blog.index')}}">المدونة</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
            </ol>
        </nav>
    </section>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Blog Post-->
    <section class="mypost" style="background-image: url({{asset('site/images/blog/'.$post->photo)}})">
        <section class="layout"></section>
        <section class="text-white position-absolute">
            <h1>{{$post->title}}</h1>
        </section>
    </section>
    <section class="container-fluid blog">
        <section class=" mx-auto py-5"></section>
        <section class="iiii">
            <section class="row justify-content-around">
                <!--Start right section-->
                <section class="col-lg-8 r-blog post-img">
                    <section class="row">
                        {!! $post->my_content !!}
                    </section>
                    <section class="row g-0 p-3 tag">
                        @foreach($post->tagblog as $tag)
                            <section class="tags">
                                <a  href="{{route('home.blog.tag',$tag->btag->slug)}}">{{$tag->btag->title}}</a>
                            </section>
                        @endforeach
                    </section>
                    <section class="row g-0 p-3">
                        ADS
                    </section>
                    <section class="row g-0 p-3">
                        @if(!($post->comment)->isEmpty())
                            <section class="row my-4 justify-content-center">
                                @foreach($post->comment as $comment)
                                    <div class="row mt-4">
                                        <div class="col-md-2 col-4">
                                            <div class="d-flex">
                                                <div class="text-center"><img class="review-image" src="">
                                                    <span class="text-uppercase text-muted">{{$comment->updated_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-8">
                                            <h5 class="mt-2 mb-1">{{$comment->user}}</h5>
                                            <div class="mb-2">
                                                <div class="rating" style="color: #ffd814;">
                                                </div>
                                            </div>
                                            <p class="text-muted">{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <section class="col-md-3 text-center my-3">
                                        <h3>{{$comment->name}}</h3>
                                        <h3>{{$comment->email}}</h3>
                                        <p class="lead text-muted">{{$comment->comment}}</p>
                                        <hr>
                                    </section><!-- /.col-lg-3 -->
                                @endforeach
                            </section>
                        @endif
                    </section>
                    <section class="row g-0 p-3">
                        @if(Auth::user('user'))
                            <form method="POST" action="{{ route('dashboard.comment.store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">name</label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Name">
                                    </div>
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">email</label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail2" placeholder="Enter Your Email">
                                    </div>
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleInputPassword3">Comment</label>
                                        <textarea rows="4", cols="54" id="comment" name="comment" style="resize:none">{{old('comment')}}</textarea>
                                    </div>
                                    @error('comment')
                                    {{$message}}
                                    @enderror
                                    <input type="text" name="post_id" value="{{$post->id}}" class="form-control" hidden>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Send Comment</button>
                                </div>
                            </form>
                        @else
                            <p>قم <span><a href="{{route('login')}}">بالتسجيل</a></span> حتي تتمكن من التعليق</p>

                        @endif
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
    <section class=" mx-auto py-5"></section>
</x-front>
