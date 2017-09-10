@extends('pos.layout.main')
@section('page_title','Edit Patient')
@section('page_header','Edit Patient')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{url('home/dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('patient/show')}}">Patient</a></li>
        <li class="active">Edit Patient</li>
    </ol>
@endsection

@section('page_content')
    <div class="col-sm-12">
        <div class="white-box">
            <form data-toggle="validator" enctype="multipart/form-data" action="{{url('patient/update')}}"
                  method="post" class="form-material">
                {{csrf_field()}}

                        <!--name,unit -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name"
                               value="{{$all_info[0]['name']}}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="address"
                               value="{{$all_info[0]['address']}}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                               value="{{$all_info[0]['phone']}}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Age</label>
                        <input type="text" class="form-control" name="age" placeholder="Age"
                               value="{{$all_info[0]['age']}}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Gender</label>
                        <div>
                            <input type="radio" name="gender" value="1" <?php if($all_info[0]['gender']==1){ echo 'checked';}?>> Male &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="2" <?php if($all_info[0]['gender']==2){ echo 'checked';}?>> Female &nbsp;&nbsp;&nbsp;
                        </div>

                    </div>
                </div>

                <input type="hidden" name="edit_id" value="{{$all_info[0]['id']}}">

                <div class=" form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection