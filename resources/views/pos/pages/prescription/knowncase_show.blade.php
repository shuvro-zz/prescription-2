@extends('pos.layout.main')
@section('page_title','Known Case')
@section('page_header','Known Case')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{url('home/dashboard')}}">Dashboard</a></li>
        <li class="active">Known Case</li>
    </ol>
@endsection
@section('page_content')    
    <div class="col-sm-12">
        <div class="white-box">
            <div>
                <a href="{{url('prescription/known_case_add')}}">
                    <button class="btn btn-success btn-rounded">
                        <span class="fa fa-plus-circle" style=""></span> Add Known Case
                    </button>
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="myTable" class="table color-bordered-table success-bordered-table table-striped  no-footer">
                    <thead>
                    <tr>
                        <th><span data-toggle="tooltip" title="&nbsp;&nbsp;S.L">#</span></th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th style="text-align: center; width: 10%;">
                            <span data-toggle="tooltip" title="Action" class="fa fa-wrench"
                                  style="color: darkseagreen"></span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($note_info as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->title}}</td>
                            <td><?= $row->detail?></td>
                            <td style="width: 10%; text-align: center;">
                                <a href="#" data-toggle="modal" data-target="#myModal{{$row->id}}" data-toggle="tooltip" title="Edit Details"
                                   style="cursor: pointer;">
                                    <span class="glyphicon glyphicon-edit" style="color: peru"></span>&nbsp;
                                </a>
                                <a href="{{url('prescription/delete_known_case/'.$row->id)}}" data-toggle="tooltip" title="Delete Note"
                                   style="cursor: pointer;">
                                    <span class="glyphicon glyphicon-remove" style="color: peru"></span>&nbsp;
                                </a>
                            </td>
                        </tr>

                            <div class="container">
                              <div class="modal fade" id="myModal{{$row->id}}" role="dialog">
                                <div class="modal-dialog">
                                  <div class="modal-content">

                                    <form action="{{url('prescription/update_known_case')}}" method="post">{{csrf_field()}}
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Edit note</h4>
                                        </div>
                                        <div class="modal-body">
                                        <label>Title</label>
                                          <p><input class="form-control" type="text" name="title" value="{{$row->title}}"></p>
                                        <label>Detail</label>
                                          <p><textarea class="summernote" name="detail" cols="90" rows="4">{{$row->title}}</textarea></p>
                                        </div>
                                        <div class="modal-footer" style="text-align:center">
                                          <input type="submit" class="btn btn-success" value="submit">
                                          <input type="hidden" name="id" value="{{$row->id}}">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--View Product Modal -->
    <div id="product_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header label-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Product All Info</h4>
                </div>
                <div class="modal-body">
                    <div id="p_table">
                        <table class="table table-striped table-bordered" >
                            <tr>
                                <td colspan="2">
                                    <img style="height: 150px;" id="image" src="" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%">Code</td>
                                <td>
                                    <span id="code"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <span id="name"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>
                                    <span id="cat"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Sub-category</td>
                                <td>
                                    <span id="sub_cat"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Unit</td>
                                <td>
                                    <span id="unit"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Purchase price</td>
                                <td>
                                    <span id="buy_price"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Sell price</td>
                                <td>
                                    <span id="sell_price"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
