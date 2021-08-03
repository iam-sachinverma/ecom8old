<?php use App\Models\Cart; ?>
@extends('layouts.front_layout.front_layout')
@section('content')

<main class="app-content">

    <section class="p-3">
       <?php  $total_price = 0; ?>
       @foreach($userCartItems as $item)
        <?php $attrPrice = Cart::getProductAttrPrice($item['product_id'],$item['size']); ?>
        <?php $total_price = $total_price + ($attrPrice * $item['quantity']); ?>
        <hr>
            <article class="item-cart">

                <figure class="itemside mb-3">
                    <div class="aside"><img src="{{ asset('images/product_images/small/'.$item['product']['main_image']) }}" class="rounded border img-md"></div>
                    <figcaption class="info">
                        <a href="19.page-cart-a.html#" class="title text-truncate">{{ $item['product']['product_name'] }} ( {{ $item['product']['product_code'] }} )</a>
                        <small class="text-muted"> 
                            Pack Size: {{ $item['size'] }}   <br> 
                            Rs. {{ $attrPrice }} /per item
                        </small>
                    </figcaption>
                </figure>
        
                <div class="row align-items-center">
                    <div class="col-auto"> <a href="19.page-cart-a.html#" class="btn btn-sm btn-outline-danger"> Remove </a> </div>
                    <div class="col">
                        <div class="input-group input-group-sm input-spinner">
                            <button class="btn btn-light" type="button"> <i class="material-icons md-minus"></i> </button>
                            <input type="text" class="form-control" value="1">
                            <button class="btn btn-light" type="button"> <i class="material-icons md-plus"></i> </button>
                        </div> <!-- input-group.// -->
                    </div>
                    <div class="col"> <var class="float-end price">{{ $item['quantity'] }}x = Rs. {{ ($attrPrice * $item['quantity']) }} </var></div>
                </div>
            </article> <!-- item-cart.// -->
            
       @endforeach 
    
        <hr>
    </section> <!-- section-products  .// -->
    
    <hr class="divider">
    
    <section class="padding-around">
        
        <dl class="dlist-align">
            <dt class="text-muted">Total price:</dt>
            <dd class="text-end">Rs. {{ $total_price }}</dd>
        </dl>
        <dl class="dlist-align">
            <dt class="text-muted">Shipping:</dt>
            <dd class="text-end">Rs. 10.00</dd>
        </dl>
        <dl class="dlist-align">
            <dt class="text-muted"><strong>Total:</strong></dt>
            <dd class="text-end"><strong>Rs. {{ $total_price }}</strong></dd>
        </dl>
        <br>
        <a href="19.page-cart-a.html#" class="btn btn-primary w-100 mb-2"> Purchase </a>
    
        <a href="index.html" class="btn btn-light w-100">  Back to shop </a>
    
        <br> <br>
    
    </section>
    
</main> <!-- app-content.// --><nav class="bar-bottom">
	<div class="flex-grow-1 me-2"> <button class="btn btn-primary" form="addCart">Checkout</button></div>
	<div> <a href="15.page-detail-a.html#" class="btn btn-light btn-icon"> <i class="material-icons md-favorite_border"></i>  </a> </div>
</nav> <!-- nav-bottom -->


<nav class="bar-bottom">
	<div class="flex-grow-1 me-2"> <button class="btn btn-primary" form="addCart">Add to cart</button></div>
	<div> <a href="15.page-detail-a.html#" class="btn btn-light btn-icon"> <i class="material-icons md-favorite_border"></i>  </a> </div>
</nav> <!-- nav-bottom -->


@endsection