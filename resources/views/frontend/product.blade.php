<x-front>
    <section class=" mx-auto py-5"></section>
    <!--#2 Start Breadcrumb-->
    <nav class="breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home.index')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
        </ol>
    </nav>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <h1>{{$product->title}}</h1>
    @foreach(explode('|',$product->photos) as $photo)
        <img src="{{asset('site/images/products/'.$photo)}}" alt="sad" width="450" height="450">
    @endforeach
    <h3>The reviews</h3>
    @foreach($product->review as $review)
        <h4>{{$review->comment}}</h4>
        <h4>{{$review->review}}</h4>
        <h4>{{$review->user->name}}</h4>
        <h4>{{$review->user->email}}</h4>
        @if(Auth::user('user')->id == $review->user_id)
            <a class="btn btn-danger btn-sm" onclick="document.getElementById('user-del-{{$review->id}}').submit()">
                <i class="fas fa-trash">
                </i>
                Delete
                <form action="{{route('home.review.delete',$review->id)}}" id='user-del-{{$review->id}}' method="post">
                    @csrf
                    @method('delete')
                </form>
            </a>
        @endif
        <hr />
    @endforeach
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
    <section class=" mx-auto py-5">
        @if(Auth::user('user'))
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="mb-4">Leave a review</h4>
                    @if($check)
                        <!--From For Update Review-->
                            <form class="mb-4 form text-muted" method="POST" action="{{ route('home.review.update',$product->id)}}" >
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-4"><label class="form-label" for="name">Your name *</label>
                                            <input class="form-control" value="{{Auth::user('user')->name}}" readonly>
                                            <input name="user_id" required="" type="text" id="name" value="{{Auth::user('user')->id}}" hidden>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4"><label class="form-label" for="rating">Your rate *</label>
                                            <select name="review" class="focus-shadow-0 form-control" id="review">
                                                <option value="5" {{ ($check ->review) == 5.0 ? 'selected' : '' }}>★★★★★ (5/5)</option>
                                                <option value="4" {{ ($check ->review) == 4.0 ? 'selected' : '' }}>★★★★☆ (4/5)</option>
                                                <option value="3" {{ ($check ->review) == 3.0 ? 'selected' : '' }}>★★★☆☆ (3/5)</option>
                                                <option value="2" {{ ($check ->review) == 2.0 ? 'selected' : '' }}>★★☆☆☆ (2/5)</option>
                                                <option value="1" {{ ($check ->review) == 1.0 ? 'selected' : '' }}>★☆☆☆☆ (1/5)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4"><label class="form-label" for="email">Your e-mail *</label>
                                    <input class="form-control" value="{{Auth::user('user')->email}}" readonly>
                                    <input name="product_id" required="" type="text" id="product_id" value="{{$product->id}}" hidden>
                                </div>
                                <div class="mb-4"><label class="form-label" for="review">Review text *</label>
                                    <input rows="4" name="comment" value="{{$check->comment}}" placeholder="Enter your review" required="" type="textarea" id="comment" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-outline-dark">Update review</button>
                            </form>
                    @else
                        <!--From For Create Review-->
                            <form class="mb-4 form text-muted" method="POST" action="{{ route('home.review.store')}}" >
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-4"><label class="form-label" for="name">Your name *</label>
                                            <input class="form-control" value="{{Auth::user('user')->name}}" readonly>
                                            <input name="user_id" required="" type="text" id="name" value="{{Auth::user('user')->id}}" hidden>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-4"><label class="form-label" for="rating">Your rate *</label>
                                            <select name="review" class="focus-shadow-0 form-control" id="review">
                                                <option value="5">★★★★★ (5/5)</option>
                                                <option value="4">★★★★☆ (4/5)</option>
                                                <option value="3">★★★☆☆ (3/5)</option>
                                                <option value="2">★★☆☆☆ (2/5)</option>
                                                <option value="1">★☆☆☆☆ (1/5)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4"><label class="form-label" for="email">Your e-mail *</label>
                                    <input class="form-control" value="{{Auth::user('user')->email}}" readonly>
                                    <input name="product_id" required="" type="text" id="product_id" value="{{$product->id}}" hidden>
                                </div>
                                <div class="mb-4"><label class="form-label" for="review">Review text *</label>
                                    <input rows="4" name="comment" value="{{old('comment')}}" placeholder="Enter your review" required="" type="textarea" id="comment" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-outline-dark">Post review</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <h3>
                <a href="{{route('login')}}">Sign Up To add Reviews</a>
            </h3>
        @endif
    </section>


</x-front>
