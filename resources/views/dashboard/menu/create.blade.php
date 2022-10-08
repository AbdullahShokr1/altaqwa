<x-backend>
    @section('script-a')
        <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
            <!-- Optional theme -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
            <!-- Latest compiled and minified JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <script src="{{URL::asset('dashboardfile/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::asset('dashboardfile/dist/js/jquery-sortable.js')}}"></script>
        <style>
            .item-list,.info-box{background: #fff;padding: 10px;}
            .item-list-body{max-height: 300px;overflow-y: scroll;}
            .panel-body p{margin-bottom: 5px;}
            .info-box{margin-bottom: 15px;}
            .item-list-footer{padding-top: 10px;}
            .panel-heading a{display: block;}
            .form-inline{display: inline;}
            .form-inline select{padding: 4px 10px;}
            .btn-menu-select{padding: 4px 10px}
            .disabled{pointer-events: none; opacity: 0.7;}
            .menu-item-bar{background: #eee;padding: 5px 10px;border:1px solid #d7d7d7;margin-bottom: 5px; width: 75%; cursor: move;display: block;}
            #serialize_output{display: none;}
            .menulocation label{font-weight: normal;display: block;}
            body.dragging, body.dragging * {cursor: move !important;}
            .dragged {position: absolute;z-index: 1;}
            ol.example li.placeholder {position: relative;}
            ol.example li.placeholder:before {position: absolute;}
            #menuitem{list-style: none;}
            #menuitem ul{list-style: none;}
            .input-box{width:75%;background:#fff;padding: 10px;box-sizing: border-box;margin-bottom: 5px;}
            .input-box .form-control{width: 50%}
        </style>
    @stop

        <div class="container content-wrapper">
            <h2><span>Menus</span></h2>
            <div class="content info-box">
                @if(count($menus) > 0)
                    Select a menu to edit:
                    <form action="{{url('dashboard/menu/manage-menus')}}" class=" form-inline">
                        <select name="id">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-default btn-menu-select">Select</button>
                    </form>
                    or
                @endif
                <a href="{{url('dashboard/menu/manage-menus?id=new')}}">Create a new menu</a>.
            </div>
            <div class="row" id="main-row">
                <div class="col-sm-9 cat-view">
                    <h3><span>Menu Structure</span></h3>
                    <h4>Create New Menu</h4>
                    <form method="post" action="{{url('dashboard/menu/create-menu')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Name</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-sm btn-primary">Create Menu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-backend>
