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

    <section>
        <h5 class="title-section">Recommended</h5>
        <div class="p-3 pb-0 scroll-horizontal">
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/1.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$13.90</div> <!-- price .// -->
                        <p class="title">Great item name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/2.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$90.80</div> <!-- price .// -->
                        <p class="title">Product name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/3.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$63.00</div> <!-- price .// -->
                        <p class="title">Great item name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/4.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$9.50</div> <!-- price .// -->
                        <p class="title">Product name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/5.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$63.00</div> <!-- price .// -->
                        <p class="title">Great item name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/6.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$63.00</div> <!-- price .// -->
                        <p class="title">Product name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/item.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$63.00</div> <!-- price .// -->
                        <p class="title">Great item name</p>
                    </div>
                </a>
            </div>
        </div> 
    </section>
    
    <section>
        <h5 class="title-section">New arrival</h5>
        <div class="p-3 scroll-horizontal">
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/7.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$13.90</div> <!-- price .// -->
                        <p class="title">Great item name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/6.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$90.80</div> <!-- price .// -->
                        <p class="title">Product name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/5.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$63.00</div> <!-- price .// -->
                        <p class="title">Great item name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/4.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$9.50</div> <!-- price .// -->
                        <p class="title">Product name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/3.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$63.00</div> <!-- price .// -->
                        <p class="title">Great item name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/2.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$63.00</div> <!-- price .// -->
                        <p class="title">Product name</p>
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="02.page-index-b.html#" class="product">
                    <div class="img-wrap"> <img src="images/front_images/items/1.jpg"> </div>
                    <div class="text-wrap">
                        <div class="price">$63.00</div> <!-- price .// -->
                        <p class="title">Great item name</p>
                    </div>
                </a>
            </div>
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
    
</main> <!-- app-content.// -->

@endsection