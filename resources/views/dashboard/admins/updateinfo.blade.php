<x-backindc>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Admin</h1>
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
                            <h3 class="card-title">Update Admin info</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('dashboard.admin.profile.update',$admin->id)}}" enctype="multipart/form-data" >
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="{{$admin->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                </div>
                                @error('name')
                                {{$message}}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" value="{{$admin->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
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
                                    <label>Admin Privileges</label>
                                    <select class="form-control" name="privileges" >
                                        <option value="{{ $admin -> privileges}}"}}>
                                            @if($admin -> privileges == 0)
                                                Admin & Developer
                                            @elseif($admin -> privileges == 1)
                                                Writer
                                            @else
                                                Marketer
                                            @endif

                                        </option>
                                        <option value="0">Admin & Developer</option>
                                        <option value="1">Writer</option>
                                        <option value="2">Marketer</option>
                                    </select>
                                </div>
                                @error('privileges')
                                {{$message}}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photo" value="{{$admin->photo}}" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <div class="ml-2 col-sm-12">
                                        <img src="{{ asset('dashboardfile/images/admins')}}/{{$admin -> photo}}" id="preview" class="img-thumbnail">
                                    </div>
                                </div>
                                @error('photo')
                                {{$message}}
                                @enderror
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
</x-backindc>

