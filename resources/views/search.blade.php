@include('header')
<!-- Featured Product Start -->
<div class="featured-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Searched Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            @foreach ($products as $item)
                <div class="col-lg-3 {{$item['id']==1?'active':''}}">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="productdetail/{{$item['id']}}">{{$item['name']}}</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="productdetail/{{$item['id']}}">
                                <img src="{{$item['gallery']}}" class="img-responsive slider-img" alt="Product Image">
                            </a>

                        </div>
                        <div class="product-price">
                            <h3><span>Rs. </span>{{$item['price']}}</h3>
                            <form action="/add_to_cart" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$item['id']}}"/>
                                <button class="btn"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Featured Product End -->
@include('footer')
