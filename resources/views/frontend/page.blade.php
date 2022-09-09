<x-front>
    <section class=" mx-auto py-5"></section>
    <!--#2 Start Breadcrumb-->
    <nav class="breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home.index')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
        </ol>
    </nav>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <h1>{{$page->title}}</h1>
    <img src="{{asset('site/images/page/'.$page->photo)}}" width="450" height="450">
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
</x-front>
