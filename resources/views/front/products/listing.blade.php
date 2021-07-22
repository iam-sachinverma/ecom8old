@extends('layouts.front_layout.front_layout')
@section('content')


<header class="app-header ondark fixed-top bg-dark text-white">
	
	<a href="javascript:history.go(-1)" class="btn-header">
		<i class="material-icons md-arrow_back"></i>
	</a>
	
	<h5 class="title-header">  {{ $categoryDetails['catDetails']['category_name'] }}  </h5>
	
	<a href="09.page-listing-e.html#" class="btn-header"> 
		<i class="material-icons md-search"></i> 
 	</a> 

</header> <!-- app-header.// -->

<main class="app-content">

<section class="px-3 pt-1 pb-2 bg-light text-dark">
	<div class="row mt-2">
		<div class="col-8">
		 <form name="sortProducts" id="sortProducts">
			<input type="hidden" name="url" id="url" value="{{ $url }}">
			<select name="sort" id="sort" class="form-select form-select-sm btn-white text-dark border-0">
				<option value="">Sort by</option>
				<option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort']=="product_latest") selected="" @endif>Lastest Product</option>
				<option value="price_lowest" @if(isset($_GET['sort']) && $_GET['sort']=="price_lowest") selected="" @endif>Price - Low to High</option>
				<option value="price_highest" @if(isset($_GET['sort']) && $_GET['sort']=="price_highest") selected="" @endif>Price - High to Low</option>
				<option value="product_name_a_z" @if(isset($_GET['sort']) && $_GET['sort']=="product_name_a_z") selected="" @endif>Product Name - A to z</option>
				<option value="product_name_z_a" @if(isset($_GET['sort']) && $_GET['sort']=="product_name_z_a") selected="" @endif>Product Name - Z to A</option>
			</select>
		 </form>		
		</div>

		<div class="col-4">
			<button type="button" data-bs-target="#offcanvas_filter" data-bs-toggle="offcanvas" class="btn w-100 btn-sm text-start border-0" style="background-color: white"> 
				Show filter
			</button>
		</div>
	</div>
</section>

<!-- <section class="gallery-wrap" id="subcat">
	<div class="px-2 mt-2 thumbs-wrap scroll-horizontal">
		<a href="#"> 
			<div class="card text-center text-dark item-subcat">
				<div class="card-body">
					<p class="card-text">    </p>
				</div>
			</div>
		</a>
	</div>
</section>-->

<section class="filter_products">
	@include('front.products.ajax_products_listing') 
</section>


<div class="pagination d-flex justify-content-center">
	@if(isset($_GET['sort']) && !empty($_GET['sort'] ))
	 {{ $categoryProducts->appends(['sort' => $_GET['sort'] ]); }}
	@else
	 {{ $categoryProducts->links() }}
    @endif
</div>


</main> <!-- app-content.// -->

<aside class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas_filter">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Filter by</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <article class="offcanvas-body">
    
    <label class="form-check mb-2">
        <input class="form-check-input" type="checkbox">
        <div class="form-check-label">All sizes</div>
    </label>
    <label class="form-check mb-2">
        <input class="form-check-input" type="checkbox">
        <div class="form-check-label">Large size</div>
    </label>
    <label class="form-check mb-2">
        <input class="form-check-input" type="checkbox">
        <div class="form-check-label">Medium size</div>
    </label>
    <label class="form-check mb-2">
        <input class="form-check-input" type="checkbox">
        <div class="form-check-label">Small size</div>
    </label>
    
    <hr>

    <label class="form-check mb-2">
        <input class="form-check-input" name="filter123" type="radio">
        <div class="form-check-label">Cheapest</div>
    </label>
    <label class="form-check mb-2">
        <input class="form-check-input" name="filter123" type="radio">
        <div class="form-check-label">Best match</div>
    </label>
    <label class="form-check mb-2">
        <input class="form-check-input" name="filter123" type="radio">
        <div class="form-check-label">Best rated</div>
    </label>
    <label class="form-check mb-2">
        <input class="form-check-input" name="filter123" type="radio">
        <div class="form-check-label">Newest</div>
    </label>
    <hr>

    <button type="button" class="btn btn-light w-100" data-bs-dismiss="offcanvas">Apply filter</button>

  </article> <!-- offcanvas-body .// -->
</aside> <!-- offcanvas.// -->


@endsection