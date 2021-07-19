
<?php 
use App\Models\Category;
$categories = Category::categories();
/*echo "<pre>"; print_r($categories); die;*/
?>

<section class="p-3">
    <ul class="row">
        @foreach($categories as $category)
        <li class="col-4">
            <a href="02.page-index-b.html#" class="item-category-grid">
                <span class="icon-wrap"> 
                    @if(!empty($category['category_image']))
                    <img class="icon mb-1" src="{{ asset('images/category_images/'.$category['category_image']) }}" alt="">
                    @else
                    <img class="icon mb-1" src="{{ asset('images/category_images/dummy.png') }}"  alt="">
                    @endif 
                </span>
                <small class="text"> {{ $category['category_name'] }}</small>
            </a>
        </li>
        @endforeach
    </ul>
</section>