@extends('layouts.front_layout.front_layout')
@section('content')

<main class="app-content">

    <section class="px-3 pt-1">
        <input type="text" placeholder="Search" class="form-control bg-light">
    </section>

    <!-- Catgeories  -->
    @include('front.categories.front_categories')

    <!-- Home page banner  -->
    @if(isset($page_name) && $page_name=="index")
     @include('front.banners.home_page_banners')
    @endif

    <!-- Featured Product -->
    <section>
        <h5 class="title-section">Featured Product</h5>       
        <div class="p-3 pb-0 scroll-horizontal">
            @foreach($featuredItems as $item)
            <div class="item"> 
                <div href="#" class="product">
                    
                    <a href="{{ url('product/'.$item['id']) }}" class="img-wrap rounded-0">
                        @if(isset($item['main_image']))
                         <?php $product_image_path = 'images/product_images/small/'.$item['main_image']; ?>
                        @else
                         <?php $product_image_path = ''; ?>
                        @endif
                        @if(!empty($item['main_image']) && file_exists($product_image_path))
                         <img src="{{ asset($product_image_path) }}" alt="">
                        @else
                         <img src="{{ asset('images/product_images/small/no-image.png') }}" alt="">
                        @endif 
                    </a>	
                    
                    <div class="p-2 text-wrap" style="border: 1px solid #eee; border-top: none;">
                        
                        <p class="title brand my-1" style="font-weight: 450;font-size: 13px;">{{ $item['brand']['name'] }}</p>
                        <a href="{{ url('product/'.$item['id']) }}"><p class="title">{{ $item['product_name'] }}</p></a>
                        
                        <div class="price my-2" style="font-weight: 550; font-size: 15px;">Rs {{ $item['product_price'] }}</div> <!-- price .// -->
                    
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-sm my-2" type="button">Cart</button>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div> 
    </section>
    
    <!-- Lastest Product  --> 
    <section>
        <h5 class="title-section">New arrival</h5>
        <div class="p-3 scroll-horizontal">
            @foreach($newProducts as $product)
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
                        <a href="{{ url('product/'.$product['id']) }}"><p class="title">{{ $product['product_name'] }}</p></a>
                        
                        <div class="price my-2" style="font-weight: 550; font-size: 15px;">Rs {{ $product['product_price'] }}</div> <!-- price .// -->
                    
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-sm my-2" type="button">Cart</button>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div> 
    </section>
    
    <hr class="divider" size="10">
    
    <section class="p-3">
        
        <a href="02.page-index-b.html#" class="box bg-primary m-1">
            <div class="icontext">
                <span class="icon"><img src="images/front_images/avatars/1.jpg" class="avatar-sm"></span>
                <span class="text">
                    <h6 class="mb-0 text-white">Support chat</h6>
                    <small class="text-white-50">Landline: +123456789</small>
                </span>
            </div>
        </a>
    
        <div class="d-flex">
            <a href="02.page-index-b.html#" class="m-1 btn w-100 btn-sm btn-light"> Help </a>  
            <a href="02.page-index-b.html#" class="m-1 btn w-100 btn-sm btn-light"> Payment </a>  
            <a href="02.page-index-b.html#" class="m-1 btn w-100 btn-sm btn-light"> About </a> 
        </div>
        
    </section>
    
    <p class="text-center mx-3">
        <a href="index.html" class="btn w-100 btn-light"> 
            <i class="material-icons md-arrow_back"></i> 
             All pages 
        </a> 
    </p>

    <br>
    
</main> <!-- app-content -->

@endsection