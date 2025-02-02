<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    
    <link rel="stylesheet" href="{{asset('dashboard/assets')}}/css/style.css">
    <link rel="shortcut icon" href="{{asset('dashboard/assets')}}/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="{{asset('dashboard/assets')}}/images/logo.svg" alt="logo">
                </div>
                <h4>Register</h4>
                <form method="POST" action="/admin/registerUser" class="pt-3">
                    @csrf
                  <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  
                  <div class="mt-3 d-grid gap-2">
                    <input type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" id="exampleInputPassword1">
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('dashboard/assets')}}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('dashboard/assets')}}/js/off-canvas.js"></script>
    <script src="{{asset('dashboard/assets')}}/js/template.js"></script>
    <script src="{{asset('dashboard/assets')}}/js/settings.js"></script>
    <script src="{{asset('dashboard/assets')}}/js/hoverable-collapse.js"></script>
    <script src="{{asset('dashboard/assets')}}/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>