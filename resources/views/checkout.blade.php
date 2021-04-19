<?php
$totalcart=0;
?>
@include('header')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Cart</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="cart-page-inner">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h2>Cart Total<span>Rs. {{$total}}</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <form action="/ordernow" class="login-form" method="POST">
                                        @csrf

                                        <div class="col-md-12">
                                            <input type="hidden" name="grand_total" value="{{$total}}"/>
                                            <label>Address:</label>
                                            <textarea class="form-control" rows="3" cols="50" name="address" required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Payment Method:</label>
                                            <input type="radio" value="online" checked name="payment"><span> Online payment</span></input>
                                            <input type="radio" value="cod" name="payment"><span> Cash on Delivery</span></input>
                                        </div>

                                        <button class="btn">Place Order</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@include('footer')
