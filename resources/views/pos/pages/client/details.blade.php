@extends('pos.layout.main')
@section('page_title','Patient Details')
@section('page_header','Patient Details')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{url('home/dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('patient/show')}}">Patient</a></li>
        <li class="active">Patient Details</li>
    </ol>
@endsection


@section('page_content')
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                <div class="form-group">
                    <label for="" class="control-label col-md-6">Patient Name: {{$client_info[0]->name}}</label>
                    <label for="" class="control-label col-md-6">Patient Age: {{$client_info[0]->age}}</label>
                    <label for="" class="control-label col-md-6">Patient
                        Gender: @if($client_info[0]->gender==1){{'Male'}}@elseif($client_info[0]->gender==2){{'Female'}}@else{{$client_info[0]->gender}}@endif</label>
                    <label for="" class="control-label col-md-6">Patient Phone: {{$client_info[0]->phone}}</label>
                    <label for="" class="control-label col-md-6">Patient Address: {{$client_info[0]->address}}</label>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="myTable" class="table color-bordered-table success-bordered-table table-striped  no-footer">
                    <thead>
                    <tr>
                        <th><span data-toggle="tooltip" title="&nbsp;&nbsp;S.L">#</span></th>
                        <th>Date</th>
                        <th>Code</th>
                        <th>Doctor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($client_info[0]->prescription as $row)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>{{explode(' ',$row->created_at)[0]}}</td>
                            <td><a href="{{url('prescription/details/'.$row->id)}}">{{$row->code}}</a></td>
                            <td>{{$row->Doctor->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!--add client modal-->
    <div class="modal fade" id="add_client_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header label-success">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 style="text-align: center;" class="modal-title">New Patient</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="name" class="col-md-3 control-label" style="text-align: right">Name</label>
                            <div class="col-md-9">
                                <input onblur="check_text_field('name','name_err')" name="name"
                                       type="text" id="name" class="form-control" required>
                                <span id="name_err" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="address" class="col-md-3 control-label"
                                   style="text-align: right">Address</label>
                            <div class="col-md-9">
                                <input onblur="check_text_field('address','address_err')" name="address"
                                       type="text" id="address" class="form-control" required>
                                <span id="address_err" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="phone" class="col-md-3 control-label" style="text-align: right">Phone</label>
                            <div class="col-md-9">
                                <input onblur="check_text_field('phone','phone_err')" name="phone"
                                       data-mask="+8801999999999"
                                       type="text" id="phone" class="form-control" required>
                                <span style="color: peru;">+8801*********</span>
                                <span id="phone_err" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="age" class="col-md-3 control-label" style="text-align: right">Age</label>
                            <div class="col-md-9">
                                <input onblur="check_text_field('age','age_err')" name="age"
                                       type="text" id="age" class="form-control" required>
                                <span id="age_err" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="gender" class="col-md-3 control-label" style="text-align: right">Gender</label>
                            <div class="col-md-9">
                                <input name="gender" id="gender1" type="radio" value="1" checked required> Male &nbsp;&nbsp;&nbsp;
                                <input name="gender" id="gender2" type="radio" value="2" required> Female
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="add_client_post()" type="button" class="btn btn-success btn-rounded">Submit
                    </button>
                    <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>

    function add_client() {
        document.getElementById('name').value = '';
        document.getElementById('address').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('age').value = '';

        $('#add_client_modal').modal('show');
    }
    function add_client_post() {
        var flag = true;
        var tmp_name = $('#name').val();
        tmp_name = tmp_name.replace(/\s+/g, '');
        if (tmp_name == '' || tmp_name == null) {
            flag = false;
            var x = document.getElementById('name_err');
            x.style.color = 'red';
            x.innerText = 'Required';
        } else {
            document.getElementById('name_err').innerText = '';
        }
        var tmp_address = $('#address').val();
        tmp_address = tmp_address.replace(/\s+/g, '');
        if (tmp_address == '' || tmp_address == null) {
            flag = false;
            var x = document.getElementById('address_err');
            x.style.color = 'red';
            x.innerText = 'Required';
        } else {
            document.getElementById('address_err').innerText = '';
        }

        var tmp_phone = $('#phone').val();
        tmp_phone = tmp_phone.replace(/\s+/g, '');
        if (tmp_phone == '' || tmp_phone == null || tmp_phone.length != 14) {
            flag = false;
            var x = document.getElementById('phone_err');
            x.style.color = 'red';
            x.innerText = 'Required';
        } else {
            document.getElementById('phone_err').innerText = '';
        }

        var tmp_age = $('#age').val();
        tmp_age = tmp_age.replace(/\s+/g, '');
        if (tmp_age == '' || tmp_age == null) {
            flag = false;
            var x = document.getElementById('age_err');
            x.style.color = 'red';
            x.innerText = 'Required';
        } else {
            document.getElementById('age_err').innerText = '';
        }
        var tmp1_gender = $('input[name=gender]:checked').val();

        if (flag == true) {
            var tmp1_name = $('#name').val();
            var tmp1_address = $('#address').val();
            var tmp1_phone = $('#phone').val();
            var tmp1_age = $('#age').val();

            $.ajax({
                url: base_url + '/client/add',
                method: 'get',
                dataType: 'json',
                data: {
                    name: tmp1_name,
                    address: tmp1_address,
                    phone: tmp1_phone,
                    age: tmp1_age,
                    gender: tmp1_gender
                }, success: function (result) {
                    $('#add_client_modal').modal('hide');

                    $('#client_id option:gt(0)').remove();
                    $.each(result, function (i, v) {
                        $('#client_id').append('<option value="' + v['id'] + '">' + v['name'] + '(' + v['phone'] + ')</option>');
                    });

                    location.reload();
                }
            });
        }
    }

</script>