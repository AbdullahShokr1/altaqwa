<x-backend>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
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
                            <h3 class="card-title">Update Category info</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('dashboard.product.update',$product->id)}}" enctype="multipart/form-data">
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
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <input type="file" name="photos[]" value="{{$product->photos}}" class="file" multiple accept="image/*" hidden>
                                        <div class="input-group my-3">
                                            <br/>
                                            <input type="text" name='photos[]' value="{{$product->photos}}" class="form-control" disabled placeholder="Upload File" id="file" multiple accept="image/*">
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary">Browse...</button>
                                            </div>
                                        </div>
                                        <div class="ml-2 col-sm-12">
                                            <img src="{{asset('site/images/products/'.$product->photos)}}" id="preview" class="img-thumbnail"/>
                                        </div>
                                    </div>
                                </div>
                                @error('photo')
                                {{$message}}
                                @enderror
                            </div>
                            <input type="text" name="user_id" value="{{ $product->user_id }}" class="form-control" hidden>
                        @error('user_id')
                        {{$message}}
                        @enderror
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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

