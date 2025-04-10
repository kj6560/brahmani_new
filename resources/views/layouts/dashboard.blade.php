<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{env('Company_Name')}} </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('dashboard/assets')}}/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('dashboard/assets')}}/images/favicon.png" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>

<body>
  @php
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Session;
  $success = Session::get('success');
  $error = Session::get('error');
  @endphp
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="/">
            <img src="{{asset('storage')}}/{{$settings['logo']}}" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="/">
            <img src="{{asset('brahmani_frontend_assets')}}/images/logo.png" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <!-- <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
              <h3 class="welcome-sub-text">Your performance summary this week </h3>
            </li>
          </ul> -->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="icon-mail icon-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
              aria-labelledby="countDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 fw-medium float-start">You have 7 unread mails </p>
                <span class="badge badge-pill badge-primary float-end">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="{{asset('dashboard/assets')}}/images/faces/face10.jpg" alt="image"
                    class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis fw-medium text-dark">Marian Garner </p>
                  <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="{{asset('dashboard/assets')}}/images/faces/face12.jpg" alt="image"
                    class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis fw-medium text-dark">David Grey </p>
                  <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="{{asset('dashboard/assets')}}/images/faces/face1.jpg" alt="image"
                    class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis fw-medium text-dark">Travis Jenkins </p>
                  <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                </div>
              </a>
            </div>
          </li> -->
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="{{asset('dashboard/assets')}}/images/faces/face8.jpg"
                alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="{{asset('dashboard/assets')}}/images/faces/face8.jpg"
                  alt="Profile image">
                <p class="mb-1 mt-3 fw-semibold">{{Auth::user()->name ?? "Not Available"}}</p>
                <p class="fw-light text-muted mb-0">{{Auth::user()->email ?? "Not Available"}}</p>
              </div>
              <a class="dropdown-item" href="/logout"><i
                  class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>({{Auth::user()->name}})Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
              aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/createSiteSettings">General Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/categories">Page Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/blogSettings">Blog Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/products">Product
                    Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/enquiries">Enquiries
                    Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/emailSettings">Email
                    Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/visitorTrace">Visitor Trace</a></li>

              </ul>
            </div>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">{{$settings['Company_Name']??""}} </span>
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © {{date('Y')}}. All rights
              reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <!-- Include jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include Select2 JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>


  <!-- Add DataTables JS and buttons extension -->
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
<script>
  var success = "{{!empty($success) ? $success : 'NA'}}";
  var error = "{{!empty($error) ? $error : 'NA'}}";
  if (success != 'NA') {
    Swal.fire({
      title: 'Done',
      text: success,
      icon: 'success',
      confirmButtonText: 'Okay',

    }).then((result) => {
      if (result.isConfirmed) {
        window.location.reload();
      }
    })
  }
  if (error != 'NA') {
    Swal.fire({
      title: 'Failed!',
      text: error,
      icon: 'error',
      confirmButtonText: 'Okay',

    });
  }
</script>
@yield('custom_javascript')

</html>