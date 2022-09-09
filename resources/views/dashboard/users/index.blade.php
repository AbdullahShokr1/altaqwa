<x-backend>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">Users</h3>
                @if(session('success'))
                    <div class="alert alert-info" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <a href="{{route('dashboard.users.create')}}"  class="btn btn-block bg-gradient-warning">
                        Add User
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
                        <th style="width: 30%">
                            User Photo
                        </th>
                        <th style="width: 20%">
                            User Name
                        </th>
                        <th>
                            User Email
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->id}}
                            </td>
                            <td>
                                <img alt="{{$user->name}}" class="table-avatar" src="{{asset('site/images/users/'.$user->photo)}}">
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td class="project_progress">
                                {{$user->email}}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('dashboard.users.edit',$user->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="document.getElementById('user-del-{{$user->id}}').submit()">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                    <form action="{{route('dashboard.users.destroy',$user->id)}}" id='user-del-{{$user->id}}' method="post">
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
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
</x-backend>

