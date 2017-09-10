@extends('pos.layout.main')
@section('page_title','admin')
@section('page_header','admin')
@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li class="active">Inbox</li>
    </ol>
@endsection

@section('page_content')


    <div class="col-sm-12">
        <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="memberModal" data-keyboard="false" data-backdrop="static" tabindex="-1"
                 role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title text-center" id="memberModalLabel">Please fill the all information below</h4>
                        </div>
                        <div class="modal-body">
                            <form data-toggle="validator" enctype="multipart/form-data"
                                  action="{{url('home/insert_company')}}" method="post" class="form-material">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Company Name</label>
                                        <input type="text" class="form-control" required name="name"
                                               placeholder="Company Name">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Company Address</label>
                                        <input type="text" class="form-control" required name="address"
                                               placeholder="Company Address">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Company Phone</label>
                                        <input type="text" data-mask="+8801999999999" class="form-control" required name="contact"
                                               placeholder="Company Phone">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Company Email (If available)</label>
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Company Email">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Company Website (If available)</label>
                                        <input type="text" class="form-control" name="website"
                                               placeholder="Company Website">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Company Title</label>
                                        <input onkeyup="chk_word()" type="text" class="form-control" required id="title" name="title"
                                       placeholder="Company Title">
                                        <p id="color">Must be in 8 character</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Company Logo</label>
                                        <input type="file" onchange="chk_size()" required class="form-control" id="image" name="image">
                                        <p id="file_color">Image size must be less than 1 MB</p>
                                    </div>

                                </div>

                                <div class=" form-group">
                                    <button type="submit" id="btn_show" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('postJquery')
    var value = '<?php echo $value?>';
    if(value==0)
    {
    $('#memberModal').modal('show');
    } else
    {
    $('#memberModal').modal('hide');
    }
@endsection

     <script type="text/javascript">
        function chk_word()
        {
            var value = $( "#title").val();
           var maxLength = 8;
           if(value.length > maxLength)
           {
                $('#btn_show').hide();
                document.getElementById("color").style.color = "#ff0000";
           }
           else
           {
                document.getElementById("color").style.color = "#ccc";
                $('#btn_show').show();
           }
        }


        function chk_size(){
        var value = document.getElementById("image").files[0].size;
        var maxLength=1024*1024;
            if (value > maxLength)
            {
                // $('#btn_show').hide();
                document.getElementById("file_color").style.color = "#ff0000";
            }
           else
           {
                document.getElementById("file_color").style.color = "black";
                // $('#btn_show').show();
           }
        }
       
    </script>







