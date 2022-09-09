<x-backend>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                            <li class="breadcrumb-item ">Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <form method="post" action="{{ route('dashboard.update-settings',$settings->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="logo" value="{{$settings->logo}}" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="ml-2 col-sm-12">
                            <img src="{{asset('site\images/'.$settings->logo)}}" id="preview" class="img-thumbnail">
                        </div>
                    </div>
                </div>
                @error('logo')
                {{$message}}
                @enderror
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputtitle">Site Name</label>
                        <input type="text" name="name" value="{{$settings->name}}" class="form-control" id="exampleInputtitle" placeholder="Enter Site Name">
                    </div>
                    @error('name')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" name="description" value="{{$settings->description}}" class="form-control" id="exampleInputdescription" placeholder="Enter description">
                    </div>
                    @error('description')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputslug">Social Media</label>
                        @if($settings->social != Null)
                            @foreach(explode('|',$settings->social) as $social)
                                <input type="text" name="social[]" value="{{$social}}" class="form-control" id="exampleInputslug">
                                <br>
                            @endforeach
                        @endif
                    </div>
                    @error('social')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" value="{{$settings->photo}}" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="ml-2 col-sm-12">
                                <img src="{{asset('site\images/'.$settings->photo)}}" id="preview" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    @error('photo')
                    {{$message}}
                    @enderror
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('dashboard.settings')}}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
</x-backend>

