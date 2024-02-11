@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>Add Product - Kimbowny</title>
    @endpush
    <style>
        /* Custom Styles */
        .form-group .row>div {
            margin-bottom: 10px;
            margin-top: 10px;
            /* Adds space between rows */
        }

        #colorSizeWrapper,
        #flavorWrapper,
        #flavorWeightWrapper,
        #flavorPiecesWrapper,
        #shapeSizeWrapper,
        #piecesWrapper {
            background-color: #f7f7f7;
            /* Light grey background */

            border-radius: 5px;
            /* Rounded corners */
            margin-top: 10px;
            /* Space between button and wrapper */
        }

        .btn-info {
            width: 100%;
            /* Make buttons take the full width of the column */
            margin-bottom: 5px;
            /* Space below buttons */
        }


        .btncustom {
            border-radius: 25px;

        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-box"></i>&nbsp;Add Product</h1>
                    </div>


                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                            <a href="{{ route('admin.product.show') }}" class="btn btn-submit">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"
                                style="background: linear-gradient(to right, rgba(0, 123, 255, 0.7), rgba(0, 86, 179, 0.7)); color: rgba(255, 255, 255, 0.9); font-size: 1.8em; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">
                                <h3 class="card-title" style="font-size: 0.8em;">Add Product</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.product.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon"><i
                                                                class="fas fa-pen"></i></span>
                                                    </div>
                                                    <input type="text" name="productname" required
                                                        class="form-control @error('productname') is-invalid @enderror"
                                                        placeholder="Product Name..." value="{{ old('productname') }}">
                                                </div>
                                                @error('productname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon"><i class="fas fa-cubes"></i>
                                                        </span>
                                                    </div>
                                                    <input type="number" name="productquantity" required
                                                        class="form-control @error('productquantity') is-invalid @enderror"
                                                        placeholder="Product Quantity..."
                                                        value="{{ old('productquantity') }}">
                                                </div>
                                                @error('productquantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon">
                                                            <i class="fas fa-layer-group"></i>
                                                            <!-- Changed icon to 'fa-tags' for category context -->
                                                        </span>
                                                    </div>
                                                    <select class="form-control" id="categorySelect" name="category"
                                                        required>
                                                        <option value="" disabled selected>Select Category...</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon">
                                                            <i class="fas fa-paw"></i>
                                                            <!-- Changed icon to 'fa-paw' for pet context -->
                                                        </span>
                                                    </div>
                                                    <select class="form-control" id="petSelect" name="pet" required>
                                                        <option value="" disabled selected>Select Pet...</option>
                                                        @foreach ($pets as $pet)
                                                            <option value="{{ $pet->id }}">{{ $pet->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @error('pet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon"><i
                                                                class="fas fa-percentage"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" id="productdiscount"
                                                        name="productdiscount" required placeholder="Enter Discount...">
                                                </div>
                                            </div>
                                            @error('productdiscount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon">
                                                            <i class="fas fa-star"></i>
                                                            <!-- Changed icon to 'fa-tags' for category context -->
                                                        </span>
                                                    </div>
                                                    <select class="form-control" id="featureSelect" name="feature" required>
                                                        <option value="" disabled selected>Select Feature...
                                                        </option>

                                                        <option value="1">Show</option>
                                                        <option value="0">Hide</option>

                                                    </select>
                                                </div>
                                            </div>
                                            @error('feature')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>


                                    </div>
                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text icon"><i class="fas fa-image"></i></span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="form-control @error('productimage') is-invalid @enderror"
                                                    id="image" name="productimage[]" multiple>
                                                <label class="custom-file-label" for="image"
                                                    style="color: #999999e8;">Choose Product Image...</label>
                                            </div>
                                        </div>
                                        @error('productimage')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Place this before the product description in your form -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button type="button" id="addColorSize"
                                                    class="btn btn-info btncustom">Add
                                                    Color/Size</button>

                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="addFlavor" class="btn btn-info btncustom">Add
                                                    Flavor</button>

                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="addFlavorWeight"
                                                    class="btn btn-info btncustom">Add
                                                    Flavor/Weight</button>

                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="addFlavorPieces"
                                                    class="btn btn-info btncustom">Add
                                                    Flavor/Pieces</button>

                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="addShapeSize"
                                                    class="btn btn-info btncustom">Add
                                                    Shape/Size</button>

                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" id="addPieces" class="btn btn-info btncustom">Add
                                                    Pieces</button>

                                            </div>
                                        </div>
                                        <div id="colorSizeWrapper"></div>
                                        <div id="flavorWrapper"></div>
                                        <div id="piecesWrapper"></div>
                                        <div id="shapeSizeWrapper"></div>
                                        <div id="flavorPiecesWrapper"></div>
                                        <div id="flavorWeightWrapper"></div>
                                        <!-- Container for dynamic color and size inputs -->
                                    </div>


                                    <div class="form-group">

                                        <div class="input-group">

                                            <textarea id="description" name="productdescription"
                                                class="form-control @error('productdescription') is-invalid @enderror"
                                                placeholder="Write your product description here...">{{ old('productdescription') }}</textarea>
                                        </div>
                                        @error('productdescription')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Dynamic fields for color, size, Price price, and sale price selection -->
                                    <div class="form-group" hidden>
                                        <label for="dynamicColor">Color</label>
                                        <input type="text" id="dynamicColor" name="color[]" class="form-control">
                                    </div>

                                    <div class="form-group" hidden>
                                        <label for="dynamicSize">Size</label>
                                        <input type="text" id="dynamicSize" name="size[]" class="form-control">
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="dynamicWeight">Weight</label>
                                        <input type="text" id="dynamicWeight" name="weight[]" class="form-control">
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="dynamicFlavor">Flavor</label>
                                        <input type="text" id="dynamicFlavor" name="flavor[]" class="form-control">
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="dynamicShape">Shape</label>
                                        <input type="text" id="dynamicShape" name="shape[]" class="form-control">
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="dynamicPieces">Pieces</label>
                                        <input type="text" id="dynamicPieces" name="pieces[]" class="form-control">
                                    </div>

                                    <div class="form-group" hidden>
                                        <label for="purchasePrice">Purchase Price</label>
                                        <input type="number" id="purchasePrice" name="purchase[]" class="form-control">
                                    </div>

                                    <div class="form-group" hidden>
                                        <label for="salePrice">Sale Price</label>
                                        <input type="number" id="salePrice" name="sale[]" class="form-control">
                                    </div>
                                    <div class="card-footer" style="text-align: right">
                                        <button type="submit" class="btn btn-submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let wrapper = $("#colorSizeWrapper");
            let addColorSizeButton = $("#addColorSize");

            let flavorwrapper = $("#flavorWrapper");
            let addFlavorButton = $("#addFlavor");

            let flavorWeightwrapper = $("#flavorWeightWrapper");
            let addFlavorWeightButton = $("#addFlavorWeight");

            let piecesWrapper = $("#piecesWrapper");
            let addPiecesButton = $("#addPieces");

            let flavorPiecesWrapper = $("#flavorPiecesWrapper");
            let addFlavorPiecesButton = $("#addFlavorPieces");

            let shapeSizeWrapper = $("#shapeSizeWrapper");
            let addShapeSizeButton = $("#addShapeSize");

            $(addColorSizeButton).click(function(e) {
                e.preventDefault();
                // Toggle visibility of colorSizeWrapper
                $("#flavorWrapper").empty();
                $("#flavorWeightwrapper").empty();
                $("#piecesWrapper").empty();
                $("#flavorPiecesWrapper").empty();
                $("#shapeSizeWrapper").empty();

                $(wrapper).append(`
                  <div class="row align-items-end">
                      <div class="col">
                          <div class="form-group">
                              <label>Color</label>
                              <select class="form-control form-control-custom color-select" name="color[]">
                                  <option value="" disabled selected>Select Color</option>
                                  @foreach ($color as $colors)
                                      <option value="{{ $colors->id }}">{{ $colors->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Size</label>
                              <select class="form-control form-control-custom size-select" name="size[]">
                                  <option value="" disabled selected>Select Size</option>
                                  @foreach ($size as $sizes)
                                      <option value="{{ $sizes->id }}">{{ $sizes->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Purchase Price</label>
                              <input type="number" name="purchasePrice[]" class="form-control form-control-custom pprice" placeholder="Purchase Price">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Sale Price</label>
                              <input type="number" name="salePrice[]" class="form-control form-control-custom sprice" placeholder="Sale Price">
                          </div>
                      </div>
                      <div class="col-auto">
                          <button class="btn btn-danger remove-field" type="button">&times;</button>
                      </div>
                  </div>
              `); // Add input fields

                // Update the dynamicColor input when a new color is selected
                let dynamicColorInput = $("#dynamicColor");
                // Get the last added color-select
                lastColorSelect.on("change", function() {
                    let selectedColor = $(this).find("option:selected").val();
                    dynamicColorInput.val(selectedColor);
                });

                let dynamicSizeInput = $("#dynamicSize");
                let lastSizeSelect = $(".size-select").last(); // Get the last added color-select
                lastSizeSelect.on("change", function() {
                    let selectedSize = $(this).find("option:selected").val();
                    dynamicSizeInput.val(selectedSize);
                });

                let dynamicPurchaseInput = $("#purchasePrice");
                let lastpprice = $(".pprice").last(); // Get the last added pprice input
                lastpprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicPurchaseInput.val(selectedpprice);
                });

                let dynamicSaleInput = $("#salePrice");
                let lastsprice = $(".sprice").last(); // Get the last added pprice input
                lastsprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicSaleInput.val(selectedpprice);
                });


            });

            $(addFlavorButton).click(function(e) {
                e.preventDefault();
                // Toggle visibility of colorSizeWrapper

                $("#flavorWeightWrapper").empty();
                $("#piecesWrapper").empty();
                $("#flavorPiecesWrapper").empty();
                $("#shapeSizeWrapper").empty();
                $("#colorSizeWrapper").empty();



                $(flavorwrapper).append(`
                  <div class="row align-items-end">

                      <div class="col">
                          <div class="form-group">
                              <label>Flavor</label>
                              <select class="form-control form-control-custom flavor-select" name="flavor[]">
                                  <option value="" disabled selected>Select Flavor</option>
                                  @foreach ($flavor as $flavors)
                                      <option value="{{ $flavors->id }}">{{ $flavors->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Purchase Price</label>
                              <input type="number" name="purchasePrice[]" class="form-control form-control-custom pprice" placeholder="Purchase Price">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Sale Price</label>
                              <input type="number" name="salePrice[]" class="form-control form-control-custom sprice" placeholder="Sale Price">
                          </div>
                      </div>
                      <div class="col-auto">
                          <button class="btn btn-danger remove-field" type="button">&times;</button>
                      </div>
                  </div>
              `); // Add input fields

                // Update the dynamicColor input when a new color is selected
                let dynamicColorInput = $("#dynamicColor");
                // Get the last added color-select
                lastColorSelect.on("change", function() {
                    let selectedColor = $(this).find("option:selected").val();
                    dynamicColorInput.val(selectedColor);
                });
                // Update the dynamicColor input when a new color is selected
                let dynamicFlavorInput = $("#dynamicFlavor");
                // Get the last added flavor-select
                lastFlavorSelect.on("change", function() {
                    let selectedFlavor = $(this).find("option:selected").val();
                    dynamicFlavorInput.val(selectedFlavor);
                });

                let dynamicSizeInput = $("#dynamicSize");
                let lastSizeSelect = $(".size-select").last(); // Get the last added color-select
                lastSizeSelect.on("change", function() {
                    let selectedSize = $(this).find("option:selected").val();
                    dynamicSizeInput.val(selectedSize);
                });

                let dynamicPurchaseInput = $("#purchasePrice");
                let lastpprice = $(".pprice").last(); // Get the last added pprice input
                lastpprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicPurchaseInput.val(selectedpprice);
                });

                let dynamicSaleInput = $("#salePrice");
                let lastsprice = $(".sprice").last(); // Get the last added pprice input
                lastsprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicSaleInput.val(selectedpprice);
                });


            });

            $(addFlavorWeightButton).click(function(e) {
                e.preventDefault();
                // Toggle visibility of colorSizeWrapper
                $("#flavorWrapper").empty();
                $("#piecesWrapper").empty();
                $("#flavorPiecesWrapper").empty();
                $("#shapeSizeWrapper").empty();
                $("#colorSizeWrapper").empty();
                $(flavorWeightwrapper).append(`
                  <div class="row align-items-end">
                      <div class="col">
                          <div class="form-group">
                              <label>Flavor</label>
                              <select class="form-control form-control-custom flavor-select" name="flavor[]">
                                  <option value="" disabled selected>Select Flavor</option>
                                  @foreach ($flavor as $flavors)
                                      <option value="{{ $flavors->id }}">{{ $flavors->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Weight</label>
                              <select class="form-control form-control-custom weight-select" name="weight[]">
                                  <option value="" disabled selected>Select Weight</option>
                                  @foreach ($weight as $weights)
                                      <option value="{{ $weights->id }}">{{ $weights->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Purchase Price</label>
                              <input type="number" name="purchasePrice[]" class="form-control form-control-custom pprice" placeholder="Purchase Price">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Sale Price</label>
                              <input type="number" name="salePrice[]" class="form-control form-control-custom sprice" placeholder="Sale Price">
                          </div>
                      </div>
                      <div class="col-auto">
                          <button class="btn btn-danger remove-field" type="button">&times;</button>
                      </div>
                  </div>
              `); // Add input fields

                // Update the dynamicColor input when a new color is selected
                let dynamicFlavorInput = $("#dynamicFlavor");
                // Get the last added flavor-select
                lastFlavorSelect.on("change", function() {
                    let selectedFlavor = $(this).find("option:selected").val();
                    dynamicFlavorInput.val(selectedFlavor);
                });

                let dynamicWeightInput = $("#dynamicWeight");
                let lastWeightSelect = $(".weight-select").last(); // Get the last added color-select
                lastWeightSelect.on("change", function() {
                    let selectedWeight = $(this).find("option:selected").val();
                    dynamicWeightInput.val(selectedWeight);
                });

                let dynamicPurchaseInput = $("#purchasePrice");
                let lastpprice = $(".pprice").last(); // Get the last added pprice input
                lastpprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicPurchaseInput.val(selectedpprice);
                });

                let dynamicSaleInput = $("#salePrice");
                let lastsprice = $(".sprice").last(); // Get the last added pprice input
                lastsprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicSaleInput.val(selectedpprice);
                });


            });

            $(addFlavorPiecesButton).click(function(e) {
                e.preventDefault();
                // Toggle visibility of colorSizeWrapper
                $("#flavorWrapper").empty();
                $("#flavorWeightWrapper").empty();
                $("#piecesWrapper").empty();
                $("#shapeSizeWrapper").empty();
                $("#colorSizeWrapper").empty();

                $(flavorPiecesWrapper).append(`
                  <div class="row align-items-end">
                      <div class="col">
                          <div class="form-group">
                              <label>Flavor</label>
                              <select class="form-control form-control-custom flavor-select" name="flavor[]">
                                  <option value="" disabled selected>Select Flavor</option>
                                  @foreach ($flavor as $flavors)
                                      <option value="{{ $flavors->id }}">{{ $flavors->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Pieces</label>
                              <select class="form-control form-control-custom pieces-select" name="pieces[]">
                                  <option value="" disabled selected>Select Pieces</option>
                                  @foreach ($pieces as $piecess)
                                      <option value="{{ $piecess->id }}">{{ $piecess->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Purchase Price</label>
                              <input type="number" name="purchasePrice[]" class="form-control form-control-custom pprice" placeholder="Purchase Price">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Sale Price</label>
                              <input type="number" name="salePrice[]" class="form-control form-control-custom sprice" placeholder="Sale Price">
                          </div>
                      </div>
                      <div class="col-auto">
                          <button class="btn btn-danger remove-field" type="button">&times;</button>
                      </div>
                  </div>
              `); // Add input fields

                // Update the dynamicColor input when a new color is selected
                let dynamicFlavorInput = $("#dynamicFlavor");
                // Get the last added flavor-select
                lastFlavorSelect.on("change", function() {
                    let selectedFlavor = $(this).find("option:selected").val();
                    dynamicFlavorInput.val(selectedFlavor);
                });

                let dynamicPiecesInput = $("#dynamicPieces");
                let lastPiecesSelect = $(".pieces-select").last(); // Get the last added color-select
                lastPiecesSelect.on("change", function() {
                    let selectedPieces = $(this).find("option:selected").val();
                    dynamicPiecesInput.val(selectedPieces);
                });

                let dynamicPurchaseInput = $("#purchasePrice");
                let lastpprice = $(".pprice").last(); // Get the last added pprice input
                lastpprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicPurchaseInput.val(selectedpprice);
                });

                let dynamicSaleInput = $("#salePrice");
                let lastsprice = $(".sprice").last(); // Get the last added pprice input
                lastsprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicSaleInput.val(selectedpprice);
                });


            });

            $(addShapeSizeButton).click(function(e) {
                e.preventDefault();
                // Toggle visibility of colorSizeWrapper
                $("#flavorWrapper").empty();
                $("#flavorWeightWrapper").empty();
                $("#piecesWrapper").empty();
                $("#flavorPiecesWrapper").empty();
                $("#colorSizeWrapper").empty();

                $(shapeSizeWrapper).append(`
                  <div class="row align-items-end">
                      <div class="col">
                          <div class="form-group">
                              <label>Shape</label>
                              <select class="form-control form-control-custom shape-select" name="shape[]">
                                  <option value="" disabled selected>Select Shape</option>
                                  @foreach ($shape as $shapes)
                                      <option value="{{ $shapes->id }}">{{ $shapes->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Size</label>
                              <select class="form-control form-control-custom size-select" name="size[]">
                                  <option value="" disabled selected>Select Size</option>
                                  @foreach ($size as $sizes)
                                      <option value="{{ $sizes->id }}">{{ $sizes->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Purchase Price</label>
                              <input type="number" name="purchasePrice[]" class="form-control form-control-custom pprice" placeholder="Purchase Price">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Sale Price</label>
                              <input type="number" name="salePrice[]" class="form-control form-control-custom sprice" placeholder="Sale Price">
                          </div>
                      </div>
                      <div class="col-auto">
                          <button class="btn btn-danger remove-field" type="button">&times;</button>
                      </div>
                  </div>
              `); // Add input fields

                // Update the dynamicColor input when a new color is selected
                let dynamicShapeInput = $("#dynamicShape");
                // Get the last added shape-select
                lastShapeSelect.on("change", function() {
                    let selectedShape = $(this).find("option:selected").val();
                    dynamicShapeInput.val(selectedShape);
                });

                let dynamicSizeInput = $("#dynamicSize");
                let lastSizeSelect = $(".size-select").last(); // Get the last added color-select
                lastSizeSelect.on("change", function() {
                    let selectedSize = $(this).find("option:selected").val();
                    dynamicSizeInput.val(selectedSize);
                });

                let dynamicPurchaseInput = $("#purchasePrice");
                let lastpprice = $(".pprice").last(); // Get the last added pprice input
                lastpprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicPurchaseInput.val(selectedpprice);
                });

                let dynamicSaleInput = $("#salePrice");
                let lastsprice = $(".sprice").last(); // Get the last added pprice input
                lastsprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicSaleInput.val(selectedpprice);
                });


            });

            $(addPiecesButton).click(function(e) {
                e.preventDefault();
                // Toggle visibility of colorSizeWrapper
                $("#flavorWrapper").empty();
                $("#flavorWeightWrapper").empty();
                $("#flavorPiecesWrapper").empty();
                $("#shapeSizeWrapper").empty();
                $("#colorSizeWrapper").empty();
                $(piecesWrapper).append(`
                  <div class="row align-items-end">

                      <div class="col">
                          <div class="form-group">
                              <label>Pieces</label>
                              <select class="form-control form-control-custom pieces-select" name="pieces[]">
                                  <option value="" disabled selected>Select Pieces</option>
                                  @foreach ($pieces as $piecess)
                                      <option value="{{ $piecess->id }}">{{ $piecess->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Purchase Price</label>
                              <input type="number" name="purchasePrice[]" class="form-control form-control-custom pprice" placeholder="Purchase Price">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Sale Price</label>
                              <input type="number" name="salePrice[]" class="form-control form-control-custom sprice" placeholder="Sale Price">
                          </div>
                      </div>
                      <div class="col-auto">
                          <button class="btn btn-danger remove-field" type="button">&times;</button>
                      </div>
                  </div>
              `); // Add input fields

                // Update the dynamicColor input when a new color is selected
                let dynamicColorInput = $("#dynamicColor");
                // Get the last added color-select
                lastColorSelect.on("change", function() {
                    let selectedColor = $(this).find("option:selected").val();
                    dynamicColorInput.val(selectedColor);
                });
                // Update the dynamicColor input when a new color is selected
                let dynamicPiecesInput = $("#dynamicPieces");
                // Get the last added pieces-select
                lastPiecesSelect.on("change", function() {
                    let selectedPieces = $(this).find("option:selected").val();
                    dynamicPiecesInput.val(selectedPieces);
                });

                let dynamicSizeInput = $("#dynamicSize");
                let lastSizeSelect = $(".size-select").last(); // Get the last added color-select
                lastSizeSelect.on("change", function() {
                    let selectedSize = $(this).find("option:selected").val();
                    dynamicSizeInput.val(selectedSize);
                });

                let dynamicPurchaseInput = $("#purchasePrice");
                let lastpprice = $(".pprice").last(); // Get the last added pprice input
                lastpprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicPurchaseInput.val(selectedpprice);
                });

                let dynamicSaleInput = $("#salePrice");
                let lastsprice = $(".sprice").last(); // Get the last added pprice input
                lastsprice.on("input", function() {
                    let selectedpprice = $(this).val();
                    dynamicSaleInput.val(selectedpprice);
                });


            });

            $(wrapper).on("click", ".remove-field", function(e) {
                e.preventDefault();
                $("#dynamicFlavor").val('');
                $("#dynamicPieces").val('');
                $("#dynamicColor").val('');
                $("#dynamicShape").val('');
                $("#dynamicWeight").val('');
                $("#dynamicSize").val('');
                $("#purchasePrice").val('');
                $("#salePrice").val('');
                $(this).parent().parent().remove();
            });
            $(flavorwrapper).on("click", ".remove-field", function(e) {
                e.preventDefault();
                $("#dynamicFlavor").val('');
                $("#dynamicPieces").val('');
                $("#dynamicColor").val('');
                $("#dynamicShape").val('');
                $("#dynamicWeight").val('');
                $("#dynamicSize").val('');
                $("#purchasePrice").val('');
                $("#salePrice").val('');
                $(this).parent().parent().remove();
            });
            $(flavorWeightwrapper).on("click", ".remove-field", function(e) {
                e.preventDefault();
                $("#dynamicFlavor").val('');
                $("#dynamicPieces").val('');
                $("#dynamicColor").val('');
                $("#dynamicShape").val('');
                $("#dynamicWeight").val('');
                $("#dynamicSize").val('');
                $("#purchasePrice").val('');
                $("#salePrice").val('');
                $(this).parent().parent().remove();
            });
            $(flavorPiecesWrapper).on("click", ".remove-field", function(e) {
                e.preventDefault();
                $("#dynamicFlavor").val('');
                $("#dynamicPieces").val('');
                $("#dynamicColor").val('');
                $("#dynamicShape").val('');
                $("#dynamicWeight").val('');
                $("#dynamicSize").val('');
                $("#purchasePrice").val('');
                $("#salePrice").val('');
                $(this).parent().parent().remove();
            });

            $(shapeSizeWrapper).on("click", ".remove-field", function(e) {
                e.preventDefault();
                $("#dynamicFlavor").val('');
                $("#dynamicPieces").val('');
                $("#dynamicColor").val('');
                $("#dynamicShape").val('');
                $("#dynamicWeight").val('');
                $("#dynamicSize").val('');
                $("#purchasePrice").val('');
                $("#salePrice").val('');
                $(this).parent().parent().remove();
            });

            $(piecesWrapper).on("click", ".remove-field", function(e) {
                e.preventDefault();
                $("#dynamicFlavor").val('');
                $("#dynamicPieces").val('');
                $("#dynamicColor").val('');
                $("#dynamicShape").val('');
                $("#dynamicWeight").val('');
                $("#dynamicSize").val('');
                $("#purchasePrice").val('');
                $("#salePrice").val('');
                $(this).parent().parent().remove();
            });




        });
    </script>
@endsection
