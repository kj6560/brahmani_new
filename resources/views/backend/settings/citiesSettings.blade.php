@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-12">
            <div class="row">
                @csrf
                <form action="/admin/storeCities" method="POST">
                    @csrf
                    
                    <div class="card mb-4">
                        <h5 class="card-header">Activate Cities </h5>

                        <div class="card-body">


                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>City Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                foreach($cities as $city) {
                                                    
                                                    echo "<tr>";
                                                    echo "<td>".$city->city_name."</td>";
                                                    ?>
                                                    <td><input type='checkbox' name='status[{{$city->id}}]' @if ($city->is_active)
                                                    checked
                                                    @else
                                                    @endif></td>
                                                    <?php
                                                    echo "</tr>";
                                                }
                                            ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-3 row">
                                <label for="html5-search-input" class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <input class="btn btn-primary" type="submit" value="submit" id="submit" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection