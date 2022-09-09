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
                        <input type="file" name="photos[]" value="{{old('photos')}}" class="file" multiple accept="image/*" >
                        <div class="input-group my-3">
                            <br/>
                            <input type="text" name='photos[]' value="{{old('photos')}}" class="form-control" disabled placeholder="Upload File" id="file" multiple accept="image/*">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse...</button>
                            </div>
                        </div>
                        <div class="ml-2 col-sm-12">
                            <img src="" id="preview" class="img-thumbnail"/>
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
        {{--                            <input type="text" name="user_id" value="{{ Auth::user('admin')->id }}" class="form-control" hidden>--}}
        <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </form>
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
</x-front>


