@extends('pos.layout.main')
@section('page_title','Dashboard')
@section('page_header','')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
@endsection
@php
$date = date('Y-m-d\TH:i:sO');
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
@endphp
@section('my_js')
    <script>

        // Morris bar chart
        Morris.Bar({
            element: 'morris-bar-chart2'
            , data: [
                    <?php $k = 0;$dd = 0;for ($i = 0;$i < $days_of_month;$i++){

                    if (isset($sell_report_monthly[$k]->tran_date)) {
                        $orderdate = explode('-', $sell_report_monthly[$k]->tran_date);

                        $dd = $orderdate[2];
                        //echo 'check';

                    }

                    if($dd == ($i + 1)) { if(isset($sell_report_monthly[$k]->cash)) { ?>
                {
                    y: '<?php $b_digit = $i + 1;echo 'Day-' . $b_digit;?>'
                    , a: '<?=number_format($sell_report_monthly[$k]->cash, 2, '.', '');?>'
                    , b: '<?php if ($sell_report_monthly[$k]->due < 0) {
                    echo "0";
                } else {
                    echo number_format($sell_report_monthly[$k]->due, 2, '.', '');
                }?>'
                },

                    <?php $k++;} } else{ ?>

                {
                    y: '<?php $b_digit = $i + 1;echo 'Day-' . $b_digit;?>'
                    , a: 0
                    , b: 0
                },

                <?php } } ?>

            ]
            , xkey: 'y'
            , ykeys: ['a', 'b']
            , labels: ['Cash', 'Due']
            , barColors: ['#b8edf0', '#fcc9ba']
            , hideHover: 'auto'
            , gridLineColor: '#eef0f2'
            , hideHover: 'true'
            , resize: true
            , xLabelAngle: 60
        });
        // Morris bar chart
        Morris.Bar({
            element: 'morris-bar-chart'
            , data: [
                    <?php $k = 0;$dd = 0;for ($i = 0;$i < $days_of_month;$i++){

                    if (isset($purchase_report_monthly[$k]->tran_date)) {
                        $orderdate = explode('-', $purchase_report_monthly[$k]->tran_date);

                        $dd = $orderdate[2];
                    }

                    if($dd == ($i + 1)) { if(isset($purchase_report_monthly[$k]->cash)) { ?>

                {
                    y: '<?php $b_digit = $i + 1;echo 'Day-' . $b_digit;?>'
                    , a: '<?=number_format($purchase_report_monthly[$k]->cash, 2, '.', '');?>'
                    , b: '<?php if ($purchase_report_monthly[$k]->due < 0) {
                    echo "0";
                } else {
                    echo number_format($purchase_report_monthly[$k]->due, 2, '.', '');
                }?>'
                },

                    <?php $k++;} } else{ ?>

                {
                    y: '<?php $b_digit = $i + 1;echo 'Day-' . $b_digit;?>'
                    , a: 0
                    , b: 0
                },

                <?php } } ?>
            ]
            , xkey: 'y'
            , ykeys: ['a', 'b']
            , labels: ['Cash', 'Due']
            , barColors: ['#fcc9ba', '#b8edf0']
            , hideHover: 'auto'
            , gridLineColor: '#eef0f2'
            , resize: true
            , xLabelAngle: 60
        });

    </script>
