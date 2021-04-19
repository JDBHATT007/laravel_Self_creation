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
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">

                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="#"><img src="{{$item->gallery}}" alt="Image"></a>
                                                <p>{{$item->name}}</p>
                                            </div>
                                        </td>
                                        <td>Rs. {{$item->price}}</td>
                                        <td>
                                            <div class="qty">
                                                <table>

                                                        <tr>
                                                            <td><a href="/decreaseQuantity/{{$item->cart_id}}" class="btn"><i class="fa fa-minus"></i></a></td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td><a href="/increaseQuantity/{{$item->cart_id}}" class="btn"><i class="fa fa-plus"></i></a></td>
                                                        </tr>

                                                </table>



                                            </div>
                                        </td>
                                        <td>Rs. {{$item->quantity * $item->price}}</td>
                                        <?php
                                            $totalcart=$totalcart+($item->quantity * $item->price)
                                        ?>
                                        <td><a href="/removecart/{{$item->cart_id}}" class="btn"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span>Rs. {{$totalcart}}</span></p>
                                    <p>Shipping Cost<span>Rs. 100</span></p>
                                    <h2>Grand Total<span>Rs. {{$totalcart+100}}</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <form action="/checkout" method="POST">
                                        @csrf
                                        <input type="hidden" name="grand_total" value="{{$totalcart+100}}"/>
                                        <button class="btn">Checkout</button>
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
