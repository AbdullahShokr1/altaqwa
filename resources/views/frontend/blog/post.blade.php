<x-front>
    <section class=" mx-auto py-5"></section>
    <!--#2 Start Breadcrumb-->
    <nav class="breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home.index')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('home.blog.index')}}">المدونة</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
        </ol>
    </nav>
    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <section id="Categories" class="container marketing">
        <section class="row my-4 justify-content-center">
            <section class="col-md-3 text-center my-3">
                <h2>{{$post->title}}</h2>
                <p class="lead text-muted">{{$post->description}}</p>
                <h1>{{$post->my_content}}</h1>
                <hr>
            </section><!-- /.col-lg-3 -->
        </section>
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
    </section>
    <section class="row my-4 justify-content-center">
        @foreach($post->comment as $comment)
            <section class="col-md-3 text-center my-3">
                <h3>{{$comment->name}}</h3>
                <h3>{{$comment->email}}</h3>
                <p class="lead text-muted">{{$comment->comment}}</p>
                <hr>
            </section><!-- /.col-lg-3 -->
        @endforeach
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
</x-front>
