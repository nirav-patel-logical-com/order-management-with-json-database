@extends('layouts.basic')
@section('content')
    <div class="container-fluid ">
        <div class="row bg-white">
            <div class="col-12">
                <div class="row">
                    <div class="container">
                        <div class="row pt-3 pb-3">
                            <div class="col-12 ">

                                <div class="col-md-12 ">
                                    <div class="row rounded ">
                                        <div class="col-md-12 mt-3 mb-3 text-gray catalog-details">
                                            <div class="row  justify-content-center p-3">
                                                <div class="col-auto text-uppercase justify-content-center">
                                                    <h3>product</h3>
                                                </div>
                                                <!-- Force next columns to break to new line -->
                                                <div class="w-100"></div>
                                                <div class="border-dark border col-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                            </div>
                                            <div class="row  justify-content-end p-3">
                                                <div class="col-auto text-uppercase ">
                                                    <h3><a href="{{route('add_product')}}" class="btn btn-themacolor-border pl-5 pr-5 text-uppercase">
                                                            <i class="fas fa-plus"></i> &nbsp; Add product
                                                        </a></h3>
                                                </div>
                                            </div>
                                            {{--<form name="contact_send_inquiry" id="contact_send_inquiry" method="post" enctype="multipart/form-data">--}}
                                            <table id="contactsTable" class="table table-striped">
                                                <thead>
                                                <tr>

                                                    <th>Product name</th>
                                                    <th>Quantity in stock</th>
                                                    <th>Price per item</th>
                                                    <th>Total value number</th>
                                                    <th>Datetime submitted</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if (isset($product_data) && !empty($product_data))
                                                @foreach ($product_data as $single)

                                                <tr>
                                                    <td><?php echo $single['product_name'];?></td>
                                                    <td><?php echo $single['quantity'];?></td>
                                                    <td><?php echo $single['price'];?></td>
                                                    <td><?php echo $single['total'];?></td>
                                                    <td><?php echo $single['time'];?></td>
                                                    <td> <a href="{{route('edit_product',[$single['id']])}}" class="btn btn-themacolor-border pl-5 pr-5 text-uppercase">
                                                            <i class="fas fa-edit"></i> &nbsp; Edit
                                                        </a></td>
                                                </tr>
                                               @endforeach
                                                    @endif
                                                </tbody>
                                            </table>

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




