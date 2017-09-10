@extends('pos.layout.main')
@section('page_title','Prescription Details')
@section('page_header','Prescription Details')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{url('home/dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('prescription/show')}}">Prescription List</a></li>
        <li class="active">Prescription Details</li>
    </ol>
@endsection
@section('prescription_style')

    .ftable{

    }
    .ftable tr td{
    padding: 2px;
    width:100%;
    }

    .scndtable{
    border:1px solid black;
    width:100%;
    }
    .scndtable tr td{
    padding: 2px;
    padding-left:5px;
    }
    .prsDIV > div {
    min-height: 400px;
    }
    .prsDIV > div.medicine {
    border-left: 1px solid #aaa;
    }
@endsection
@section('page_content')
    <div class="col-sm-12" id="targetDIV">
        <div class="white-box">
            <div class="row">
                <p class="pull-right"><a href="{{url('prescription/pdf/'.$prescription[0]->id)}}"
                                         style="padding-right: 25px; font-size: 20px; cursor: pointer"
                                         data-toggle="tooltip" title="print"><span
                                class="glyphicon glyphicon-print"></span></a></p>
            </div>
            <div class="table-responsive">
                <table class="ftable">
                    <tr>
                        <td>{{$prescription[0]->doctor->name}}</td>
                        <td>{{$company_info[0]->name}}</td>
                    </tr>
                    <tr>
                        <td>{{$prescription[0]->doctor->degree}}</td>
                        <td>{{$company_info[0]->address}}</td>
                    </tr>
                    <tr>
                        <td>{{$prescription[0]->doctor->phone}}</td>
                        <td>{{$company_info[0]->contact}}</td>
                    </tr>
                </table>
            </div>

            <div class="table-responsive">
                <table class="scndtable">
                    <tr>
                        <td style="width: 76%">Reg No : {{$prescription[0]->code}}</td>
                        <td style="width: 24%">Date : {{explode(' ',$prescription[0]->created_at)[0]}}</td>
                    </tr>
                    <tr>
                        <td>Patient Name : {{$prescription[0]->client->name}}</td>
                        <td>Patient Age : {{$prescription[0]->client->age}} years</td>
                    </tr>
                    <tr>
                        <td>Patient Gender :
                            @if($prescription[0]->client->gender==1)
                                {{'Male'}}
                            @elseif($prescription[0]->client->gender==2)
                                {{'Female'}}
                            @else
                                {{$prescription[0]->client->gender}}
                            @endif
                        </td>
                        <td>Patient Phone : {{$prescription[0]->client->phone}}</td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 10px;">
                <div class="row prsDIV">

                    <div class="col-md-5 form-group">
                        <label for=""><span style="font-weight: 700; font-size: 14px;">Notes:</span></label>
                        <div class="row" style="padding-left: 25px;">
                        @foreach($prescription[0]->note_list as $n)

                                <p><?=$n->details?></p>
                            </div>
                        @endforeach
                        <label for=""><span style="font-weight: 700; font-size: 14px;">Tests:</span></label>
                        <div class="">
                            <?php
                            foreach ($prescription[0]->Test_lists as $key => $kc){ ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;{{$key+1}}. {{$kc->hasTest->title}}<br>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-7 medicine form-group">
                        <div class="row" style="padding-left: 25px;"><p style="font-size: 16px;">Rx,</p></div>
                        @foreach($prescription[0]->medicini_list as $m)
                            <div style="margin-bottom: 8px;">
                                <div class="row" style="padding-left: 30px; margin-bottom: 2px;">
                                    <div class="col-md-8 form-group" style="margin-bottom: 2px;">
                                        {{$m->medicine->name.'-'.$m->medicine->power}}
                                    </div>
                                    <div class="col-md-4 form-group" style="margin-bottom: 2px;">
                                        {{$m->duration}}
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 30px;">
                                    <div class="col-md-8" style="margin-bottom: 2px;">
                                        {{$m->medicine_taken}}
                                    </div>
                                    <div class="col-md-4" style="margin-bottom: 2px;">
                                        @if($m->before_meal==1)
                                            {{'Before Meal'}}
                                        @elseif($m->before_meal==2)
                                            {{'After Meal'}}
                                        @else
                                            {{$m->before_meal==1}}
                                        @endif
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 30px;">
                                    <div class="col-md-12">
                                        {{$m->comment}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row" style="padding-left: 20px; margin-top: 25px;">
                            <div class="form-group col-md-12">
                                <label for=""><span
                                            style="font-weight: 700; font-size: 14px;">Known Case:</span></label>
                                <div class="">
                                    <?php
                                    foreach ($prescription[0]->known_case_list as $key => $kc){ ?>
                                    <label style="padding-left: 8px;">{{$kc->hasknownCase->title}}</label>
                                    <p style="padding-left: 15px;"><?=$kc->hasknownCase->detail?></p>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('postJquery6')
@endsection