@extends('pos.layout.main')
@section('page_title','Brand ')
@section('page_header','Brand ')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{url('home/dashboard')}}">Dashboard</a></li>
        <li class="active">Brand</li>
    </ol>
@endsection
@section('page_content')
    @php
    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
    @endphp
    <div class="col-sm-12">
        <div class="white-box">
            <div>
                <a onclick="add_brand()">
                    <button class="btn btn-success btn-rounded">
                        <span class="fa fa-plus-circle" style=""></span>Add Brand
                    </button>
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="myTable" class="table color-bordered-table success-bordered-table table-striped  no-footer">
                    <thead>
                    <tr>
                        <th style="width: 8%;">
                            <span data-toggle="tooltip" title="&nbsp;&nbsp;S.L">#</span>
                        </th>
                        <th>Brand name</th>
                        <th style="text-align: center">
                            <span data-toggle="tooltip" title="Action" class="fa fa-wrench"
                                  style="color: darkseagreen"></span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($brand as $p)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>{{$p->name}}</td>
                            <td style="width: 10%; text-align: center;">
                                <a onclick="edit_category(<?= $p->id?>)" data-toggle="tooltip" title="Edit Info"
                                   style="cursor: pointer;">
                                    <span class="glyphicon glyphicon-edit" style="color: peru"></span>&nbsp;
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Add Brand Modal -->
    <div class="modal fade" id="add_category_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header label-success">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 style="text-align: center;" class="modal-title">Add Brand</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="class_name" class="col-md-3 control-label"
                                   style="text-align: right">Name</label>
                            <div class="col-md-9">
                                <input onblur="check_text_field('cat_name','cat_name_err')" name="cat_name"
                                       type="text" id="cat_name" class="form-control" required>
                                <span id="cat_name_err" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="add_cat_post()" type="button" class="btn btn-success btn-rounded">Add</button>
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Edit brand Modal -->
    <div class="modal fade" id="edit_category_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header label-success">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 style="text-align: center;" class="modal-title">Edit Brand Info</h4>
                </div>
                <form action="{{url('brand/edit_post')}}" method="post" id="category_edit_form">
                    {{csrf_field()}}
                    <input type="hidden" id="category_id" name="category_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-md-offset-0">
                                <label for="class_name" class="col-md-3 control-label"
                                       style="text-align: right">Name</label>
                                <div class="col-md-9">
                                    <input onblur="check_text_field('category_name','category_name_err')"
                                           name="category_name"
                                           type="text" id="category_name" class="form-control" required>
                                    <span id="category_name_err" style="color: red;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="edit_category_post()" type="button" class="btn btn-success btn-rounded">Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        function add_brand() {
            document.getElementById('cat_name').value = '';
            $('#add_category_modal').modal('show');
        }
        function add_cat_post() {
            var t_name = $('#cat_name').val();
            if (t_name == '' || t_name == null) {
                document.getElementById('cat_name_err').innerText = 'Required';
            } else {
                document.getElementById('cat_name_err').innerText = '';
                $.ajax({
                    url: base_url + '/brand/post',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        name: t_name
                    }, success: function (result) {
                        $('#add_category_modal').modal('hide');
                        location.reload();
                    }
                });
            }
        }

        function edit_category(id) {
            document.getElementById('category_name_err').innerText = '';
            $.ajax({
                url: base_url + '/brand/edit/' + id,
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    $.each(result, function (i, v) {
                        document.getElementById('category_name').value = v['name'];
                        document.getElementById('category_id').value = v['id'];
                    });
                }
            });
            $('#edit_category_modal').modal('show');
        }
        function edit_category_post() {
            var tmp = $('#category_name').val();
            tmp = tmp.replace(/\s+/g, '');
            if (tmp == '' || tmp == null) {
                document.getElementById('category_name_err').innerText = 'Required';
            } else {
                $('#category_edit_form').submit();
            }
        }



    </script>
    @endsection
