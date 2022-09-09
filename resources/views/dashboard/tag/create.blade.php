<x-backend>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Tag</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tags</li>
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
                            <h3 class="card-title">Add Tag</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('dashboard.tag.store')}}">
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
                                    <label for="exampleInputEmail2">Description</label>
                                    <input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail2" placeholder="Enter description">
                                </div>
                                @error('description')
                                {{$message}}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputPassword3">Slug</label>
                                    <input type="text" name="slug" value="{{old('slug')}}" class="form-control" id="exampleInputPassword3" placeholder="slug">
                                </div>
                                @error('slug')
                                {{$message}}
                                @enderror
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Tag</button>
                                <a href="{{route('dashboard.tag.index')}}" class="btn btn-danger">Cancel</a>
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

