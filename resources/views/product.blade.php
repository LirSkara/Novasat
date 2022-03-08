@extends('layout')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Single Product</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index.html">Shop</a></li>
                    <li>Single Product</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Start Item Details -->
<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <main id="gallery">
                            <div class="main-img">
                                <img src="assets/images/product-details/01.jpg" id="current" alt="#">
                            </div>
                            <div class="images">
                                <img src="assets/images/product-details/01.jpg" class="img" alt="#">
                                <img src="assets/images/product-details/02.jpg" class="img" alt="#">
                                <img src="assets/images/product-details/03.jpg" class="img" alt="#">
                                <img src="assets/images/product-details/04.jpg" class="img" alt="#">
                                <img src="assets/images/product-details/05.jpg" class="img" alt="#">
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">GoPro Karma Camera Drone</h2>
                        <p class="category"><i class="lni lni-tag"></i> Drones:<a href="javascript:void(0)">Action
                                cameras</a></p>
                        <h3 class="price">$850<span>$945</span></h3>
                        <p class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group color-option">
                                    <label class="title-label" for="size">Choose color</label>
                                    <div class="single-checkbox checkbox-style-1">
                                        <input type="checkbox" id="checkbox-1" checked="">
                                        <label for="checkbox-1"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-2">
                                        <input type="checkbox" id="checkbox-2">
                                        <label for="checkbox-2"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-3">
                                        <input type="checkbox" id="checkbox-3">
                                        <label for="checkbox-3"><span></span></label>
                                    </div>
                                    <div class="single-checkbox checkbox-style-4">
                                        <input type="checkbox" id="checkbox-4">
                                        <label for="checkbox-4"><span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label for="color">Battery capacity</label>
                                    <select class="form-control" id="color">
                                        <option>5100 mAh</option>
                                        <option>6200 mAh</option>
                                        <option>8000 mAh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group quantity">
                                    <label for="color">Quantity</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="button cart-button">
                                        <button class="btn" style="width: 100%;">Add to Cart</button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="wish-button">
                                        <button class="btn"><i class="lni lni-reload"></i> Compare</button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="wish-button">
                                        <button class="btn"><i class="lni lni-heart"></i> To Wishlist</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- End Item Details -->
@endsection