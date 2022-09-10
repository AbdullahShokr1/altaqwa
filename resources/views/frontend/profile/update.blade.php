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
                <li class="breadcrumb-item"><a href="{{route('home.profile',$user->name)}}">الصفحة الشخصية</a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل البيانات الشخصية</li>
            </ol>
        </nav>
    </section>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <section class="container marketing align-center">
        <section class="row justify-content-center align-center">
            <section class="col-md-6 col-md-offset-3">
            <form id="msform" method="POST" action="{{ route('home.u-profile',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <fieldset>
                    <section class="card-body">
                        <section class="form-group">
                            <label for="exampleInputName">الاسم</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputName" placeholder="Enter name">
                        </section>
                        @error('name')
                        {{$message}}
                        @enderror
                        <section class="form-group">
                            <label for="exampleInputEmail1">البريد الالكتروني</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </section>
                        @error('email')
                        {{$message}}
                        @enderror
                        <section class="form-group">
                            <label for="exampleInputPassword1">كلمة السر</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </section>
                        @error('password')
                        {{$message}}
                        @enderror
                        <section class="form-group">
                            <label for="exampleInputPassword">تأكيد كلمة السر</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword" placeholder="Password Confirmation">
                        </section>
                        @error('password_confirmation')
                        {{$message}}
                        @enderror
                        <section class="form-group">
                            <section class="mb-3">
                                <label for="formFileMultiple" class="form-label">اخنر الصورة الشخصية</label>
                                <input class="form-control" type="file" id="formFileMultiple" name="photo" value="{{$user->photo}}">
                            </section>
                            <section class="ml-2 col-sm-12">
                                <img src="{{ asset('site/images/users')}}/{{$user -> photo}}" id="preview" class="img-thumbnail" alt="{{$user -> name}}" width="300px" height="300px">
                            </section>
                        </section>
                        @error('photo')
                        {{$message}}
                        @enderror
                    </section>
                    <section class="card-footer">
                        <button type="submit" class="btn btn-primary">تحديث البيانات</button>
                        <a href="{{route('home.profile',$user->name)}}" class="btn btn-danger">الغاء</a>
                    </section>
                </fieldset>
                <!-- /.card-body -->
            </form>
            <!-- fieldsets -->
            </section>
        </section>
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
    <!-- MultiStep Form -->
    <!-- /.MultiStep Form -->
</x-front>
