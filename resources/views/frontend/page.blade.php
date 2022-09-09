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
                <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
            </ol>
        </nav>
    </section>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Page-->
    <section class="mypost" style="background-image: url({{asset('site/images/page/'.$page->photo)}})">
        <section class="layout"></section>
        <section class="text-white position-absolute">
            <h1>{{$page->title}}</h1>
        </section>
    </section>
    <section class=" mx-auto py-3"></section>
    <div class="container post-img">
        <div class="row">
            {!! $page->my_content !!}
        </div>
        <section>
            ADS
        </section>
    </div>
    <section class=" mx-auto py-3"></section>
    <!--#4 End Page-->
    <section class=" mx-auto py-5"></section>
</x-front>
