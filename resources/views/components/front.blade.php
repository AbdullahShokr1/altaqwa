@include('frontend.includes.header')
<!--#1 Start Header-->
@include('frontend.includes.navbar')
<!--#1 End Header-->
<main>
    <!--# Start The Content-->
    {{$slot}}
    <!--# End The Content-->
</main>
<!--#7 Start Footer-->
@include('frontend.includes.footer')
<!--#7 End Footer-->
