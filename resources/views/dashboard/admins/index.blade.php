<x-backend>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admins</h1>
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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admins</h3>
                @if(session('success'))
                    <div class="alert alert-info" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <a href="{{route('dashboard.admins.create')}}"  class="btn btn-block bg-gradient-warning">
                        Add Admin
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th>
                            Admin Photo
                        </th>
                        <th>
                            Admin Name
                        </th>
                        <th>
                            Admin Email
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td>
                                {{$admin->id}}
                            </td>
                            <td>
                                <img alt="Avatar" class="table-avatar" src="{{asset('dashboardfile/images/admins/'.$admin->photo)}}">
                            </td>
                            <td>
                                {{$admin->name}}
                            </td>
                            <td class="project_progress">
                                {{$admin->email}}
                            </td>
                            <td class="project-actions text-right">

                                <a class="btn btn-info btn-sm" href="{{ route('dashboard.admins.edit',$admin->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="document.getElementById('user-del-{{$admin->id}}').submit()">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                    <form action="{{route('dashboard.admins.destroy',$admin->id)}}" id='user-del-{{$admin->id}}' method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </a>



                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4 mypagination text-center">
                    {{ $admins->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
</x-backend>

