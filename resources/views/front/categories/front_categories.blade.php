
<?php 
use App\Models\Category;
$categories = Category::categories();
/*echo "<pre>"; print_r($categories); die;*/
?>

<section class="p-3">
    <ul class="row">
        @foreach($categories as $category)
        <li class="col-4">
            <div class="item-category-grid">
                <span class="icon-wrap"> 
                    @if(!empty($category['category_image']))
                   <a href="{{ $category['url'] }}"> <img class="icon mb-1" src="{{ asset('images/category_images/'.$category['category_image']) }}" alt=""> </a>
                    @else
                    <img class="icon mb-1" src="{{ asset('images/category_images/dummy.png') }}"  alt="">
                    @endif 
                </span>
                <small class="text"> {{ $category['category_name'] }}</small>
            </div>
        </li>
        @endforeach
    </ul>
</section>