<x-backend>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Posts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Post</li>
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
                    <h3 class="card-title">Post</h3>
                    @if(session('success'))
                        <div class="alert alert-info" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <a href="{{route('dashboard.post.create')}}"  class="btn btn-block bg-gradient-warning">
                            Add Post
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table text-center table-head-bg-primary mt-4">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Rent</th>
                            <th style="width: 20%">
                                Edit/Delete
                            </th>
                        </tr>
                        </thead>
                        <tbody dir="rtl">
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post -> title}}</td>
                                <td>{{\Illuminate\Support\Str::limit($post -> description, 60, '.....')}}</td>
                                <th>{{$post->category->title}}</th>
                                <th>{{$post -> telephone}}</th>
                                <td>
                                    <input type="checkbox" checked="" name="" value="" data-toggle="toggle" data-onstyle="success">
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" target="_blank" href="{{route('home.post',[$post->category->slug,$post->slug])}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('dashboard.post.edit',$post->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" onclick="document.getElementById('user-del-{{$post->id}}').submit()">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                        <form action="{{route('dashboard.post.destroy',$post->id)}}" id='user-del-{{$post->id}}' method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if ($posts->isEmpty() )
                            <tr>
                                <td colspan="6">There are no Posts Until Now</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="mt-4 mypagination text-center">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
</x-backend>
