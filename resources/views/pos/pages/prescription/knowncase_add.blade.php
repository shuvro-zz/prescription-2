@extends('pos.layout.main')
@section('page_title','Add Known Case')
@section('page_header','Add Known Case')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{url('home/dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('prescription/known_case')}}">Known case</a></li>
        <li class="active">Add Known Case</li>
    </ol>
@endsection
@section('page_content')    
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                <form action="{{url('prescription/add_known_case_post')}}" method="post">{{csrf_field()}}
                    <div class="form-group col-md-8 col-md-offset-2">
                        <label for="class_name" class="col-md-12 control-label" style="text-align:left">Name</label>
                        <div class="col-md-12">
                            <input name="title" type="text" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group col-md-8 col-md-offset-2">
                        <label for="class_name" class="col-md-12 control-label" style="text-align:left">Description</label>
                        <div class="col-md-12">
                            <textarea name="detail" required="" rows="7" class="summernote"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-8 col-md-offset-2" style="text-align: center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
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
