<x-front>
    <section class=" mx-auto py-5"></section>
    <!--#2 Start Breadcrumb-->
    <nav class="breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home.index')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">الاقسام</li>
        </ol>
    </nav>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <section id="Categories" class="container marketing">
        <section class="row my-4 justify-content-center">
            <section class="col-md-3 text-center my-3">
                <h2>الاقسام</h2>
                <hr>
            </section><!-- /.col-lg-3 -->
        </section>
        <!--#4 Start Categories-->
        <section id="Categories" class="container marketing">
            <!-- Three columns of text below the carousel -->
            <section class="row my-4">
                @foreach($categories as $category)
                    <section class="col-md-3 text-center my-3">
                        <img class="catego-img rounded-circle" src="{{asset('site\images\category/'.$category->photo)}}" alt="{{$category->title}}">
                        <h2><a href="{{route('home.category',$category->slug)}}">{{$category->title}}</a></h2>
                    </section><!-- /.col-lg-3 -->
                @endforeach
            </section><!-- /.row -->
        </section>
        <!--#4 End Categories-->
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
</x-front>
