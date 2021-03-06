<?php use App\Models\Product; ?>
@extends('layouts.front_layout.front_layout')
@section('content')

<header class="app-header ondark fixed-top shadow-sm p-2 mb-5 bg-body"><!--  Remove dark text in i tag  -->
  
	<a href="index.html" onclick="history.back()" class="btn-header">
	  <i class="material-icons md-arrow_back text-dark"></i>
	</a>

	<a href="02.page-index-b.html#offcanvas_left_123" data-bs-toggle="offcanvas" role="button" class="btn-header">
		<i class="material-icons md-menu text-dark"></i>
	</a>
	
	<h5 class="title-header text-center text-dark">  Details  </h5>
	
	<a href="#" class="btn-header"> 
		<i class="material-icons md-search text-dark"></i> 
	</a>

	<a href="#" class="btn-header"> 
		<i class="material-icons md-share text-dark"></i> 
	</a>

	<a href="#" class="btn-header"> 
	  <i class="material-icons md-shopping_cart text-dark"></i> 
	</a> 

</header> <!-- app-header.// -->

<main class="app-content mt-2">

	<section class="px-2 mb-2">
		@if(Session::has('error_message'))
            <div class="alert alert-warning alert-dismissible rounded-0" style="margin-top: 10px;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ Session::get('error_message')}}</strong>
            </div>
        @endif

        @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible rounded-0" style="margin-top: 10px;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ Session::get('success_message')}}</strong>
            </div>
        @endif
		
		<div class="Detailbrand">
			<span class="brand badge bg-info bg-gradient mb-1 rounded-0">{{ $productDetails['brand']['name'] }}</span>
		</div>
		<div class="Detailname">
			<h1 class="fs-5 fw-normal">{{ $productDetails['product_name'] }}</h1>	
		</div>
		<div class="price-wrap">
			<?php $discounted_price = Product::getDiscountedPrice($productDetails['id']); ?>
			<span class="h6 getAttrPrice">
            @if($discounted_price>0)  
				Rs.&nbsp;{{ $discounted_price }}&nbsp;&nbsp; <span style="font-size: 0.875em;">MRP:</span>&nbsp;<del style="font-size: 0.875em;">Rs {{ $productDetails['product_price'] }}</del>
			@else	
				MRP:&nbsp;&nbsp;Rs {{ $productDetails['product_price'] }}
			@endif	
			</span> 
			<span class="h6 discount">&nbsp;&nbsp;<code>{{ $productDetails['product_discount'] }}%&nbsp;Off</code></span>
			<br><small id="main_image" class="form-text text-muted" style="font-size: 10px;">
				(Inclusive of all taxes)
			</small>
		</div> <!-- price-wrap.// -->
	</section>
	
	<section class="gallery-wrap">
		<div class="main_image px-1">
		 <a href="{{ asset('images/product_images/large/'.$productDetails['main_image']) }}" data-fancybox="gallery" class="img-big-wrap"><img src="{{ asset('images/product_images/large/'.$productDetails['main_image']) }}"></a>
	    </div>
		<div class="px-2 mt-2 thumbs-wrap scroll-horizontal text-center">
			@foreach($productDetails['images'] as $image)
			  <a href="{{ asset('images/product_images/large/'.$image['image']) }}" data-fancybox="gallery" class="item-thumb"> <img src="{{ asset('images/product_images/small/'.$image['image']) }}"></a>
			@endforeach
		</div>
	</section>

	<section class="detailAttr mx-3 mt-2">
		<h6>Pack Sizes</h6>
		<form action="{{ url('add-to-cart') }}" method="post" id="addCart">@csrf
			<input type="hidden" name="product_id" id="product_id" value="{{ $productDetails['id'] }}">
				<select name="size" id="getPrice" product-id="{{ $productDetails['id'] }}" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required="">
					@foreach( $productDetails['attributes'] as $attribute)
						<option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}&nbsp;-&nbsp; ??? {{ $attribute['price'] }}</option>
					@endforeach
				</select>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">QTY</span>
				<input type="number" name="quantity" class="form-control" placeholder="Quantity" aria-label="Username" aria-describedby="basic-addon1" required="">
			</div>
		</form>
	</section>

    <hr class="divider">

	<div class="detailDeliveryTime text-start px-3 my-1">
		<img src="{{ asset('images/front_images/fast-delivery.png') }}">&nbsp;&nbsp;&nbsp;<span class="fw-normal" style="font-size: 13px;">Standard : &nbsp;Today&nbsp;&nbsp;9:00AM - 11:00AM</span>
	</div>

	<hr class="divider">

	<section class="productAbout">
		<div class="product_name px-3 mt-2">
			<h1 class="fs-4 fw-normal text-start">{{ $productDetails['product_name'] }}</h1>
		</div>
		<hr>
		<div class="accordion accordion-flush" id="accordionAboutProduct">
			<div class="accordion-item">
			  <h2 class="accordion-header" id="aboutTheProduct">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
				  About The Product
				</button>
			  </h2>
			  <div id="flush-collapseOne" class="accordion-collapse collapse-show" aria-labelledby="aboutTheProduct" data-bs-parent="#accordionAboutProduct">
				<div class="accordion-body"><code>.accordion-flush</code>
				 {{ $productDetails['description'] }}
				</div>
			  </div>
			</div>
			<div class="accordion-item">
			  <h2 class="accordion-header" id="productIngredients">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
				  Ingredients
				</button>
			  </h2>
			  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="productIngredients" data-bs-parent="#accordionAboutProduct">
				<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
			  </div>
			</div>
			<div class="accordion-item">
			  <h2 class="accordion-header" id="productHowToUse">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
				  How To Use
				</button>
			  </h2>
			  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="productHowToUse" data-bs-parent="#accordionAboutProduct">
				<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
			  </div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="productOtherInfo">
				  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
					Other Product Info
				  </button>
				</h2>
				<div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="productOtherInfo" data-bs-parent="#accordionAboutProduct">
				  <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
				</div>
			</div>
		</div>
	</section>

	<hr class="divider">

	<section class="similarProduct">
		<h5 class="title-section">Similar Products</h5>
		<div class="p-3 scroll-horizontal">
			@foreach($relatedProducts as $product)
				<div class="item">
					<div href="#" class="product">
						<a href="{{ url('product/'.$product['id']) }}" class="img-wrap rounded-0">
							@if(isset($product['main_image']))
							 <?php $product_image_path = 'images/product_images/small/'.$product['main_image']; ?>
							@else
							 <?php $product_image_path = ''; ?>
							@endif
							@if(!empty($product['main_image']) && file_exists($product_image_path))
							 <img src="{{ asset($product_image_path) }}" alt="">
							@else
							 <img src="{{ asset('images/product_images/small/no-image.png') }}" alt="">
							@endif 
						</a>	
						<div class="p-2 text-wrap" style="border: 1px solid #eee; border-top: none;">
							
							<p class="title brand my-1" style="font-weight: 450;font-size: 13px;">{{ $product['brand']['name'] }}</p>
							<p class="title" style="font-weight: 410; font-size: 16px;">{{ $product['product_name'] }}</p>
							
							<div class="price my-2" style="font-weight: 550; font-size: 15px;">Rs {{ $product['product_price'] }}</div> <!-- price .// -->
						
							<div class="d-grid gap-2">
								<button class="btn btn-primary btn-sm my-2" type="button">Cart</button>
							</div>

						</div>
					</div>
				</div>
			@endforeach
		</div>  <!-- scroll-horizontal.// -->
	</section>

	<hr class="divider">

	<section class="otherDetailInfo">
		<h5 class="title-section">More Information</h5>
		<hr>
		<div class="info mb-4" style="border-bottom: 1px solid #eee">	
			<nav style="--bs-breadcrumb-divider: '>'; margin-left: 1.3rem; " aria-label="breadcrumb">
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
				  <li class="breadcrumb-item"><a href="{{ url('/'.$productDetails['category']['url']) }}">{{ $productDetails['category']['category_name'] }}</a></li>
				  <li class="breadcrumb-item active" aria-current="page">{{ $productDetails['product_name'] }}</li>
				</ol>
			</nav>
		</div>	
	</section>

</main>


<nav class="bar-bottom">
	<div class="flex-grow-1 me-2"> <button class="btn btn-primary" form="addCart">Add to cart</button></div>
	<div> <a href="15.page-detail-a.html#" class="btn btn-light btn-icon"> <i class="material-icons md-favorite_border"></i>  </a> </div>
</nav> <!-- nav-bottom -->


@endsection