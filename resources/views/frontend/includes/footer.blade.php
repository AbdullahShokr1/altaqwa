<footer>
    <section class="container">
        <footer class="py-5">
            <section class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <section class="col">
                    <a href='{{route('home.index')}}'><img src='{{asset('site/images/'.$settings->logo)}}' class="info-img d-block" width="72" height="57" alt='Logo'></a>
                    <h3>{{$settings->name}}</h3>
                    <p>
                        {{$settings->description}}
                    </p>
                </section>
                @if($categories)
                    <section class="col my-5">
                        <h4>الاقسام</h4>
                        <ul class="nav flex-column">
                            @foreach($categories as $category)
                                <li class="nav-item mb-2"><a href="{{route('home.category',$category->slug)}}" class="nav-link p-0 color-x">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </section>
                @endif
                <section class="col my-5 d-none">

                </section>
                <section class="col my-5">
                    <h4>Section</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 color-x">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 color-x">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 color-x">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 color-x">FAQs</a></li>
                    </ul>
                </section>
            </section>

            <section class="d-flex justify-content-center py-4 my-4 border-top">
                <p>&copy; 2021 Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a title='twitter'  href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="ms-3"><a title='instagram'  href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="ms-3"><a title='facebook'  href="#"><i class="fab fa-facebook"></i></a></li>
                </ul>
            </section>
        </footer>
    </section>
</footer>
<!-- <section class="switch">
    <section class="circle">

    </section>
</section> -->
<section class="progress-wrap">
    <svg  class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</section>
<!--Start JS Files-->
<script src={{URL::asset('site/js/jquery.min.js')}}></script>
<script src={{URL::asset('site/js/bootstrap.min.js')}}></script>
<script src={{URL::asset('site/js/popper.min.js')}}></script>
<script src={{URL::asset('site/js/fontawesome.min.js')}}></script>
<script src={{URL::asset('site/js/all.min.js')}}></script>
<script src={{URL::asset('site/js/myscript.js')}}></script>
<script src={{URL::asset('site/js/main.js')}}></script>
<!--End JS Files-->
</body>

</html>
