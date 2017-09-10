<!-- jQuery -->
<script src="{{url('resources/assets/pos/')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{url('resources/assets/pos/')}}/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{url('resources/assets/pos/')}}/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="{{url('resources/assets/pos/')}}/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="{{url('resources/assets/pos/')}}/js/waves.js"></script>

<!-- Plugin JavaScript -->
<script src="{{url('resources/assets/pos/')}}/bower_components/moment/moment.js"></script>

<!-- Color Picker Plugin JavaScript -->
<script src="{{url('resources/assets/pos/')}}/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{url('resources/assets/pos/')}}/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{url('resources/assets/pos/')}}/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>


<script>
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('.datepicker-autocloses').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        todayHighlight: true
    });

    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({

        todayHighlight: true
    });

    // Daterange picker

    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });


    //    Day Picker

    $('.daily_datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        startView: "days",
        minViewMode: "days"
    });

    //    End Day Picker

    //    Month Picker
    $('.month_datepicker').datepicker({
        format: "yyyy-mm",
        autoclose: true,
        startView: "months",
        minViewMode: "months"
    });

    //End Month Picker

    //Year Picker

    $('.year_datepicker').datepicker({
        format: "yyyy",
        autoclose: true,
        startView: "years",
        minViewMode: "years"
    });

    //End Year Picker

    var $loading = $('#loadingDiv').hide();


    $(document)
            .ajaxStart(function () {
                $loading.show();
                console.log('start');
            })
            .ajaxStop(function () {
                $loading.hide();
                console.log('end');
            });
</script>

<!--Counter js -->
<script src="{{url('resources/assets/pos/')}}/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<!--Morris JavaScript -->
<script src="{{url('resources/assets/pos/')}}/bower_components/raphael/raphael-min.js"></script>
@yield('my_js')

        <!-- Custom Theme JavaScript -->
<script src="{{url('resources/assets/pos/')}}/js/custom.min.js"></script>
{{--<script src="{{url('resources/assets/pos/')}}/js/dashboard1.js"></script>--}}
<script src="{{url('resources/assets/pos/')}}/bower_components/switchery/dist/switchery.min.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/custom-select/custom-select.min.js"
        type="text/javascript"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/bootstrap-select/bootstrap-select.min.js"
        type="text/javascript"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"
        type="text/javascript"></script>
<script type="text/javascript"
        src="{{url('resources/assets/pos/')}}/bower_components/multiselect/js/jquery.multi-select.js"></script>
<script src="{{url('resources/assets/pos/')}}/js/jasny-bootstrap.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/summernote/dist/summernote.min.js"></script>
<script src="{{url('resources/assets/pos/')}}/js/mask.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/bootstrap-table/dist/bootstrap-table.ints.js"></script>

<!-- Sparkline chart JavaScript -->
<script src="{{url('resources/assets/pos/')}}/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="{{url('resources/assets/pos/')}}/bower_components/toast-master/js/jquery.toast.js"></script>
<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());

        });

        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }

        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();

        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });

        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });

        // For multiselect

        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({ selectableOptgroup: true });

        $('#public-methods').multiSelect();
        $('#select-all').click(function(){
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function(){
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function(){
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function(){
            $('#public-methods').multiSelect('addOption', { value: 42, text: 'test 42', index: 0 });
            return false;
        });

    });

</script>
<script>

    jQuery(document).ready(function () {

        $('.summernote').summernote({
            height: 150,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function () {
        $(".click2edit").summernote()
    },
            window.save = function () {
                $(".click2edit").destroy()
            }
</script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "columnDefs": [
                    {"visible": false, "targets": 2}
                ],
                "order": [[2, 'asc']],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({page: 'current'}).nodes();
                    var last = null;

                    api.column(2, {page: 'current'}).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                }
                else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

<!--my script-->
<script>
    var img_extn = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];

    var finalEnlishToBanglaNumber = {
        '0': '০',
        '1': '১',
        '2': '২',
        '3': '৩',
        '4': '৪',
        '5': '৫',
        '6': '৬',
        '7': '৭',
        '8': '৮',
        '9': '৯'
    };
    var finalBanglaToEnlishNumber = {
        '০': '0',
        '১': '1',
        '২': '2',
        '৩': '3',
        '৪': '4',
        '৫': '5',
        '৬': '6',
        '৭': '7',
        '৮': '8',
        '৯': '9'
    };

    String.prototype.getDigitBanglaFromEnglish = function () {
        var retStr = this;
        for (var x in finalEnlishToBanglaNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
        }
        return retStr;
    };
    String.prototype.getDigitEnglishFromBangla = function () {
        var retStr = this;
        for (var x in finalBanglaToEnlishNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalBanglaToEnlishNumber[x]);
        }
        return retStr;
    };
    function check_text_field(id, err_id) {
        var tmp_id = $('#' + id).val();
        tmp_id = tmp_id.replace(/\s+/g, '');

        if (tmp_id == '' || tmp_id == null) {
            var x = document.getElementById(err_id);
            x.style.color = 'red';
            x.innerText = 'required';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function check_num_field(id, err_id) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();
        console.log(tmp_num);
        if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
            console.log(isNaN(tmp_num));
            document.getElementById(err_id).innerText = 'Please provide the correct information';
        } else {
            console.log('n');
            document.getElementById(err_id).innerText = '';

        }

    }
    function check_num_field2(id, err_id) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();
        console.log(tmp_num);
        if (tmp_num == null || tmp_num < 0 || isNaN(tmp_num)) {
            console.log(isNaN(tmp_num));
            document.getElementById(err_id).innerText = 'Please provide the correct information';
        } else {
            console.log('n');
            document.getElementById(err_id).innerText = '';
        }

    }
    function check_num_field3(id, err_id) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();
        if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
            document.getElementById(err_id).innerText = 'Please provide the correct information';
        } else {
            document.getElementById(err_id).innerText = '';
            check_price();
        }

    }

    function check_qty(id) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();
        // console.log('check'+tmp_num);
        if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
            var x = document.getElementById(id);
            //   console.log('before'+x.value);
            x.value = x.value.replace(/[^0-9.]/, '');
            // console.log('after'+x.value);
        } else {
        }
        doCal();
    }
    function validateEmail(email) {
        var re = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
        return re.test(email);
    }

</script>
<script>
    jQuery(document).ready(function () {      // Switchery


        $(".select2").select2();
        $('.selectpicker').selectpicker();


    });
</script>
<script>
    jQuery(document).ready(function () {
        @yield('postJquery');
    });
</script>
<script src="{{url('resources/assets/pos/')}}/bower_components/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<!-- jQuery file upload -->
<script src="{{url('resources/assets/pos/')}}/bower_components/dropify/dist/js/dropify.min.js"></script>

<!--Style Switcher -->
<script src="{{url('resources/assets/pos/')}}/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="{{url('resources/assets/pos/')}}/js/simplebar.js"></script>

@yield('postJquery2');