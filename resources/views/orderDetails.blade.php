<?php
use App\Models\Product;
?>
@include('header')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
            <li class="breadcrumb-item active">My orders</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>

                                        <th>Order Id</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>

                                        <td>{{$order->order_id}}</td>
                                        <td>
                                            <?php

                                                $product=Product::where('id',$order->product_id)->get();
                                                foreach($product as $p){
                                                    $prod_name=$p->name;
                                                    $prod_img=$p->gallery;
                                                }
                                            ?>

                                            <div class="img">
                                                <a href="#"><img src="{{$prod_img}}" style="max-height: 75px; max-width:75px;" alt="Image"></a>
                                                {{$prod_name}}
                                            </div>
                                        </td>
                                        <td>Rs. {{$order->product_price}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->amount}}</td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->
@include('footer')
