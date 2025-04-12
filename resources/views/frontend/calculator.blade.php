<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panel Calculator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function addWall() {
            let wallIndex = document.querySelectorAll('.wall-group').length;
            let wallContainer = document.getElementById("wall-container");
            let wallHTML = `
                <div class="card p-3 mb-3 wall-group">
                    <h5>Wall ${wallIndex + 1}</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Wall Width:</label>
                            <input type="text" class="form-control" name="wall_width[${wallIndex}]">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Width Unit:</label>
                            <select name="wall_width_unit[${wallIndex}]" class="form-select">
                                <option value="mm">mm</option>
                                <option value="cm">cm</option>
                                <option value="m">m</option>
                                <option value="ft">ft</option>
                                <option value="in">Inch</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Wall Height:</label>
                            <input type="text" class="form-control" name="wall_height[${wallIndex}]">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Height Unit:</label>
                            <select name="wall_height_unit[${wallIndex}]" class="form-select">
                                <option value="mm">mm</option>
                                <option value="cm">cm</option>
                                <option value="m">m</option>
                                <option value="ft">ft</option>
                                <option value="in">Inch</option>
                            </select>
                        </div>
                    </div>
                    
                    <h6 class="mt-3">Obstructions</h6>
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="addObstruction(${wallIndex})">+ Add Obstruction</button>
                    <div id="obstruction-container-${wallIndex}" class="mt-2"></div>
                </div>`;
            wallContainer.insertAdjacentHTML("beforeend", wallHTML);
        }

        function addObstruction(wallIndex) {
            let obstructionContainer = document.getElementById(`obstruction-container-${wallIndex}`);
            let obstructionIndex = obstructionContainer.querySelectorAll('.obstruction-group').length;

            let obstructionHTML = `
        <div class="row g-3 obstruction-group">
            <div class="col-md-3">
                <label class="form-label">Obstruction Width:</label>
                <input type="text" class="form-control" name="obstructions[${wallIndex}][${obstructionIndex}][width]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Width Unit:</label>
                <select name="obstructions[${wallIndex}][${obstructionIndex}][width_unit]" class="form-select">
                    <option value="mm">mm</option>
                    <option value="cm">cm</option>
                    <option value="m">m</option>
                    <option value="ft">ft</option>
                    <option value="in">Inch</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Obstruction Height:</label>
                <input type="text" class="form-control" name="obstructions[${wallIndex}][${obstructionIndex}][height]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Height Unit:</label>
                <select name="obstructions[${wallIndex}][${obstructionIndex}][height_unit]" class="form-select">
                    <option value="mm">mm</option>
                    <option value="cm">cm</option>
                    <option value="m">m</option>
                    <option value="ft">ft</option>
                    <option value="in">Inch</option>
                </select>
            </div>
        </div>`;

            obstructionContainer.insertAdjacentHTML("beforeend", obstructionHTML);
        }

    </script>
</head>

