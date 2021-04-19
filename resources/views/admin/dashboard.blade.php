<?php
use App\Models\User;
use App\Models\Order_master;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

$allusers=User::all();
$orders=Order_master::all();
$categorys=Category::all();
$brands=Brand::all();
$products=Product::all();
$user=session()->get('user');
?>
@include('header')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admindashboard">Home</a></li>
            <li class="breadcrumb-item active">Admin Dashboard</li>
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
                    <a class="nav-link" id="dash-nav" data-toggle="pill" href="#dash-tab" role="tab"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <a class="nav-link" id="users-nav" data-toggle="pill" href="#users-tab" role="tab"><i class="fa fa-user"></i>Users</a>
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    <a class="nav-link" id="category-nav" data-toggle="pill" href="#category-tab" role="tab"><i class="fas fa-sitemap"></i>Category</a>
                    <a class="nav-link" id="brand-nav" data-toggle="pill" href="#brand-tab" role="tab"><i class="fas fa-copyright" style="color:#000;"></i>Brand</a>
                    <a class="nav-link" id="product-nav" data-toggle="pill" href="#products-tab" role="tab"><i class="fab fa-product-hunt" style="color:#000;"></i>Products</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fas fa-user-circle"></i>Account Details</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dash-tab" role="tabpanel" aria-labelledby="dash-nav">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Total Products</h4>
                                        <h3>{{Product::all()->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Total Orders</h4>
                                        <h3>{{Order_master::all()->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Total User</h4>
                                        <h3>{{User::all()->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Total Product Category</h4>
                                        <h3>{{Category::all()->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Total Product Brand</h4>
                                        <h3>{{Brand::all()->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="users-tab" role="tabpanel" aria-labelledby="users-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($allusers!=null)
                                        @foreach ($allusers as $user)
                                        <tr>

                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->type}}</td>
                                            <td><a href="/deleteUser/{{$user->id}}" class="btn"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <td colspan="4">{{$allusers}}</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
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
                                    @if($orders!=null)
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

                    <div class="tab-pane fade show" id="category-tab" role="tabpanel" aria-labelledby="category-nav">
                        <h4>Category Details</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <form action="/addCategory" method="POST">
                                    @csrf
                                    <div class="col-md-12 col-lg-12">
                                        <input class="form-control" type="text" name="name" required placeholder="Category Name">
                                    </div>
                                    <div class="col-md-12  col-lg-12">
                                        <button type="submit" class="btn">Add New Category</button>
                                        <br><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($categorys!=null)
                                        @foreach ($categorys as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td><a href="/deleteCategory/{{$category->id}}" class="btn"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <td colspan="2">No Records Found.!</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="brand-tab" role="tabpanel" aria-labelledby="brand-nav">
                        <h4>Brand Details</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <form action="/addBrand" method="POST">
                                    @csrf
                                    <div class="col-md-12 col-lg-12">
                                        <input class="form-control" type="text" name="name" required placeholder="Brand Name">
                                    </div>
                                    <div class="col-md-12  col-lg-12">
                                        <button type="submit" class="btn">Add New Brand</button>
                                        <br><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($brands!=null)
                                        @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{$brand->name}}</td>
                                            <td><a href="/deleteBrand/{{$brand->id}}" class="btn"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <td colspan="2">No Records Found.!</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="products-tab" role="tabpanel" aria-labelledby="product-nav">
                        <h4>Product Details</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <form action="/addProduct" method="POST">
                                    @csrf
                                    <div class="col-md-12 col-lg-12">
                                        <select class="form-control" name="category">
                                            @foreach ($categorys as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <select class="form-control" name="brand">
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <input class="form-control" type="text" name="name" required placeholder="Product Name">
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <input class="form-control" type="number" name="price" required placeholder="Product Price">
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <input class="form-control" type="text" name="desc" required placeholder="Product Description">
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <input class="form-control" type="text" name="img_url" required placeholder="Product Image url">
                                    </div>
                                    <div class="col-md-12  col-lg-12">
                                        <button type="submit" class="btn">Add New Product</button>
                                        <br><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($products!=null)
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <?php
                                                $brand_name=Brand::where('id',$product->brand)->get('name');
                                                foreach($brand_name as $bn){
                                                    $bra_name=$bn->name;
                                                }
                                            ?>
                                            <td>{{$bra_name}}</td>
                                            <?php
                                                $category_name=Category::where('id',$product->category)->get('name');
                                                foreach($category_name as $bn){
                                                    $cra_name=$bn->name;
                                                }
                                            ?>
                                            <td>{{$cra_name}}</td>
                                            <td><img src="{{$product->gallery}}" style="max-height: 75px; max-width:75px;" alt="Image"></td>
                                            <td>{{$product->description}}</td>
                                            <td>Rs. {{$product->price}}</td>
                                            <td><a href="/deleteProduct/{{$product->id}}" class="btn"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <td colspan="2">No Records Found.!</td>
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
                                        <input class="form-control" type="text" name="name" value="{{$user->name}}" required placeholder="First Name">
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
