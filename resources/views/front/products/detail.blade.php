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
		<div class="Detailbrand">
			<span class="brand badge bg-info bg-gradient mb-1 rounded-0">{{ $productDetails['brand']['name'] }}</span>
		</div>
		<div class="Detailname">
			<h1 class="fs-5 fw-normal">{{ $productDetails['product_name'] }}</h1>	
		</div>
		<div class="price-wrap">
			<span class="h6 getAttrPrice">MRP:&nbsp;&nbsp;Rs {{ $productDetails['product_price'] }}</span> 
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

	<section class="productDetailattributes mx-2 mt-2">
		<select name="size" id="getPrice" product-id="{{ $productDetails['id'] }}" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
			<option selected>Pack Sizes</option>
			@foreach( $productDetails['attributes'] as $attribute)
				<option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
			@endforeach
		</select>  
	</section>

    <hr class="divider">

	<div class="detailDeliveryTime text-start">
		<img src="{{ asset('images/front_images/truck.png') }}"><h3 class="px-3 fw-normal my-2" style="font-size: 13px;">Standard : &nbsp;Today&nbsp;&nbsp;9:00AM - 11:00AM</h3>
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
	<section>
		<h5 class="title-section">Similar items</h5>
		<div class="p-3 scroll-horizontal">
			<div class="item">
				<a href="15.page-detail-a.html#" class="product">
					<div class="img-wrap"> <img src="images/items/1.jpg"> </div>
					<div class="text-wrap">
						<div class="price">$13.90</div> <!-- price .// -->
						<p class="title">Great item name</p>
					</div>
				</a>
			</div>
			<div class="item">
				<a href="15.page-detail-a.html#" class="product">
					<div class="img-wrap"> <img src="images/items/2.jpg"> </div>
					<div class="text-wrap">
						<div class="price">$90.80</div> <!-- price .// -->
						<p class="title">Product name</p>
					</div>
				</a>
			</div>
			<div class="item">
				<a href="15.page-detail-a.html#" class="product">
					<div class="img-wrap"> <img src="images/items/3.jpg"> </div>
					<div class="text-wrap">
						<div class="price">$63.00</div> <!-- price .// -->
						<p class="title">Great item name</p>
					</div>
				</a>
			</div>
			<div class="item">
				<a href="15.page-detail-a.html#" class="product">
					<div class="img-wrap"> <img src="images/items/4.jpg"> </div>
					<div class="text-wrap">
						<div class="price">$9.50</div> <!-- price .// -->
						<p class="title">Product name</p>
					</div>
				</a>
			</div>
			<div class="item">
				<a href="15.page-detail-a.html#" class="product">
					<div class="img-wrap"> <img src="images/items/5.jpg"> </div>
					<div class="text-wrap">
						<div class="price">$63.00</div> <!-- price .// -->
						<p class="title">Great item name</p>
					</div>
				</a>
			</div>
			<div class="item">
				<a href="15.page-detail-a.html#" class="product">
					<div class="img-wrap"> <img src="images/items/6.jpg"> </div>
					<div class="text-wrap">
						<div class="price">$63.00</div> <!-- price .// -->
						<p class="title">Product name</p>
					</div>
				</a>
			</div>
			<div class="item">
				<a href="15.page-detail-a.html#" class="product">
					<div class="img-wrap"> <img src="images/items/7.jpg"> </div>
					<div class="text-wrap">
						<div class="price">$63.00</div> <!-- price .// -->
						<p class="title">Great item name</p>
					</div>
				</a>
			</div>
		</div>  <!-- scroll-horizontal.// -->
	</section>
	<hr class="divider">

</main>


<nav class="bar-bottom">
	<div class="flex-grow-1 me-2"> <a href="#" class="btn btn-primary">Add to cart</a></div>
	<div> <a href="15.page-detail-a.html#" class="btn btn-light btn-icon"> <i class="material-icons md-favorite_border"></i>  </a> </div>
</nav> <!-- nav-bottom -->


@endsection