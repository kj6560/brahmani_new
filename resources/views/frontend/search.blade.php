<style>

    .filters {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .products {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .product {
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
    }

    .product:hover {
        transform: scale(1.02);
    }

    .product img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .product h3 {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .product p {
        margin: 0;
    }

    .applied-filters span {
        display: inline-block;
        background-color: #e9ecef;
        padding: 5px 10px;
        margin-right: 10px;
        border-radius: 20px;
        font-size: 14px;
    }

    .applied-filters span a {
        margin-left: 5px;
        color: #dc3545;
        text-decoration: none;
    }

    .products {
    background-color: #ffffff;
    padding: 20px;
    height: 800px !important;
    overflow: auto;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>

<div class="container">
    <div class="row g-4">
        <!-- Filters Section -->
        <div class="col-lg-3">
            <div class="filters">
			            <br>
            @csrf
            <br>
                <h5 class="mb-4">Filters</h5>
                <div class="filter-section mb-3">
                    <label for="panel-usage" class="form-label">Usage Of Panels</label>
                    <select id="panel-usage" name="usage_of_panels" class="form-select" onchange="filterProducts()">
                        <option value="">Select Panel Usage</option>
                        <option value="1">Wall</option>
                        <option value="0">Ceiling</option>
                    </select>
                </div>
                <div class="filter-section mb-3">
                    <label for="stock-status" class="form-label">Stock Status</label>
                    <select name="instock" class="form-select" onchange="filterProducts()">
                    <option value="">Select Stock Status</option>
                    <option value="1" @if (isset($filters['instock']) && $filters['instock'] == 1) selected @endif>InStock
                    </option>
                    <option value="0" @if (isset($filters['instock']) && $filters['instock'] == 0) selected @endif>Out Of
                        Stock</option>
                </select>
                </div>

                <div class="filter-section mb-3">
                    <label for="stock-status" class="form-label">Panel Included</label>
                    <select name="panel_included"  class="form-select" onchange="filterProducts()">
                        <option value="">Select Panel Included</option>
                        <option value="1" @if (isset($filters['panel_included']) && $filters['panel_included'] == 1) selected @endif>With Panelling</option>
                        <option value="0" @if (isset($filters['panel_included']) && $filters['panel_included'] == 0) selected @endif>Without Panelling
                        </option>
                    </select>
                </div>
                <div class="filter-section mb-3">
                    <label for="stock-status" class="form-label">Length</label>
                    <select name="length" class="form-select" onchange="filterProducts()">
                        <option value="">Select a length</option>
                        <option value="8" @if (isset($filters['length']) && $filters['length'] == 8) selected @endif>8 ft
                        </option>
                        <option value="9.5" @if (isset($filters['length']) && $filters['length'] == 9.5) selected @endif>9.5
                            ft
                        </option>
                        <option value="10.0" @if (isset($filters['length']) && $filters['length'] == 10.0) selected @endif>
                            10.0 ft
                        </option>
                    </select>
                </div>
                <div class="filter-section mb-3">
                    <label for="stock-status" class="form-label">Width</label>
                    <select name="width" class="form-select" onchange="filterProducts()">
                        <option value="">Select a width</option>
                        <option value="5.0" @if (isset($filters['width']) && $filters['width'] == 5.0) selected @endif>5.0
                            inches
                        </option>
                        <option value="6.0" @if (isset($filters['width']) && $filters['width'] == 6.0) selected @endif>6.0
                            inches
                        </option>
                        <option value="6.25" @if (isset($filters['width']) && $filters['width'] == 6.25) selected @endif>6.25
                            inches</option>
                        <option value="6.50" @if (isset($filters['width']) && $filters['width'] == 6.5) selected @endif>6.5
                            inches</option>
                        <option value="8.0" @if (isset($filters['width']) && $filters['width'] == 8.0) selected @endif>8.0
                            inches
                        </option>
                        <option value="10.0" @if (isset($filters['width']) && $filters['width'] == 10.0) selected @endif>10.0
                            inches</option>
                        <option value="12.0" @if (isset($filters['width']) && $filters['width'] == 12.0) selected @endif>12.0
                            inches</option>
                        <option value="16.0" @if (isset($filters['width']) && $filters['width'] == 16.0) selected @endif>16.0
                            inches</option>
                        <option value="48.0" @if (isset($filters['width']) && $filters['width'] == 48.0) selected @endif>48
                            inches
                        </option>
                    </select>
                </div>
                <div class="filter-section mb-3">
                    <label for="stock-status" class="form-label">Thickness</label>
                    <select name="thickness" class="form-select" onchange="filterProducts()">
                        <option value="">Select a thickness</option>
                        <option value="1.2" @if (isset($filters['thickness']) && $filters['thickness'] == 1.2) selected @endif>1.2
                            mm</option>
                        <option value="3.0" @if (isset($filters['thickness']) && $filters['thickness'] == 3.0) selected @endif>3.0
                            mm</option>
                        <option value="5.5" @if (isset($filters['thickness']) && $filters['thickness'] == 5.5) selected @endif>5.5
                            mm</option>
                        <option value="6.0" @if (isset($filters['thickness']) && $filters['thickness'] == 6.0) selected @endif>6.0
                            mm</option>
                        <option value="6.5" @if (isset($filters['thickness']) && $filters['thickness'] == 6.5) selected @endif>6.5
                            mm</option>
                        <option value="7.0" @if (isset($filters['thickness']) && $filters['thickness'] == 7.0) selected @endif>7.0
                            mm</option>
                        <option value="7.5" @if (isset($filters['thickness']) && $filters['thickness'] == 7.5) selected @endif>7.5
                            mm</option>
                        <option value="8.5" @if (isset($filters['thickness']) && $filters['thickness'] == 8.5) selected @endif>8.5
                            mm</option>
                        <option value="9.5" @if (isset($filters['thickness']) && $filters['thickness'] == 9.5) selected @endif>9.5
                            mm</option>
                        <option value="10.0" @if (isset($filters['thickness']) && $filters['thickness'] == 10.0) selected @endif>
                            10.0 mm</option>
                        <option value="11.0" @if (isset($filters['thickness']) && $filters['thickness'] == 11.0) selected @endif>
                            11.0 mm</option>
                        <option value="12.0" @if (isset($filters['thickness']) && $filters['thickness'] == 12.0) selected @endif>
                            12.0 mm</option>
                        <option value="17.0" @if (isset($filters['thickness']) && $filters['thickness'] == 17.0) selected @endif>
                            17.0 mm</option>
                        <option value="23.0" @if (isset($filters['thickness']) && $filters['thickness'] == 23.0) selected @endif>
                            23.0 mm</option>
                        <option value="24.0" @if (isset($filters['thickness']) && $filters['thickness'] == 24.0) selected @endif>
                            24.0 mm</option>
                    </select>
                </div>
				   <div class="filter-section">
                <h6>Color</h6>
                <select name="color" class="form-select"  onchange="filterProducts()">
                    <option value="">Select a Color</option>
                    <option value="Black" @if (isset($filters['color']) && $filters['color'] == 'Black') selected @endif>
                        Black
                    </option>
                    <option value="White" @if (isset($filters['color']) && $filters['color'] == 'White') selected @endif>
                        White
                    </option>
                    <option value="Red" @if (isset($filters['color']) && $filters['color'] == 'Red') selected @endif>Red
                    </option>
                    <option value="Green" @if (isset($filters['color']) && $filters['color'] == 'Green') selected @endif>
                        Green
                    </option>
                    <option value="Yellow" @if (isset($filters['color']) && $filters['color'] == 'Yellow') selected
                    @endif>
                        Yellow</option>
                    <option value="Blue" @if (isset($filters['color']) && $filters['color'] == 'Blue') selected @endif>
                        Blue
                    </option>
                    <option value="Brown" @if (isset($filters['color']) && $filters['color'] == 'Brown') selected @endif>
                        Brown
                    </option>
                    <option value="Orange" @if (isset($filters['color']) && $filters['color'] == 'Orange') selected
                    @endif>
                        Orange</option>
                    <option value="Pink" @if (isset($filters['color']) && $filters['color'] == 'Pink') selected @endif>
                        Pink
                    </option>
                    <option value="Purple" @if (isset($filters['color']) && $filters['color'] == 'Purple') selected
                    @endif>
                        Purple</option>
                    <option value="Grey" @if (isset($filters['color']) && $filters['color'] == 'Grey') selected @endif>
                        Grey
                    </option>
                </select>
            </div>
            <div class="filter-section">
                <h6>Select Min Price</h6>
                <label for="customRange1" class="form-label"><span id="sliderValue1">0</span></label>
                <input type="range" name="min_price" class="form-range" oninput="filterProducts()"
                    id="slider1" min="1" max="7000">
            </div>

            <div class="filter-section">
                <h6>Select Max Price</h6>
                <label for="customRange1" class="form-label"><span id="sliderValue2">0</span></label>
                <input type="range" name="max_price" class="form-range" oninput="filterProducts()"
                    id="slider2" min="1" max="7000">
            </div>
                <!-- Add more filters here -->
            </div>
        </div>
        <!-- Products Section -->
        <div class="col-lg-9">
            <div id="applied-filters" class="mb-4">
                @if (request()->hasAny(['usage_of_panels', 'instock', 'panel_included', 'length', 'width', 'thickness', 'color', 'min_price', 'max_price']))
                    <h5 class="filter-heading">Applied Filters</h5>
                @endif
                <div class="applied-filters" id="applied-filters-div">
                    <!-- Dynamically list applied filters -->
                    {{-- <span>Example Filter <a href="#">&times;</a></span> --}}
                </div>
            </div>
            <div class="products">
                <div class="row g-4">
                    <!-- Example Product -->
                    @if (isset($settings['search']))
                        @foreach ($settings['search'] as $pro)
                            <div class="product" data-category="{{ $pro->category_name }}"
                                data-price="{{ $pro->product_price ?? '' }}">
                                <img height="100px" width="100px"
                                    src="{{ asset('storage') }}/{{ $pro->product_banner ?? '' }}"
                                    alt="{{ $pro->product_name ?? '' }}">
                                <h3>{{ $pro->product_name ?? '' }}</h3>
                                <p>Category: {{ $pro->category_name ?? '' }}</p>
                                <p>Price: {{ $pro->product_price ?? '' }}</p>
                                <div class="mt-3">
                                    
                                    <a class="btn btn-secondary " href="/products/{{ $pro->id ?? 1 }}">See Details</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- Add more products dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    document.querySelector('select[name="usage_of_panels"]').value = urlParams.get('usage_of_panels') ?? 'all';
    document.querySelector('select[name="instock"]').value = urlParams.get('instock') ?? 'all';
    document.querySelector('select[name="panel_included"]').value = urlParams.get('panel_included') ?? 'all';
    document.querySelector('select[name="length"]').value = urlParams.get('length') ?? 'all';
    document.querySelector('select[name="width"]').value = urlParams.get('width') ?? 'all';
    document.querySelector('select[name="thickness"]').value = urlParams.get('thickness') ?? 'all';
    document.querySelector('select[name="color"]').value = urlParams.get('color') ?? 'all';
    document.querySelector('input[name="min_price"]').value = urlParams.get('min_price') ?? '';
    document.querySelector('input[name="max_price"]').value = urlParams.get('max_price') ?? '';
    updateSliderValue1(urlParams.get('min_price') ?? 1);
    updateSliderValue2(urlParams.get('max_price') ?? 1);

    function filterProducts() {
        const usage_of_panels = document.querySelector('select[name="usage_of_panels"]').value;
        const instock = document.querySelector('select[name="instock"]').value;
        const panel_included = document.querySelector('select[name="panel_included"]').value;
        const length = document.querySelector('select[name="length"]').value;
        const width = document.querySelector('select[name="width"]').value;
        const thickness = document.querySelector('select[name="thickness"]').value;
        const color = document.querySelector('select[name="color"]').value;
        const min_price = document.querySelector('input[name="min_price"]').value;
        const max_price = document.querySelector('input[name="max_price"]').value;
        updateSliderValue1(min_price);
        updateSliderValue2(max_price);
        window.location.href = "?s=" + urlParams.get('s') +
            `&usage_of_panels=${usage_of_panels}&instock=${instock}&panel_included=${panel_included}&length=${length}&width=${width}&thickness=${thickness}&color=${color}&min_price=${min_price}&max_price=${max_price}`;
    }
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const appliedFiltersContainer = document.getElementById('applied-filters-div');

        // List all applied filters
        urlParams.forEach((value, key) => {
            if (key !== 's' && value != 'all' && value != '') { // Ensure 's' filter cannot be removed
                const filterElement = document.createElement('span');
                filterElement.classList.add('m-1');
                filterElement.innerHTML =
                    `${key}: ${value} <a href="#" data-key="${key}" data-value="${value}">&times;</a>`;
                appliedFiltersContainer.appendChild(filterElement);
                // const breakTag = document.createElement('br');
                // appliedFiltersContainer.appendChild(breakTag);
            }
        });

        // Remove filter when clicking on the remove link
        appliedFiltersContainer.addEventListener('click', function(event) {
            if (event.target.tagName === 'A') {
                event.preventDefault();
                const key = event.target.getAttribute('data-key');
                urlParams.delete(key);
                window.location.search = urlParams.toString();
            }
        });

    });

    function updateSliderValue2(value) {
        document.getElementById('sliderValue2').textContent = value;
    }

    function updateSliderValue1(value) {
        document.getElementById('sliderValue1').textContent = value;
    }
</script>
