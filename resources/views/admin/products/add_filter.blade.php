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
              <li class="breadcrumb-item active">Products Filters</li>
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

        @if(Session::has('error_message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 10px;">
              {{ Session::get('error_message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif

        <form name="addFilterForm" id="addFilterForm" method="post" action="{{ url('admin/add-filters/'.$productdata['id']) }}">@csrf
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
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label for="product_code">Product Code:</label>&nbsp;&nbsp; {{ $productdata['product_code'] }}
                </div>

                <div class="form-group">
                  <label for="product_name">Product Name:</label>&nbsp;&nbsp; {{ $productdata['product_name'] }}
                </div>
 
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <img class="img-fluid img-thumbnail" style="width:140px; max-height:120px; float:right; margin-right:3em;" src="{{ asset('images/product_images/small/'.$productdata['main_image']) }}">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form_wrapper">
                  <div>
                      <input id="size" type="text" name="size[]" value="" placeholder="Size" style="width:  120px;" required=""/>
                      <input id="unit" type="text" name="unit[]" value="" placeholder="Unit" style="width:  120px;" required=""/>
                      <input id="sku" type="text" name="sku[]" value="" placeholder="SKU" style="width:  120px;" required=""/>
                      <input id="stock" type="number" name="stock[]" value="" placeholder="Stock" style="width:  120px;" required=""/>
                      <input id="price" type="text" name="price[]" value="" placeholder="Price" style="width:  120px; ; margin-top:5px;" required=""/>
                      <input id="size" type="text" name="size[]" value="" placeholder="Size" style="width:  120px;" required=""/>
                      <input id="unit" type="text" name="unit[]" value="" placeholder="Unit" style="width:  120px;" required=""/>
                      <input id="sku" type="text" name="sku[]" value="" placeholder="SKU" style="width:  120px;" required=""/>
                      <input id="stock" type="number" name="stock[]" value="" placeholder="Stock" style="width:  120px;" required=""/>
                      <input id="price" type="text" name="price[]" value="" placeholder="Price" style="width:  120px; ; margin-top:5px;" required=""/>
                      <a href="javascript:void(0);" class="add_field" title="Add field">&nbsp;&nbsp;<b>Add</b></a>
                  </div>
              </div>
              </div>
            </div>
          </div><!-- Card-Body -->
          <div class="card-footer">
           <button type="submit" class="btn btn-success">Add Filters</button>
          </div>
        </form>

      </div><!-- /.container-fluid -->

     <form name="editAttributeForm" id="editAttributeForm" method="post" action={{ url('admin/edit-attributes/'.$productdata['id']) }}>@csrf
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products  Attributes</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="products" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>SIZE</th>
              <th>SKU</th>
              <th>PRICE</th>
              <th>STOCK</th>
              <th>UNIT</th>
              <th>ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productdata['attributes'] as $attribute) 
            <input style="display: none;" type="text" name="attrId[]" value="{{ $attribute['id'] }}">
              <tr>
                  <td>{{ $attribute['id'] }}</td>
                  <td>{{ $attribute['size'] }}</td>
                  <td>{{ $attribute['sku'] }}</td>
                  <td>
                   <input type="text" name="price[]" value="{{ $attribute['price'] }}" required="">
                  </td>
                  <td>
                   <input type="text" name="stock[]" value="{{ $attribute['stock'] }}" required="">
                  </td>
                  <td>{{ $attribute['unit'] }}</td>
                  <td>
                    @if( $attribute['status'] == 1 )
                    <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)">
                      <i class="fas fa-toggle-on fa-lg" aria-hidden="true" status="Active"></i></a>
                    @else
                    <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)">
                      <i class="fas fa-toggle-off fa-lg" aria-hidden="true" status="Inactive"></i></a>  
                    @endif 
                    &nbsp; &nbsp;
                    <a title="Attribute Product" href="javascript:void(0)" class="confirmDelete" record="attribute" recordid="{{ $attribute['id'] }}"><i class="fas fa-trash-alt"></i></a>
                  </td>
               </tr>
            @endforeach  
            </tbody>  
          </table>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Update Attribute</button>
        </div>
        <!-- /.card-body -->
      </div>
     </form>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection