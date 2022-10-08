<x-editor>
<div class="content" dir="rtl">
    <div class="container-fluid">
        <h4 class="page-title">Pages</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Page</div>
                    </div>
                    <form action="{{route('dashboard.page.update',$page->id)}}" method="POST" class="card-body" enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <div class="form-group">
                            <textarea class="form-control tinymce" name='my_content' id="my_content" placeholder="Enter content">{{$page->my_content}}</textarea>
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
                                    <input type="text" class="form-control" name='title' value="{{$page->title}}" id="title" placeholder="Enter Title">
                                    <small id="slugHelp" class="form-text text-muted">The Title shoude be less than 65 Letter</small>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name='description' id="description" placeholder="Enter Description">{{$page->description}}</textarea>
                                    <small id="descriptionHelp" class="form-text text-muted">The Description shoude be less than 155 characters </small>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keywords">keywords</label>
                                    <input type="text" class="form-control" name='keywords' value="{{$page->keywords}}" id="keywords" placeholder="Enter Keywords">
                                    @error('keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name='slug' value="{{$page->slug}}" id="slug" placeholder="Enter Slug">
                                    <small id="slugHelp" class="form-text text-muted">The Slug shoude be small Letter && less than 50 Letter</small>
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="main-photo">
                                <div class="ml-2 col-sm-12" dir="ltr">
                                    <div id="msg"></div>
                                    <input type="file" name="photo" value="{{$page -> photo}}" class="file" accept="image/*">
                                    <div class="input-group my-3">
                                            <label for="photo">Add Main Post Photo</label>
                                            <br/>
                                        <input type="text" name='photo' value="{{$page -> photo}}" class="form-control" disabled placeholder="Upload File" id="file">
                                        <div class="input-group-append">
                                        <button type="button" class="browse btn btn-primary">Browse...</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-2 col-sm-12">
                                    <img src="{{ asset('site/images/page/'.$page -> photo)}}" id="preview" class="img-thumbnail">
                                </div>
                            </section>
                        </section>

                        <div class="card-action">
                            <button class="btn btn-success">Update Page</button>
                            <a href="{{route('dashboard.page.index')}}" class="btn btn-danger">Cancel</a>
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
                    relative_urls : false,
                    remove_script_host : false,
                    convert_urls : true,
                    image_class_list: [
                        {title: 'Responsive', value: 'img-responsive'},
                        {title: 'edit', value: 'img-edit'},
                    ],
                    setup: function(ed) {
                        ed.on('NodeChange', function(e) {
                            e.element.parentNode.querySelectorAll('img:not([loading=lazy])').forEach(img => {
                                img.setAttribute('loading', 'lazy');
                            });
                        });
                    },
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


