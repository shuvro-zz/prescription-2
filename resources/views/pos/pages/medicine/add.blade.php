@extends('pos.layout.main')
@section('page_title','Add Medicine')
@section('page_header','Add Medicine')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Dashboard</a></li>
        <li><a href="{{url('medicine/show')}}">Medicine</a></li>
        <li class="active">Add Medicine</li>
    </ol>
@endsection

@section('page_content')
    <div class="col-sm-12">
        <div class="white-box">
            <form onsubmit="product_add()" data-toggle="validator" enctype="multipart/form-data"
                  action="{{url('medicine/add_post')}}" method="post" class="form-material">
                {{csrf_field()}}

                        <!--image-->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="control-label col-md-3">Image</label>
                        <input type="hidden" id="img_add" name="img_add" value="0">
                        <input onclick="add_image()" type="file" id="input-file-now-custom-1"
                               class="dropify" name="image" data-show-remove="false"
                               data-default-file="">
                        <span style="color: peru;">Image should be less than 1 mb and png/jpg format.
                        </span>
                        <span id="name_err" style="color: red;"><br>
                            @if($errors->has('img')){{'Image should be less than 1 mb and png/jpg format.'}}@endif
                        </span>
                    </div>
                </div>

                <!--name,brand -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Name</label>
                        <input onblur="check_text_field('name','name_err')"
                               type="text" required class="form-control"
                               name="name" id="name" placeholder="Name"
                               value="">
                            <span id="name_err" style="color: red;">
                                @if($errors->has('name')){{'Name should be minimum 3 latter'}}@endif
                        </span>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="dept_id" class="control-label">Brand</label>
                        <select onchange="add_unit()" class="form-control select2" name="unit_id"
                                id="unit_id" required>
                            <option value="0">Choose Brand</option>
                            @foreach($brand as $u)
                                <option value="{{$u->id}}">{{$u->name}}</option>
                            @endforeach
                        </select>
                        <span id="dept_id_err" style="color: red; ">
                             @if($errors->has('unit_id')){{'required'}}@endif
                        </span>

                    </div>
                </div>
                <!--Power ,-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="buy_price" class="control-label">Power</label>
                        <input onblur="check_num_field('power','power_err')"
                               onkeyup="check_num_field('power','power_err')"
                               type="text" required class="form-control"
                               name="power" id="power" placeholder="power"
                               value="">
                            <span id="buy_price_err" style="color: red;">
                                 @if($errors->has('power_eng')){{'Required'}}@endif
                            </span>
                    </div>
                </div>

                <div class=" form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{url('medicine/show')}}">
                        <button type="button" class="btn btn-default">Back</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    //..............on submit function....
    function product_add() {


    }


    function add_image() {
        document.getElementById('img_add').value = 1;
    }
</script>