@extends('layouts.dashboard')
@section('content')
<div class="col-11 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <h4 class="card-title">Users</h4>
        <div class="col-sm-12">
          <a class="btn btn-primary" href="/admin/users/create"><i class="fa fa-solid fa-plus"></i>
            Create User</a>
          
        </div>
      </div>
      <div class="table-responsive text-nowrap" style="margin: 10px;padding: 10px;">
        <table class="table .table-bordered " id="users">
          <thead>
            <tr class="text-nowrap">
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>User Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- DataTables will fill this dynamically -->
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection
@section('custom_javascript')


<script>
  $(document).ready(function () {

    let ajaxUrl = window.location.pathname; // This dynamically builds the AJAX URL
    console.log(ajaxUrl);
    // Initialize DataTable
    //$('#pages').DataTable();

    $('#users').DataTable({
      processing: true,
      serverSide: true,
      ajax: ajaxUrl, // Use the dynamically generated URL
      columns: [{
        data: 'id',
        name: 'id',
        orderable: true
      },
      {
        data: 'name',
        name: 'name',
        orderable: true
      },
      {
        data: 'email',
        name: 'email',
        orderable: true,
        
      },
      {
        data: 'user_role',
        name: 'user_role',
        orderable: true,
        
      },
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      }
      ],
      order: [
        [0, 'desc']
      ], // Default order

      pagingType: "full_numbers", // Optional: Show full pagination controls
      language: {
        search: "Search Pages:" // Customize the search label
      }
    });
  });
</script>




@stop