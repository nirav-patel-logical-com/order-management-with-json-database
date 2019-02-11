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
                                            @if (isset($product_data) && !empty($product_data))
                                                <input type="hidden" class="form-control" id="p_id" value="{{$product_data['id']}}">
                                                {{--<form name="contact_send_inquiry" id="contact_send_inquiry" method="post" enctype="multipart/form-data">--}}
                                            <div class="row">
                                                <div class="form-group col-12" id="div_name">
                                                    <label for="name">Product name</label>
                                                    <input type="text" class="form-control" id="name" value="{{$product_data['product_name']}}" placeholder="Enter Product name">
                                                    <span class="pull-right text-danger" id="msg_name"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6" id="div_email1">
                                                    <label>Quantity in stock</label>
                                                    <input type="text" class="form-control" id="quantity" value="{{ $product_data['quantity']}}"  placeholder="Enter Quantity in stock">
                                                    <span class="pull-right text-danger" id="msg_quantity"></span>
                                                </div>
                                                <div class="form-group col-6" id="div_mobile">
                                                    <label>Price per item</label>
                                                    <input type="text" class="form-control" id="price" value="{{ $product_data['price']}}"  placeholder="Enter Price per item">
                                                    <span class="pull-right text-danger" id="msg_price"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-12 text-center">
                                                    <button type="submit" class="btn btn-themacolor add_product">Submit</button>
                                                </div>
                                            </div>
                                            @endif
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
            $id = $("#p_id").val().trim();


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
            }else{
                $("#div_quantity").removeClass('has-error');
                $("#msg_quantity").html("");
            }

            if($price == '' || $price == null){
                $flag++;
                $("#div_price").addClass('has-error');
                $("#msg_price").html("Price is Required.");
            }else{
                $("#div_price").removeClass('has-error');
                $("#msg_price").html("");
            }



            if($flag == 0){
                $.ajax({
                    url: '<?php echo route('api_product_edit'); ?>',
                    type: 'POST',
                    data: {
                        'name': $name,
                        'price': $price,
                        'quantity': $quantity,
                        'p_id': $id,
                        '_token': '<?php echo csrf_token();?>'
                    },
                    success: function (response) {
                        var obj = jQuery.parseJSON(response)
                        if(obj.STATUS_CODE == 200) {
                            swal("Success","Product update successfully", "success");

                            $("#name").val("");
                            $("#price").val("");
                            $("#quantity").val("");
                            window.location="{{route('product_list')}}"
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



