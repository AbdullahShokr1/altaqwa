<x-front>
    <section class=" mx-auto py-5"></section>
    <!--#2 Start Breadcrumb-->

    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <section id="Categories" class="container marketing">
        <form method="post" action="{{ route('home.product.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputtitle">Title</label>
                    <input type="text" name="title" value="{{$product->title}}" class="form-control" id="exampleInputtitle" placeholder="Enter title">
                </div>
                @error('title')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" value="{{$product->description}}" class="form-control" id="exampleInputdescription" placeholder="Enter description">
                </div>
                @error('description')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Keywords</label>
                    <input type="text" name="keywords" value="{{$product->keywords}}" class="form-control" id="exampleInputPassword1" placeholder="keywords">
                </div>
                @error('keywords')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Telephone</label>
                    <input type="number" name="telephone" value="{{$product->telephone}}" class="form-control" id="exampleInputPassword1" placeholder="telephone">
                </div>
                @error('telephone')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputslug">slug</label>
                    <input type="text" name="slug" value="{{$product->slug}}" class="form-control" id="exampleInputslug" placeholder="slug">
                </div>
                @error('slug')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">images</label>
                    <div class="input-group">
                        <div class="input-group my-3">
                            <br/>
                            <input type="file" name='photos[]' value="{{$product->photos}}" class="form-control" placeholder="Upload File" id="fileName" multiple accept="image/*">
                        </div>
                        <div class="ml-2 col-sm-12">
                            @if($product->photos == null)
                                <p>no photos here</p>
                            @else
                                @foreach(explode('|',$product->photos) as $photo)
                                    <img src="{{asset('site/images/products/'.$photo)}}" id="preview" class="img-thumbnail"/>
                                    <a href="{{route('home.product.deletePhoto',[$product->id,$photo])}}"><i class="fas fa-trash"></i></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                @error('photos')
                {{$message}}
                @enderror
            </div>
            <input type="text" name="user_id" value="{{ $product->user_id }}" class="form-control" hidden>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
    @section('script')
        <script>
            $(function(){
                $("input[type = 'file']").change(function(){
                    var $fileUpload = $("input[type='file']");
                    if (parseInt($fileUpload.get(0).files.length)+{{count(explode('|',$product->photos))}} > 10){
                        alert("مسموح فقط برفع 10 صور حاول رفع الصور مرة اخري");
                        document.getElementById("fileName").value = null;
                    }
                });
            });

            //file just upload images
            function validateFileType(){
                var fileName = document.getElementById("fileName").value;
                var idxDot = fileName.lastIndexOf(".") + 1;
                var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                if (extFile==="jpg" || extFile==="jpeg" || extFile==="png"){
                    //TO DO
                }else{
                    document.getElementById("fileName").value = null;
                    alert("يسمح فقط برفع الصور ذات الامتدادات التالبة jpg/jpeg/png");
                }
            }
        </script>
    @endsection
</x-front>


