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
                <li class="breadcrumb-item active" aria-current="page">الملف الشخصي</li>
            </ol>
        </nav>
    </section>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Profile-->
    <section class="container profile">
        <!--Start info-->
        <section class="col-md-8 table ">
            <section class="bg-light p-4 mb-4">
                <section class="align-items-center text-center">
                    <section class="text-center">
                        <img class="review-image imgpro img-thumbnail" src="{{asset('site/images/users/'.$user->photo)}}" alt="{{$user->name}}" width="200px" height="300px">
                    </section>
                    <section class="p-3">
                        <h3>{{$user->name}}</h3>
                        <h3>{{$user->email}}</h3>
                        <a  href="{{route('home.e-profile',Auth::user('user')->name)}}" class="btn btn-light text-dark shadow" type="button"> <i class="fa fa-sync-alt mr-1" aria-hidden="true"></i>تغير الصورة </a>
                        <section class=" mb-0 text-dark"><small>JPG, GIF or PNG image. 300 x 300 required.</small></section>
                        <section class="">
                            <a class="btn btn-info btn-sm" href="{{route('home.e-profile',Auth::user('user')->name)}}">
                                <i class="fas fa-pencil-alt"></i>
                                تغير المعلومات الشخصية
                            </a>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!--End info-->
        <!--Start review-->
        <section class="col-md-8 table table-responsive">
            <h2 class="text-center pb-3">تقيماتك</h2>
            <table class="table table-hover text-center fs-md">
                <thead>
                <tr>
                    <th>#</th>
                    <th>المنتج</th>
                    <th>التعليق</th>
                    <th>التقيم</th>
                    <th>حذف/تعديل</th>
                </tr>
                </thead>
                <tbody>
                @if($user->review)
                    @foreach($user->review as $key=>$myReview)
                        <tr>
                            <td class="py-3">{{$myReview->id}}</td>
                            <td class="py-3"><a target="_blank" href="{{route('home.product',$myReview->product->slug)}}">{{$myReview->product->title}}</a></td>
                            <td class="py-3">{{$myReview->comment}}</td>
                            <td class="py-3">{{$myReview->review}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{route('home.product',$myReview->product->slug)}}/#review">
                                    <i class="fas fa-pencil-alt"></i>
                                    تعديل
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="document.getElementById('contact-del-{{$myReview->id}}').submit()">
                                    <i class="fas fa-trash">
                                    </i>
                                    حذف
                                    <form action="{{route('home.review.delete',$myReview->id)}}" id='contact-del-{{$myReview->id}}' method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>لم تقوم بعمل تقيمات حتي الان!!</p>
                @endif
                </tbody>
            </table>
        </section>
        <!--End review-->
        <!--Start Product-->
        <section class="col-md-8 table table-responsive">
            <h2 class="text-center pb-3">منتجاتك</h2>
            <a class="btn btn-success btn-sm" href="{{route('home.product.create')}}"><i class="fas fa-plus"></i>أضافة منتج</a>
            <table class="table table-hover text-center fs-md">
                <thead>
                <tr>
                    <th>#</th>
                    <th>المنتج</th>
                    <th>الرقم</th>
                    <th>عدد التقيمات</th>
                    <th>عرض/تعديل/حذف/اضافة</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($myProducts))
                    @foreach($myProducts as $product)
                        <tr>
                            <td class="py-3">{{$product->id}}</td>
                            <td class="py-3"><a target="_blank" href="{{route('home.product',$product->slug)}}">{{$product->title}}</a></td>
                            <td class="py-3">{{$product->telephone}}</td>
                            <td class="py-3">{{$product->review->count()}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" target="_blank" href="{{route('home.product',$product->slug)}}">
                                    <i class="fas fa-eye"></i>
                                    عرض
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('home.product.edit',$product->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    تعديل
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="document.getElementById('user-del-{{$product->id}}').submit()">
                                    <i class="fas fa-trash">
                                    </i>
                                    حذف
                                    <form action="{{route('home.product.destroy',$product->id)}}" id='user-del-{{$product->id}}' method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>لم تقوم باضافة منتجات حتي الان!!</p>
                @endif
                </tbody>
            </table>
        </section>
        <!--End Product-->
    </section>
    <section class=" mx-auto py-5"></section>
</x-front>


