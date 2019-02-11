@extends('layouts.basic')
@section('content')
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-12">
                <div class="row">
                    <div class="container">
                        <div class="row pt-3 pb-3">
                            <div class="col-12 ">

                                <div class="col-md-12">
                                    <div class="row rounded bg-white">
                                        <div class="col-md-12 mt-3 mb-3 text-gray catalog-details">
                                            <div class="row  justify-content-center p-3">
                                                <div class="col-auto text-uppercase justify-content-center">
                                                    <h3>Add product</h3>
                                                </div>
                                                <!-- Force next columns to break to new line -->
                                                <div class="w-100"></div>
                                                <div class="border-dark border col-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                            </div>
                                            <div class="row  justify-content-end p-3">
                                                <div class="col-auto text-uppercase ">
                                                    <h3><a href="{{route('product_list')}}" class="btn btn-themacolor-border pl-5 pr-5 text-uppercase">
                                                            <i class="fas fa-list"></i> &nbsp; product list
                                                        </a></h3>
                                                </div>
                                            </div>
                                            {{--<form name="contact_send_inquiry" id="contact_send_inquiry" method="post" enctype="multipart/form-data">--}}
                                            <div class="row">
                                                <div class="form-group col-12" id="div_name">
                                                    <label for="name">Product name</label>
                                                    <input type="text" class="form-control" id="name"  placeholder="Enter Product name">
                                                    <span class="pull-right text-danger" id="msg_name"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6" id="div_email1">
                                                    <label>Quantity in stock</label>
                                                    <input type="text" class="form-control" id="quantity"  placeholder="Enter Quantity in stock">
                                                    <span class="pull-right text-danger" id="msg_quantity"></span>
                                                </div>
                                                <div class="form-group col-6" id="div_mobile">
                                                    <label>Price per item</label>
                                                    <input type="text" class="form-control" id="price"  placeholder="Enter Price per item">
                                                    <span class="pull-right text-danger" id="msg_price"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-12 text-center">
                                                    <button type="submit" class="btn btn-themacolor add_product">Submit</button>
                                                </div>
                                            </div>

                                            {{--</form>--}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footerjs')
    <script>

        $(".add_product").click(function(){

            $flag = 0;
            $name = $("#name").val();
            $quantity = $("#quantity").val().trim();
            $price = $("#price").val().trim();


            /* Name Validation*/

            if($name == '' || $name == null){
                $flag++;
                $("#div_name").addClass('has-error');
                $("#msg_name").html("Name is required.");
            }else{
                $("#div_name").removeClass('has-error');
                $("#msg_name").html("");
            }

            if($quantity == '' || $quantity == null){
                $flag++;
                $("#div_quantity").addClass('has-error');
                $("#msg_quantity").html("Quantity is Required.");
            }else if(isNaN($quantity)){
                $flag++;
                $("#div_quantity").addClass('has-error');
                $("#msg_quantity").html("Quantity is must be numbers.");
            }else{
                $("#div_quantity").removeClass('has-error');
                $("#msg_quantity").html("");
            }

            if($price == '' || $price == null){
                $flag++;
                $("#div_price").addClass('has-error');
                $("#msg_price").html("Price is Required.");
            }else if(isNaN($price)){
                $flag++;
                $("#div_price").addClass('has-error');
                $("#msg_price").html("Price is must be numbers.");
            }else{
                $("#div_price").removeClass('has-error');
                $("#msg_price").html("");
            }



            if($flag == 0){
                $.ajax({
                    url: '<?php echo route('api_product_add'); ?>',
                    type: 'POST',
                    data: {
                        'name': $name,
                        'price': $price,
                        'quantity': $quantity,
                        '_token': '<?php echo csrf_token();?>'
                    },
                    success: function (response) {
                        var obj = jQuery.parseJSON(response)
                        if(obj.STATUS_CODE == 200) {
                            swal("Success","Product add successfully", "success");
                            window.location="{{route('product_list')}}"
                            $("#name").val("");
                            $("#price").val("");
                            $("#quantity").val("");
                        }else{
                            swal("Error","Something Wrong!", "error");
                        }
                    }
                });
            }else{

            }

        });
    </script>
@endsection



