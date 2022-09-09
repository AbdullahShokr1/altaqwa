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
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputFile">logo</label>
                        <div class="input-group">
                            <div class="ml-2 col-sm-12">
                                <img src="{{asset('site\images/'.$settings->logo)}}" id="preview" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputtitle">Site Name</label>
                        <input type="text" name="name" value="{{$settings->name}}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" name="description" value="{{$settings->description}}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputslug">Social media</label>
                        @if($settings->social != Null)
                            @foreach(explode('|',$settings->social) as $social)
                                <input type="text" name="slug" value="{{$social}}" class="form-control" id="exampleInputslug" disabled>
                                <br>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Banner</label>
                        <div class="input-group">
                            <div class="ml-2 col-sm-12">
                                <img src="{{asset('site\images/'.$settings->photo)}}" id="preview" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{route('dashboard.edit-settings',$settings->id)}}" class="btn btn-warning">Edit</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
</x-backend>

