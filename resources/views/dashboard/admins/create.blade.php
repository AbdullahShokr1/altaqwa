<x-backend>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Admins</li>
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
                            <h3 class="card-title">Add Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('dashboard.admins.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                </div>
                                @error('name')
                                {{$message}}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                @error('email')
                                {{$message}}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                @error('password')
                                {{$message}}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password Confirmation</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword" placeholder="Password Confirmation">
                                </div>
                                @error('password_confirmation')
                                {{$message}}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputFile">Photo</label>
                                    <div class="input-group">
                                        <input type="file" name="photo" value="{{old('photo')}}" class="file" hidden>
                                        <div class="input-group my-3">
                                            <br/>
                                            <input type="text" name='photo' value="{{old('photo')}}" class="form-control" disabled placeholder="Upload File" id="file">
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary">Browse...</button>
                                            </div>
                                        </div>
                                        <div class="ml-2 col-sm-12">
                                            <img src="" id="preview" class="img-thumbnail">
                                        </div>
                                    </div>
                                </div>
                                @error('photo')
                                {{$message}}
                                @enderror
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Admin</button>
                                <a href="{{route('dashboard.admins.index')}}" class="btn btn-danger">Cancel</a>
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

