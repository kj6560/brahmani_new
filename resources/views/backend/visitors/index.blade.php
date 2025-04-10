@extends('layouts.dashboard')
@section('content')
<div class="col-11 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <h4 class="card-title">Visitors</h4>
        
      </div>
      <div class="table-responsive text-nowrap" style="margin: 10px;padding: 10px;">
        <table class="table .table-bordered " id="visitors">
          <thead>
            <tr class="text-nowrap">
              <th>Id</th>
              <th>Visitor user id</th>
              <th>Visitor's Ip</th>
              <th>Visiting Url</th>
              
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

    $('#visitors').DataTable({
      processing: true,
      serverSide: true,
      ajax: ajaxUrl, // Use the dynamically generated URL
      columns: [{
        data: 'id',
        name: 'id',
        orderable: true
      },
      {
        data: 'user_id',
        name: 'user_id',
        orderable: true,
        searchable: true
      },
      {
        data: 'ip_address',
        name: 'ip_address',
        orderable: true,
        searchable: true
      },
      {
        data: 'url',
        name: 'url',
        orderable: false,
        searchable: true
      },
      {
        data: 'created_at',
        name: 'created_at',
        orderable: false,
        searchable: true
      }
      ],
      order: [
        [0, 'desc']
      ], // Default order

      pagingType: "full_numbers", // Optional: Show full pagination controls
      language: {
        search: "Search visitors:" // Customize the search label
      }
    });
  });
</script>
@stop