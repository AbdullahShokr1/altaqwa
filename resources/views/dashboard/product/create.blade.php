<x-backend>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
<section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('dashboard.product.store')}}" enctype="multipart/form-data">
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
                                        <input type="file" name="photos[]" value="{{old('photos')}}" class="file" multiple accept="image/*" hidden>
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
                                <a href="{{route('dashboard.product.index')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
</div>
</x-backend>

