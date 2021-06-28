@extends('layouts.admin_layout.admin_layout')
@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       @if ($errors->any())
        <div class="alert alert-danger" style="margin-top:10px;">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
       @endif
        @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
              {{ Session::get('success_message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif

        <form name="productForm" id="productForm" @if(empty($productdata['id'])) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product/'.$productdata['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
         <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row"><!-- /.Row 1 -->

              <div class="col-md-6"><!-- Column 1 -->
                <div class="form-group">
                  <label>Select Category</label>
                  <select  name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                    <option value="">Select</option>
                      @foreach($categories as $section)
                        <optgroup label="{{ $section['name'] }}"></optgroup>
                        @foreach($section['categories'] as $category)
                         <option value="{{ $category['id'] }}" 
                         @if(!empty(@old('category_id')) && 
                          $category['id']==@old('category_id')) selected="" 
                         @elseif(!empty($productdata['category_id']) &&
                          $productdata['category_id']==$category['id'])  selected="" @endif>&nbsp;&nbsp;&nbsp;{{ $category['category_name']}}</option>
                         @foreach($category['subcategories'] as $subcategory)
                          <option value="{{ $subcategory['id'] }}"
                          @if(!empty(@old('category_id')) && 
                           $subcategory['id']==@old('category_id')) selected="" 
                          @elseif(!empty($productdata['category_id']) &&
                           $productdata['category_id']==$subcategory['id'])  selected="" @endif >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;
                           {{ $subcategory['category_name']}}</option>
                         @endforeach
                        @endforeach
                      @endforeach  
                  </select>
                </div> 
                <div class="form-group">
                  <label for="product_name">Product Name</label>
                  <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter product Name"
                   @if(!empty($productdata['product_name'])) value="{{ $productdata['product_name'] }}"
                   @else value="{{ old('product_name') }}" @endif>
                </div>
                <div class="form-group">
                  <label for="product_price">Product Price</label>
                  <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter product price"
                   @if(!empty($productdata['product_price'])) value="{{ $productdata['product_price'] }}"
                   @else value="{{ old('product_price') }}" @endif>
                </div>  
              </div><!-- Column 1 -->

              <div class="col-md-6"><!--Column 2 -->
                <div class="form-group">
                  <label for="">Select Brand</label>
                  <select name="brand_id" id="brand_id" class="form-control select2" style="width:100%;">
                    <option value="">Select</option>
                    @foreach($brands as $brand)
                      <option value={{ $brand['id'] }} 
                      @if(!empty(@old('brand_id')) && 
                        $brand['id']==@old('brand_id')) selected=""
                      @elseif(!empty($productdata['brand_id']) && $productdata['brand_id']==$brand['id']) 
                      selected="" 
                      @endif>{{ $brand['name'] }}</option>
                    @endforeach  
                  </select>
                </div> 


                <div class="form-group">
                  <label for="product_code">Product code</label>
                  <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Enter product code"
                   @if(!empty($productdata['product_code'])) value="{{ $productdata['product_code'] }}"
                   @else value="{{ old('product_code') }}" @endif>
                </div>
                <div class="form-group">
                  <label for="product_discount">Product Discount (%)</label>
                  <input type="text" class="form-control" name="product_discount" id="product_discount" placeholder="Enter product discount"
                   @if(!empty($productdata['product_discount'])) value="{{ $productdata['product_discount'] }}"
                   @else value="{{ old('product_discount') }}" @endif>
                </div>            
              </div><!--Column 2 -->

            </div><!-- /.Row 1 -->

            <div class="row"><!-- /.Row 2 -->

              <div class="col-12 col-sm-6"><!--Column 3 -->

                <div class="form-group">
                  <label for="main_image">Product Main Image</label>
                  <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="main_image" name="main_image">
                        <label class="custom-file-label" for="main_image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>   
                    </div>
                     Recommended Image Size: Width:1040px, Height:1200px
                     @if(!empty($productdata['main_image']))
                     <div><img style="width:80px; margin-top:9px;" src="{{ asset('images/product_images/small/'.$productdata['main_image']) }}">
                     &nbsp;<a class="confirmDelete" href="javascript:void(0)" record="product-image" recordid="{{ $productdata['id'] }}">Delete Image</a>
                     </div>
                     @endif
                </div>
                
                <div class="form-group">
                  <label for="description">Product Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter ...">@if(!empty($productdata['description'])) {{ $productdata['description'] }} @else {{ old('description') }} @endif
                  </textarea>
                </div>
    
              </div><!--Column 3 -->
          
              <div class="col-12 col-sm-6"><!--Column 4 -->
                <div class="form-group">
                  <label for="product_video">Product video</label>
                  <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="product_video" name="product_video">
                        <label class="custom-file-label" for="product_video">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div> 
                    </div>
                    @if(!empty($productdata['product_video']))
                    <div><br><a href="{{ url('videos/product_videos/'.$productdata['product_video']) }}" download>Download</a> &nbsp;|
                      &nbsp;<a class="confirmDelete" href="javascript:void(0)" record="product-video" recordid="{{ $productdata['id'] }}">Delete Video</a>
                    </div>
                   @endif
                </div>
                <div class="form-group">
                  <label for="meta_title">Meta Title</label><textarea class="form-control" name="meta_title" id="meta_title" rows="3" placeholder="Enter ...">@if(!empty($productdata['meta_title'])) {{ $productdata['meta_title'] }} @else {{ old('meta_title') }} @endif</textarea>
                </div>
              </div><!--Column 4 -->

              <div class="col-12 col-sm-6"><!--Column 5 -->
                <div class="form-group">
                  <label for="meta_description">Meta Description</label><textarea class="form-control" name="meta_description" id="meta_description" rows="3" placeholder="Enter ...">@if(!empty($productdata['meta_description'])) {{ $productdata['meta_description'] }} @else {{ old('meta_description') }} @endif</textarea>
                </div>
              </div><!--Column 5 -->

              <div class="col-12 col-sm-6"><!--Column 6 -->
                <div class="form-group">
                  <label for="meta_keywords">Meta Keywords</label>
                  <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="3" placeholder="Enter ...">@if(!empty($productdata['meta_keywords'])) {{ $productdata['meta_keywords'] }}@else {{ old('meta_keywords') }} @endif</textarea>
                </div>
                <div class="form-group">
                  <label for="meta_keywords">Featured Items</label>
                  <input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if(!empty($productdata['is_featured']) && $productdata['is_featured']=="Yes") checked="" @endif>
                </div>
              </div><!--Column 6 -->

            </div><!-- /.Row 2 -->

            
          </div><!-- Card-Body -->
        
          <div class="card-footer">
           <button type="submit" class="btn btn-primary">Submit</button>
          </div>

        </form><!-- ProductForm -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection