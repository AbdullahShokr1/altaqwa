<x-backend>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Page</li>
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
                    <h3 class="card-title">Page</h3>
                    @if(session('success'))
                        <div class="alert alert-info" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <a href="{{route('dashboard.page.create')}}"  class="btn btn-block bg-gradient-warning">
                            Add Page
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table text-center table-head-bg-primary mt-4">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th >Description</th>
                            <th >Writer</th>
                            <th style="width: 20%">
                                Edit/Delete
                            </th>
                        </tr>
                        </thead>
                        <tbody dir="rtl">
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{$page -> title}}</td>
                                <td>{{\Illuminate\Support\Str::limit($page -> description, 60, '.....')}}</td>
                                <td>{{$page->admin->name}}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" target="_blank" href="{{route('home.page',$page->slug)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('dashboard.page.edit',$page->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" onclick="document.getElementById('user-del-{{$page->id}}').submit()">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                        <form action="{{route('dashboard.page.destroy',$page->id)}}" id='user-del-{{$page->id}}' method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if ($pages->isEmpty() )
                            <tr>
                                <td colspan="6">There are no Posts Until Now</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="mt-4 mypagination text-center">
                        {{ $pages->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
</x-backend>
