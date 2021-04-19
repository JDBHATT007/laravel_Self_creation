
@include('header')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
            <li class="breadcrumb-item active">My Account</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- My Account Start -->
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>

                                        <th>Order Id</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!$orders)
                                        @foreach ($orders as $order)
                                        <tr>

                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>Rs. {{$order->amount}}</td>
                                            <td>{{$order->status}}</td>
                                            <td>{{$order->payment_status}}</td>
                                            <td>{{$order->payment_method}}</td>
                                            <td><a href="/viewOrderDetail/{{$order->order_id}}" class="btn">View</a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <td colspan="7">No Records Found.!</td>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Account Details</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <form action="/updateProfile" method="POST">
                                    @csrf
                                    <div class="col-md-12 col-lg-12">
                                        <input class="form-control" type="text" name="name" required value="{{$user->name}}" placeholder="First Name">
                                    </div>
                                    <div class="col-md-12  col-lg-12">
                                        <input class="form-control" disabled type="text" value="{{$user->email}}" placeholder="Email">
                                    </div>
                                    <div class="col-md-12  col-lg-12">
                                        <button type="submit" class="btn">Update Account</button>
                                        <br><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h4>Password change</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <form action="/changePassword" method="POST">
                                    @csrf
                                    <div class="col-md-12">
                                        <input class="form-control" name="oldPassword" required type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" name="newPassword" required type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control"  name="cnewPassword" required type="password" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->
@include('footer')