@endsection
@section('page_content')
    @php
    $date = date('Y-m-d\TH:i:sO');
    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
    @endphp
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row row-in">

                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-4 col-sm-6 col-xs-6"><i class="fa fa-minus-square text-danger"></i>
                                <h5 class="vb text-danger">Daily Buy</h5></div>
                            <div class="col-md-8 col-sm-6 col-xs-6">
                                <h4 style="font-size:25px"
                                    class="counter text-right m-t-15 text-danger"><?=$new_daily_purchase_res;?>
                                    &#x9f3;</h4></div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span
                                                class="sr-only">40% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                        <div class="col-in row">
                            <div class="col-md-4 col-sm-6 col-xs-6"><i class="fa fa-plus-square text-success"></i>
                                <h5 class="vb text-success">Daily Sell</h5></div>
                            <div class="col-md-8 col-sm-6 col-xs-6">
                                <h4 style="font-size:25px"
                                    class="counter text-right m-t-15 text-success"><?=$new_daily_sell_res;?>&#x9f3;</h4>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        <span class="sr-only">40% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-4 col-sm-6 col-xs-6"><i class="fa fa-minus-square text-danger"></i>
                                <h5 class="vb text-danger">Monthly Buy</h5></div>
                            <div class="col-md-8 col-sm-6 col-xs-6">
                                <h4 style="font-size:25px"
                                    class="counter text-right m-t-15 text-danger"><?=$new_monthly_purchase_res;?>
                                    &#x9f3;</h4></div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span
                                                class="sr-only">40% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6  b-0">
                        <div class="col-in row">
                            <div class="col-md-4 col-sm-6 col-xs-6"><i class="fa fa-plus-square text-success"></i>
                                <h5 class="vb text-success">Monthly Sell</h5></div>
                            <div class="col-md-8 col-sm-6 col-xs-6">
                                <h4 style="font-size:25px"
                                    class="counter text-right m-t-15 text-success"><?=$new_monthly_sell_res;?>
                                    &#x9f3;</h4></div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        <span class="sr-only">40% Complete (success)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row -->
    <div class="row">

        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title"><span class="text-success" style="padding: 3px 45px;border:1px solid #00C292">Product List</span>

                    <div class="col-md-4 col-sm-4 col-xs-6 pull-right">
                        <select onchange="data_change()" id="product_filter_dash"
                                class="selectpicker form-control pull-right row b-none m-b-20 m-r-10"
                                data-style="btn-success btn-outline">
                            <option data-tokens="1" seleted value="1">Stock Alert</option>
                            <option data-tokens="2" value="2">Out of Stock</option>
                            <option data-tokens="3" value="3">All Info</option>
                        </select>


                    </div>
                </h3>
                <div id="pView1" class="table-responsive" style="height: 385px; overflow-y: auto;width:100%;">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Stock</th>
                            <th>Purchase Price</th>
                            <th>Sell Price</th>
                        </tr>
                        </thead>
                        <tbody id="table_filter_dash">
                        @php $i=1; @endphp
                        @foreach($prdct as $p)
                            @if($p->stock[0]->stock_in_hand<$p->danger_alert_qty)
                                <tr>
                                    <td class="txt-oflo">{{$p->name}}</td>
                                    <td style="font-size:25px;">
                                        <span class=" label label-danger" data-toggle="tooltip"
                                              title="Purchase '{{$p->name}}' immediately">{{$p->stock[0]->stock_in_hand}}</span>
                                    </td>
                                    <td class="txt-oflo">
                                        &#x9f3; {{$p->buy_price}}
                                    </td>
                                    <td class="txt-oflo">
                                        &#x9f3;{{$p->sell_price}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="pView2" class="table-responsive" style="height: 385px; overflow-y: auto;width:100%;">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Stock</th>
                            <th>Purchase Price</th>
                            <th>Sell Price</th>
                        </tr>
                        </thead>
                        <tbody id="table_filter_dash">
                        @php $i=1; @endphp
                        @foreach($prdct as $p)
                            @if($p->stock[0]->stock_in_hand==0)
                                <tr>
                                    <td class="txt-oflo">{{$p->name}}</td>
                                    <td style="font-size:25px;">
                                        <span class=" label label-danger" data-toggle="tooltip"
                                              title="Out of Stock">{{$p->stock[0]->stock_in_hand}}</span>
                                    </td>
                                    <td class="txt-oflo">
                                        &#x9f3; {{$p->buy_price}}
                                    </td>
                                    <td class="txt-oflo">
                                        &#x9f3;{{$p->sell_price}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="pView3" class="table-responsive" style="height: 385px; overflow-y: auto;width:100%;">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Stock</th>
                            <th>Purchase Price</th>
                            <th>Sell Price</th>
                        </tr>
                        </thead>
                        <tbody id="table_filter_dash">
                        @php $i=1; @endphp
                        @foreach($prdct as $p)
                            <tr>
                                <td class="txt-oflo">{{$p->name}}</td>
                                <td style="font-size:25px;">
                                    @if($p->stock[0]->stock_in_hand==0)
                                        <span class=" label label-danger" data-toggle="tooltip"
                                              title="Out of Stock">{{$p->stock[0]->stock_in_hand}}</span>
                                    @elseif($p->stock[0]->stock_in_hand < $p->danger_alert_qty)
                                        <span data-toggle="tooltip" title="Purchase '{{$p->name}}' immediately"
                                              class=" label label-danger">{{$p->stock[0]->stock_in_hand}}</span>
                                    @else
                                        <span class="label label-success">{{$p->stock[0]->stock_in_hand}}</span>
                                    @endif
                                </td>
                                <td class="txt-oflo">
                                    &#x9f3;{{$p->buy_price}}
                                </td>
                                <td class="txt-oflo">
                                    &#x9f3;{{$p->sell_price}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--bar chart for sell -->
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="label-success m-b-15">
                <div class="row p-20">
                    <div class="col-md-12">
                        <div class="clock" style="margin: 4em 3em 9em;"></div>
                        <p class="text-white clock-text"><?=date("jS \ F Y");?></p>
                        <p class="text-white clock-text2"><?=date("l");?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- finishde Custom change By Alamin-->
    <!-- /.row -->
    <!--bar chart for sell -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">
                    <?php $month_name = '';

                    $today_date = date('Y-m-d');
                    $orderdate = explode('-', $today_date);
                    $mm = $orderdate[1];

                    if ($mm == 01) {
                        $month_name = 'January';
                    }
                    if ($mm == 02) {
                        $month_name = 'February';
                    }
                    if ($mm == 03) {
                        $month_name = 'March';
                    }
                    if ($mm == 04) {
                        $month_name = 'April';
                    }
                    if ($mm == 05) {
                        $month_name = 'May';
                    }
                    if ($mm == 06) {
                        $month_name = 'June';
                    }
                    if ($mm == 07) {
                        $month_name = 'July';
                    }
                    if ($mm == 08) {
                        $month_name = 'August';
                    }
                    if ($mm == 09) {
                        $month_name = 'September';
                    }
                    if ($mm == 10) {
                        $month_name = 'October';
                    }
                    if ($mm == 11) {
                        $month_name = 'November';
                    }
                    if ($mm == 12) {
                        $month_name = 'December';
                    }

                    ?>

                    <?php echo 'Sell Report of ' . $month_name;?> </h3>
                <div id="morris-bar-chart2"></div>
            </div>
        </div>
    </div>
    <!--bar chart for purchase-->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title"><?php echo 'Purchase Report of ' . $month_name;?> </h3>
                <div id="morris-bar-chart"></div>
            </div>
        </div>
    </div>
@endsection

@section('postJquery')
    $('#pView1').show();
    $('#pView2').hide();
    $('#pView3').hide();
@endsection
<script>
    function data_change() {
        var tmp = $('#product_filter_dash').val();

        if (tmp == 1) {
            $('#pView1').show();
            $('#pView2').hide();
            $('#pView3').hide();
        } else if (tmp == 2) {
            $('#pView2').show();
            $('#pView1').hide();
            $('#pView3').hide();
        } else {
            $('#pView3').show();
            $('#pView1').hide();
            $('#pView2').hide();
        }
    }
</script>
