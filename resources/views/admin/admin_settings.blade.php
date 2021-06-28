@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Admin Details</h3>
                    </div>
              
                    <form action="{{ url('/admin/update-pwd') }}" name="updatePasswordForm" id="updatePasswordForm" method="post" role="form">@csrf 
                        <div class="card-body">

                            <div class="form-group">
                                <label for="admin_name">Admin Name</label>
                                <input type="text" id="admin_name" name="admin_name" class="form-control" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Enter Admin/SubAdmin Name">
                            </div>
                            <div class="form-group">
                                <label for="admin_email">Admin Email</label>
                                <input class="form-control" id="admin_email" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="current_pwd">Current Password</label>
                                <input type="password" class="form-control" id="current_pwd" name="current_pwd" placeholder="Enter your current password">
                                <span id="chkCurrentPwd"></span>                          
                            </div>
                            <div class="form-group">
                                <label for="new_pwd">New Password</label>
                                <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="Enter New Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_pwd">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <label for="admin_image">File input</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                </div>
                            </div>
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
       </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
@endsection