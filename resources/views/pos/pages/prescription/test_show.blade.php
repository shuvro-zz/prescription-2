@extends('pos.layout.main')
@section('page_title','Add Test')
@section('page_header','Add Test')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{url('home/dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('/test')}}">Test</a></li>
        <li class="active">Add Test</li>
    </ol>
@endsection
@section('page_content')    
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                <form action="{{url('/add_test_post')}}" method="post">{{csrf_field()}}
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
@endsection
