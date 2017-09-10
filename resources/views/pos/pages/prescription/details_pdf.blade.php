<!DOCTYPE html>
<html lang="en">

<head>
    <!--<meta charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public/images/')}}/<?=$company_info[0]->logo;?>">
    <title>Prescription Details</title>
</head>
<style>

    .mainTable {
        width: 80%;
        /*border: 1px solid black;*/
    }

    .mainTable .ftable {
        width: 100%;
        margin-bottom: 5px;
        /*border: 1px solid black;*/
    }

    .ftable tr td {
        font-size: 14px;
    }

    .scndtable {
        border: 1px solid black;
        width: 100%;
    }

    .scndtable tr td {
        padding: 2px;
        padding-left: 5px;
    }

    .thrdTble {
        /*border: 1px solid black;*/
        width: 100%;
    }

    .mainTable .thrdTble td {
        border: 1px solid black;
    }

    .mainTable .thrdTble td:last-child {
        border-left: 5px solid blue;
    }

    .lst {
        width: 100%;
    }

    .lst td {
        border: none;
    }
</style>
<body>
<table class="mainTable" align="center" style="padding-top: 70px;">
    <tr>
        <td>
            <table class="ftable">
                <tr>
                    <td style="width:30%;">{{$prescription[0]->doctor->name}}</td>
                    <td></td>
                    <td style="width:20%;">{{$company_info[0]->name}}</td>
                </tr>
                <tr>
                    <td>{{$prescription[0]->doctor->degree}}</td>
                    <td></td>
                    <td>{{$company_info[0]->address}}</td>
                </tr>
                <tr>
                    <td>{{$prescription[0]->doctor->phone}}</td>
                    <td></td>
                    <td>{{$company_info[0]->contact}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="scndtable">
                <tr>
                    <td style="">Reg No : {{$prescription[0]->code}}</td>
                    <td style="width: 25%">Date : {{explode(' ',$prescription[0]->created_at)[0]}}</td>
                </tr>
                <tr>
                    <td>Patient Name : {{$prescription[0]->client->name}}</td>
                    <td>Patient Age : {{$prescription[0]->client->age}} years</td>
                </tr>
                <tr>
                    <td>Patient Phone : {{$prescription[0]->client->phone}}</td>
                    <td>Patient Gender :
                        @if($prescription[0]->client->gender==1)
                            {{'Male'}}
                        @elseif($prescription[0]->client->gender==2)
                            {{'Female'}}
                        @else
                            {{$prescription[0]->client->gender}}
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="thrdTble" cellspacing="0px;">
                <tr>
                    <td style="padding-top:8px;" width="30%;">
                        <label for=""><span style=""><b style="padding-top: 10px">Notes:</b></span></label>
                        @foreach($prescription[0]->note_list as $n)
                            <p style="padding-top: 8px"><?=$n->details?></p>
                            <br>
                        @endforeach
                        <label for=""><span style="font-weight: 700; font-size: 14px;"><b>Tests:</b></span></label>

                        <p style="padding-left: 500px !important;">
                            <?php
                            foreach ($prescription[0]->Test_lists as $key => $kc){ ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;{{$key+1}}. {{$kc->hasTest->title}}<br>
                            <?php }
                            ?>
                        </p>

                    </td>
                    <td style="padding-left: 8px; padding-top: 8px;">
                        <p>Rx,</p>
                        <br>
                        <table class="lst">
                            @foreach($prescription[0]->medicini_list as $m)
                                <tr>
                                    <td style="padding-left:25px">
                                        {{$m->medicine->name.'-'.$m->medicine->power}}
                                        <br>
                                        {{$m->duration}}

                                    </td>
                                    <td>
                                        {{$m->medicine_taken}}
                                        <br>
                                        @if($m->before_meal==1)
                                            {{'Before Meal'}}
                                        @elseif($m->before_meal==2)
                                            {{'After Meal'}}
                                        @else
                                            {{$m->before_meal==1}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-left:25px;">
                                        {{$m->comment}}
                                    </td>
                                    <br>
                                    <br>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"><b>Known Case:</b></td>
                            </tr>
                            @foreach($prescription[0]->known_case_list as $kc)
                                <tr>
                                    <td style="padding-left: 15px;"><b>{{$kc->hasknownCase->title}}</b></td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 30px;"><?=$kc->hasknownCase->detail?></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" style="padding-left:25px;">
                                    <br>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>