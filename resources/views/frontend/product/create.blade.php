<x-front>
    <section class=" mx-auto py-5"></section>
    <!--#2 Start Breadcrumb-->

    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <section id="Categories" class="container marketing">
        <form method="POST" action="{{ route('home.product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                </div>
                @error('title')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" name='description' id="description" placeholder="Enter Description">{{old('description')}}</textarea>
                </div>
                @error('description')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Keywords</label>
                    <input type="text" name="keywords" value="{{old('keywords')}}" class="form-control" id="exampleInputPassword1" placeholder="keywords">
                </div>
                @error('keywords')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Telephone</label>
                    <input type="number" name="telephone" value="{{old('telephone')}}" class="form-control" id="exampleInputPassword1" placeholder="telephone">
                </div>
                @error('telephone')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" name="slug" value="{{old('slug')}}" class="form-control" id="exampleInputPassword1" placeholder="slug">
                </div>
                @error('slug')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                        <div class="input-group my-3">
                            <br/>
                            <input type="file" id='fileName' name='photos[]' value="{{old('photos')}}" class="form-control" placeholder="Upload File" multiple accept="image/*" onchange="validateFileType()" >
                        </div>
                    </div>
                </div>
                @error('photos')
                {{$message}}
                @enderror
            </div>
            @error('user_id')
            {{$message}}
            @enderror
        <!-- /.card-body -->
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Add Product">
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
                    if (parseInt($fileUpload.get(0).files.length) > 10){
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