<body>
    <main class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container bg-white p-4 rounded shadow-sm">

        <?php
            if(Session::get('panel_width')){
                $panel_width = Session::get('panel_width');
            }
            if(Session::get('panel_height')){
                $panel_height = Session::get('panel_height');
            }
            if(Session::get('panel_width_unit')){
                $panel_width_unit = Session::get('panel_width_unit');
            }
            if(Session::get('panel_height_unit')){
                $panel_height_unit = Session::get('panel_height_unit');
            }
        ?>

            <form id="panelForm" action="/calculate" method="POST">
                @csrf
                <div class="card p-3 mb-3">
                    <h4 class="text-center">Panel Details</h4>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Panel Width:</label>
                            <input type="text" class="form-control" name="panel_width" value="{{ $panel_width ?? old('panel_height') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Width Unit:</label>
                            <select name="panel_width_unit" class="form-select">
                                <option value="">Unit</option>
                                <option value="mm" @if (isset($panel_width_unit) && $panel_width_unit == 'mm') selected
                                @endif>mm</option>
                                <option value="cm" @if (isset($panel_width_unit) && $panel_width_unit == 'cm') selected
                                @endif>cm</option>
                                <option value="m" @if (isset($panel_width_unit) && $panel_width_unit == 'm') selected
                                @endif>m</option>
                                <option value="ft" @if (isset($panel_width_unit) && $panel_width_unit == 'ft') selected
                                @endif>ft</option>
                                <option value="in" @if (isset($panel_width_unit) && $panel_width_unit == 'in') selected
                                @endif>Inch</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Panel Height:</label>
                            <input type="text" class="form-control" name="panel_height"
                                value="{{ $panel_height??old('panel_height') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Height Unit:</label>
                            <select name="panel_height_unit" class="form-select">
                                <option value="">Unit</option>
                                <option value="mm" @if (!empty($panel_height_unit) && $panel_height_unit == 'mm') selected
                                @endif>mm</option>
                                <option value="cm" @if (!empty($panel_height_unit) && $panel_height_unit == 'cm') selected
                                @endif>cm</option>
                                <option value="m" @if (!empty($panel_height_unit) && $panel_height_unit == 'm') selected
                                @endif>m</option>
                                <option value="ft" @if (!empty($panel_height_unit) && $panel_height_unit == 'ft') selected
                                @endif>ft</option>
                                <option value="in" @if (!empty($panel_height_unit) && $panel_height_unit == 'in') selected
                                @endif>Inch</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card p-3 mb-3">
                    <h4 class="text-center">Wall Details
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="addWall()">+ Add
                            Wall</button>
                    </h4>
                    <div id="wall-container">
                        @if(Session::has('walls'))
                            @foreach(Session::get('walls') as $key => $wall)
                                <div class="card p-3 mb-3 wall-group">
                                    <h5>Wall {{ $key + 1 }}</h5>
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Wall Width:</label>
                                            <input type="text" class="form-control" name="wall_width[]"
                                                value="{{ $wall['width'] }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Width Unit:</label>
                                            <select name="wall_width_unit[]" class="form-select">
                                                <option value="mm" @if($wall['width_unit'] == 'mm') selected @endif>mm</option>
                                                <option value="cm" @if($wall['width_unit'] == 'cm') selected @endif>cm</option>
                                                <option value="m" @if($wall['width_unit'] == 'm') selected @endif>m</option>
                                                <option value="ft" @if($wall['width_unit'] == 'ft') selected @endif>ft</option>
                                                <option value="in" @if($wall['width_unit'] == 'in') selected @endif>Inch</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Wall Height:</label>
                                            <input type="text" class="form-control" name="wall_height[]"
                                                value="{{ $wall['height'] }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Height Unit:</label>
                                            <select name="wall_height_unit[]" class="form-select">
                                                <option value="mm" @if($wall['height_unit'] == 'mm') selected @endif>mm</option>
                                                <option value="cm" @if($wall['height_unit'] == 'cm') selected @endif>cm</option>
                                                <option value="m" @if($wall['height_unit'] == 'm') selected @endif>m</option>
                                                <option value="ft" @if($wall['height_unit'] == 'ft') selected @endif>ft</option>
                                                <option value="in" @if($wall['height_unit'] == 'in') selected @endif>Inch</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h6 class="mt-3">Obstructions</h6>
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                        onclick="addObstruction({{ $key }})">+ Add Obstruction</button>
                                    <div id="obstruction-container-{{ $key }}" class="mt-2">
                                        @if(!empty($wall['obstructions']))
                                            @foreach($wall['obstructions'] as $obsKey => $obstruction)
                                                <div class="row g-3 obstruction-group">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Obstruction Width:</label>
                                                        <input type="text" class="form-control"
                                                            name="obstructions[{{ $key }}][{{ $obsKey }}][width]"
                                                            value="{{ $obstruction['width'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Width Unit:</label>
                                                        <select name="obstructions[{{ $key }}][{{ $obsKey }}][width_unit]"
                                                            class="form-select">
                                                            <option value="mm" @if($obstruction['width_unit'] == 'mm') selected @endif>mm
                                                            </option>
                                                            <option value="cm" @if($obstruction['width_unit'] == 'cm') selected @endif>cm
                                                            </option>
                                                            <option value="m" @if($obstruction['width_unit'] == 'm') selected @endif>m
                                                            </option>
                                                            <option value="ft" @if($obstruction['width_unit'] == 'ft') selected @endif>ft
                                                            </option>
                                                            <option value="in" @if($obstruction['width_unit'] == 'in') selected @endif>Inch
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Obstruction Height:</label>
                                                        <input type="text" class="form-control"
                                                            name="obstructions[{{ $key }}][{{ $obsKey }}][height]"
                                                            value="{{ $obstruction['height'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Height Unit:</label>
                                                        <select name="obstructions[{{ $key }}][{{ $obsKey }}][height_unit]"
                                                            class="form-select">
                                                            <option value="mm" @if($obstruction['height_unit'] == 'mm') selected @endif>mm
                                                            </option>
                                                            <option value="cm" @if($obstruction['height_unit'] == 'cm') selected @endif>cm
                                                            </option>
                                                            <option value="m" @if($obstruction['height_unit'] == 'm') selected @endif>m
                                                            </option>
                                                            <option value="ft" @if($obstruction['height_unit'] == 'ft') selected @endif>ft
                                                            </option>
                                                            <option value="in" @if($obstruction['height_unit'] == 'in') selected @endif>Inch
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
                <button type="submit" class="btn btn-primary w-100">Calculate Panels</button>
            </form>
            <!-- Results Table -->
            <div class="table-container mt-4">
                <table class="table table-bordered text-center shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Wall Width</th>
                            <th>Wall Height</th>
                            <th>Wall Area (㎡)</th>
                            <th>Panels Required</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Session::get('walls', []) as $wall)
                            <tr>
                                <td>{{ $wall['width'] }} {{ $wall['width_unit'] }}</td>
                                <td>{{ $wall['height'] }} {{ $wall['height_unit'] }}</td>
                                <td>{{ $wall['wall_area'] }}</td>
                                <td>{{ $wall['panels_required'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </main>
</body>

</html>