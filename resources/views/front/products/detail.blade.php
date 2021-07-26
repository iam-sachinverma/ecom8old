@extends('layouts.front_layout.front_layout')
@section('content')

<header class="p-2 absolute-top">
	<a href="index.html" onclick="history.back()" class="btn btn-icon shadow-sm rounded-circle bg-white">
		<i class="material-icons md-arrow_back"></i>
	</a>
</header>

<main class="app-content">

<section class="gallery-wrap">
<a href="images/front_images/items/detail.jpg" data-fancybox="gallery" class="img-big-wrap"><img src="images/front_images/items/detail.jpg"></a>

<div class="px-2 mt-2 thumbs-wrap scroll-horizontal">
	  <a href="images/front_images/items/detail1.jpg" data-fancybox="gallery" class="item-thumb"> <img src="images/items/detail1.jpg"></a>
	  <a href="images/front_images/items/detail2.jpg" data-fancybox="gallery" class="item-thumb"> <img src="images/items/detail2.jpg"></a>
	  <a href="images/front_images/items/detail3.jpg" data-fancybox="gallery" class="item-thumb"> <img src="images/items/detail3.jpg"></a>
	  <a href="images/front_images/items/detail1.jpg" data-fancybox="gallery" class="item-thumb"> <img src="images/items/detail1.jpg"></a>
	  <a href="images/front_images/items/detail2.jpg" data-fancybox="gallery" class="item-thumb"> <img src="images/items/detail2.jpg"></a>
</div>
</section>

<section class="p-3">
<h6>Product name goes here</h6>	
<div class="price-wrap">
	<span class="h5 price text-warning">$129.95</span> 
</div> <!-- price-wrap.// -->

<article>
	<p>
		Great words is nothing but just sounds tovar xarakteristikasi uchun tekst shunchaki Lorem ipsum dolor sit amet 
		 <a href="15.page-detail-a.html#" class="btn-link"> Read more</a>
	</p>
	<h6 class="fw-normal text-muted">Product features</h6>
	<ul class="list-bullet">
		<li>Multiple flight modes</li>
		<li>Super fast and amazing</li>
		<li>Best battery performance</li>
		<li>5 years warranty</li>
	</ul>
</article>

<!-- comments+rating  -->
<a href="15.page-detail-a.html#" class="d-flex align-items-center border rounded p-2">
	<div class="rating-wrap">
		<ul class="rating-stars">
	        <li style="width:80%;" class="stars-active">
	             <img src="images/misc/stars-active.svg" height="16" alt="stars">
	        </li>
	        <li>
	             <img src="images/misc/stars-disable.svg" height="16" alt="stars">
	        </li>
	   </ul>
	   <span class="label-rating text-muted">9/10</span>
	</div> <!-- rating-wrap end// -->
	<span class="ms-auto">59 comment <i class="material-icons md-chevron_right"></i></span>
</a>
<!-- comments+rating  -->

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

</main>


<nav class="bar-bottom">
	<div class="flex-grow-1 me-2"> <a href="15.page-detail-a.html#" class="btn btn-primary w-100">Add to cart</a></div>
	<div> <a href="15.page-detail-a.html#" class="btn btn-light btn-icon"> <i class="material-icons md-favorite_border"></i>  </a> </div>
</nav> <!-- nav-bottom -->


@endsection