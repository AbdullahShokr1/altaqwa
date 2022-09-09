<x-editor>
<div class="content" dir="rtl">
    <div class="container-fluid">
        <h4 class="page-title">Posts</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Post</div>
                    </div>
                    <form action="{{route('dashboard.post.update',$post->id)}}" method="POST" class="card-body" enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <div class="form-group">
                            <textarea class="form-control tinymce" name='my_content' id="my_content" placeholder="Enter content">{{$post->my_content}}</textarea>
                            @error('my_content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <section class="form-content">
                            <section class="seo-form">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name='title' value="{{$post->title}}" id="title" placeholder="Enter Title">
                                    <small id="slugHelp" class="form-text text-muted">The Title shoude be less than 65 Letter</small>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name='description' id="description" placeholder="Enter Description">{{$post->description}}</textarea>
                                    <small id="descriptionHelp" class="form-text text-muted">The Description shoude be less than 155 characters </small>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keywords">keywords</label>
                                    <input type="text" class="form-control" name='keywords' value="{{$post->keywords}}" id="keywords" placeholder="Enter Keywords">
                                    @error('keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name='slug' value="{{$post->slug}}" id="slug" placeholder="Enter Slug">
                                    <small id="slugHelp" class="form-text text-muted">The Slug shoude be small Letter && less than 50 Letter</small>
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select id="category_id" name="category_id">
                                        @foreach ( $categories as $category)
                                            <option value="{{ $category ->id}}" {{ ($post ->category_id) == $category ->id ? 'selected' : '' }}>{{ $category ->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="text" name='writer_id' value="{{$post ->writer_id}}" hidden>
                                </div>
                                <div class="form-group">
                                    <h4>Tags</h4>
                                    @foreach($tags as $tag)
                                        @if($tag->tagpost->contains('post_id',$post->id) )
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox{{$tag->id}}" name="tag_id[]" value="{{$tag->id}}" checked>
                                                <label for="customCheckbox{{$tag->id}}" class="custom-control-label">{{$tag->title}}</label>
                                            </div>
                                        @else
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox{{$tag->id}}" name="tag_id[]" value="{{$tag->id}}" >
                                                <label for="customCheckbox{{$tag->id}}" class="custom-control-label">{{$tag->title}}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>


                                <div class="form-group">
                                    <label for="telephone">telephone</label>
                                    <input type="text" class="form-control" name='telephone' value="{{$post-> telephone}}" id="telephone" placeholder="Enter telephone">
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="main-photo">
                                <div class="ml-2 col-sm-12" dir="ltr">
                                    <div id="msg"></div>
                                    <input type="file" name="photo" value="{{$post -> photo}}" class="file" accept="image/*">
                                    <div class="input-group my-3">
                                            <label for="photo">Add Main Post Photo</label>
                                            <br/>
                                        <input type="text" name='photo' value="{{$post -> photo}}" class="form-control" disabled placeholder="Upload File" id="file">
                                        <div class="input-group-append">
                                        <button type="button" class="browse btn btn-primary">Browse...</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-2 col-sm-12">
                                    <img src="{{ asset('site/images/post/'.$post -> photo)}}" id="preview" class="img-thumbnail">
                                </div>
                            </section>
                        </section>

                        <div class="card-action">
                            <button class="btn btn-success">Update Post</button>
                            <a href="{{route('dashboard.post.index')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @section('script')
        <script src="{{URL::asset('dashboardfile/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('dashboardfile\dist\js\tinymce\js\tinymce/tinymce.min.js')}}"></script>
        <script src="{{ asset('dashboardfile\dist\js\tinymce\js\tinymce/jquery.tinymce.min.js')}}"></script>
        <script>
            $(function(){
                $('textarea.tinymce').tinymce({
                    height: 1600,
                    language:'ar',
                    directionality:'rtl',
                    plugins:[
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table  directionality',
                        'emoticons template paste  textpattern imagetools codesample toc help',
                    ],
                    contextmenu: " cut copy paste | link image inserttable | cell row column deletetable",
                    toolbar1:'undo redo | fontsizeselect styleselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |ltr rtl | link media image codesample | charmap emoticons |preview | forecolor backcolor removeformat ',
                    file_picker_callback (callback, value, meta) {
                        let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                        let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                        tinymce.activeEditor.windowManager.openUrl({
                            url : '/file-manager/tinymce5',
                            title : 'Laravel File manager',
                            width : x * 0.8,
                            height : y * 0.8,
                            onMessage: (api, message) => {
                                callback(message.content, { text: message.text })
                            }
                        })
                    },
                });
            });
        </script>
    @endsection
</x-editor>


