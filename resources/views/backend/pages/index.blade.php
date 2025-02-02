@extends('layouts.dashboard')
@section('content')
<div class="col-11 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <h4 class="card-title">Pages</h4>
        <div class="col-sm-12">
          <a class="btn btn-primary" href="/admin/categories/create"><i class="fa fa-solid fa-plus"></i>
            Create Single Page</a>
          <a class="btn btn-primary" href="/admin/categories/bulkPages/cityWise"><i class="fa fa-solid fa-plus"></i>
            City Wise Pages</a>
          <a class="btn btn-primary" href="/admin/categories/bulkPages/stateWise"><i class="fa fa-solid fa-plus"></i>
            State Wise Pages</a>
          <a class="btn btn-primary" href="/admin/categories/bulkPages/countryWise"><i class="fa fa-solid fa-plus"></i>
            Country Wise Pages</a>
        </div>
      </div>
      <div class="table-responsive text-nowrap" style="margin: 10px;padding: 10px;">
        <table class="table .table-bordered " id="pages_index">
          <thead>
            <tr class="text-nowrap">
              <th>Id</th>
              <th>Page Name</th>
              <th>Page Url</th>
              <th>Status</th>
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

    $('#pages_index').DataTable({
      processing: true,
      serverSide: true,
      ajax: ajaxUrl, // Use the dynamically generated URL
      columns: [{
        data: 'id',
        name: 'id',
        orderable: true
      },
      {
        data: 'page_name',
        name: 'page_name',
        orderable: true
      },
      {
        data: 'page_url',
        name: 'page_url',
        orderable: true,
        render: function (data, type, row) {
          console.log(row.page_city);
          var link = '';
          if (row.page_city != undefined) {
            d = window.location.origin + '/dPage/' + data;
            link =  `<a href="${d}" target="_blank">${data}</a>`;
          }else{
            if(data){
              d = window.location.origin + '/' + data;
            }else{
              d = window.location.origin;
              data = 'Home Page';
            }
            
            link =  `<a href="${d}" target="_blank">${data}</a>`;
          }
          return link;
        }
      },
      {
        data: 'page_status',
        name: 'page_status',
        orderable: true,
        render: function (data, type, row) {
          if (type === 'display') {
            switch (data) {
              case 1:
                return 'Active';
              case 0:
                return 'InActive';

              default:
                return 'Unknown';
            }
          }
          return data;
        }
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