@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>View Product - Kimbowny</title>
    @endpush
    <style>
        .btn-outline-primary:hover .fa-edit {
            color: #fff;
        }

        .btn-outline-danger:hover .fa-trash {
            color: #fff;
        }

        .custom-select:focus {
            outline: none;
            box-shadow: none;
        }

        /* Optional: If you want to hide the dropdown arrow */
        .custom-select::-ms-expand {
            display: none;
        }

        .custom-select::-webkit-scrollbar {
            display: none;
        }

        /* For browsers that do not support custom appearance */
        .custom-select {
            text-indent: 0.01px;
            /* Remove indent */
            text-overflow: '';
            /* Prevent text wrapping */
        }

        .btn-awesome {
            background-color: #007bff;
            /* Bootstrap primary color */
            border-color: #007bff;
            color: white;
        }

        .btn-awesome:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
            transition: background-color 0.5s, color 0.5s;
        }

        .btn-awesome i {
            margin-right: 5px;
            transition: transform 0.5s;
        }

        .btn-awesome:hover i {
            transform: scale(1.1);
        }

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

        .btncustom {
            width: 100%;
            /* Make buttons take the full width of the column */
            margin-bottom: 5px;
            /* Space below buttons */
            border-radius: 25px;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-box"></i>&nbsp;View Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">View Product
                                </li>
                            </ol>
                            <a href="{{ route('admin.product.index') }}" class="btn btn-info">Add Product</a>
                        </div>
                    </div>
                </div>
        </section>




        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header sticky" style="background-color: #007bff; color: #fff;">
                                <h3 class="card-title"
                                    style="font-size: 1.5em; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">Product Table
                                </h3>

                            </div>

                            <div class="card-body table-responsive p-2" style="background-color: #f8f9fa;">
                                <table id="example" class="table table-hover table-striped text-nowrap">
                                    <thead style="background-color: #007bff9a; color: #fff;">
                                        <tr>
                                            <th class="text-center">S.NO</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Sale</th>
                                            <th class="text-center">Feature</th>
                                            <th class="text-center">Purchase</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Pet</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Show Image</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (isset($product))
                                            @foreach ($product as $index => $productdata)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $productdata->name }}</td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $productdata->quantity }}</td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $productdata->sale }}</td>


                                                    <td class="text-center" style="font-family: monospace; padding: 0; ">
                                                        <div
                                                            style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100%;">
                                                            <select onchange="changeFeature(this, {{ $productdata->id }})"
                                                                class="form-control custom-select"
                                                                style="border: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent; text-align-last: center; width: 100%;">
                                                                <option value="1"
                                                                    {{ $productdata->feature == '1' ? 'selected' : '' }}>
                                                                    Show
                                                                </option>
                                                                <option value="0"
                                                                    {{ $productdata->feature == '0' ? 'selected' : '' }}>
                                                                    Hide
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </td>


                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $productdata->purchase }}</td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $productdata->category->name }}</td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $productdata->pet->name }}</td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $productdata->discount }}%</td>
                                                    <td class="text-center" style="font-family: monospace;"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="{{ $productdata->description }}">
                                                        {{ Str::limit($productdata->description, 10) }}

                                                    </td>
                                                    <td class="text-center">
                                                        @if ($productdata->photo)
                                                            @php
                                                                $imageNames = unserialize($productdata->photo);
                                                            @endphp

                                                            @if (is_array($imageNames) && count($imageNames) > 1)
                                                                @foreach ($imageNames as $imageName)
                                                                    <img src="{{ asset('storage/product_images/' . $imageName) }}"
                                                                        alt="{{ $productdata->name }}" width="50"
                                                                        style="border-radius: 10px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.15); margin-right: 5px;">
                                                                @endforeach
                                                            @else
                                                                <img src="{{ asset('storage/product_images/' . ($imageNames[0] ?? '')) }}"
                                                                    alt="{{ $productdata->name }}" width="50"
                                                                    style="border-radius: 10px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);">
                                                            @endif
                                                        @else
                                                            <span>No Image Available</span>
                                                        @endif
                                                    </td>


                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-sm btn-awesome" data-toggle="modal"
                                                                data-target="#showImgModal{{ $productdata->id }}">
                                                                <i class="fa fa-image" style="font-size: 1.2em;">&nbsp;Show
                                                                    Image</i>
                                                            </button>
                                                        </div>
                                                    </td>

                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                data-toggle="modal"
                                                                data-target="#editModal{{ $productdata->id }}">
                                                                <i class="fa fa-edit" style="font-size: 1.2em;"></i>
                                                            </button>&nbsp;&nbsp;
                                                            <button class="btn btn-sm btn-outline-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $productdata->id }}">
                                                                <i class="fa fa-trash" style="font-size: 1.2em;"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Show Img Modal -->
                                                <div class="modal fade" id="showImgModal{{ $productdata->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header ">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fa fa-image"></i>&nbsp;Show Image
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label>Product ID: <b
                                                                        style="font-size: 22px;">{{ $productdata->id }}</b></label>
                                                                @if ($productdata->photo)
                                                                    @php
                                                                        $imageNames = unserialize($productdata->photo);
                                                                    @endphp

                                                                    @if (is_array($imageNames) && count($imageNames) > 1)
                                                                        @foreach ($imageNames as $imageName)
                                                                            <img src="{{ asset('storage/product_images/' . $imageName) }}"
                                                                                alt="{{ $productdata->name }}"
                                                                                width="50"
                                                                                style="border-radius: 10px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.15); margin-right: 5px;">
                                                                        @endforeach
                                                                    @else
                                                                        <img src="{{ asset('storage/product_images/' . ($imageNames[0] ?? '')) }}"
                                                                            alt="{{ $productdata->name }}" width="50"
                                                                            style="border-radius: 10px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);">
                                                                    @endif
                                                                @else
                                                                    <span>No Image Available</span>
                                                                @endif
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $productdata->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fa fa-trash"></i>&nbsp;Delete
                                                                    Product</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Product?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.product.del', ['id' => $productdata->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Edit Area Modal -->
                                                <div class="modal fade" id="editModal{{ $productdata->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="editAreaModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editAreaModalLabel"><i
                                                                        class="fa fa-edit"></i>&nbsp;Edit
                                                                    Product</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('admin.product.edit', ['id' => $productdata->id]) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon"><i
                                                                                                class="fas fa-pen"></i></span>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                        name="productname" required
                                                                                        class="form-control @error('productname') is-invalid @enderror"
                                                                                        placeholder="Product Name..."
                                                                                        value="{{ $productdata->name }}">
                                                                                </div>
                                                                                @error('productname')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon"><i
                                                                                                class="fas fa-cubes"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="number"
                                                                                        name="productquantity" required
                                                                                        class="form-control @error('productquantity') is-invalid @enderror"
                                                                                        placeholder="Product Quantity..."
                                                                                        value="{{ $productdata->quantity }}">
                                                                                </div>
                                                                                @error('productquantity')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon"><i
                                                                                                class="fas fa-tags"></i></span>
                                                                                    </div>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="sale" name="sale"
                                                                                        value="{{ $productdata->sale }}"
                                                                                        required
                                                                                        placeholder="Enter Sale...">
                                                                                </div>
                                                                            </div>
                                                                            @error('sale')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon"><i
                                                                                                class="fas fa-shopping-cart"></i>

                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="purchase" required
                                                                                        name="purchase"
                                                                                        placeholder="Enter Purchase..."
                                                                                        value="{{ $productdata->purchase }}">
                                                                                </div>
                                                                            </div>
                                                                            @error('purchase')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror

                                                                        </div>


                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon">
                                                                                            <i
                                                                                                class="fas fa-layer-group"></i>
                                                                                            <!-- Changed icon to 'fa-tags' for category context -->
                                                                                        </span>
                                                                                    </div>
                                                                                    <select class="form-control"
                                                                                        id="categorySelect"
                                                                                        name="category" required>
                                                                                        <option value="" disabled
                                                                                            selected>Select Category...
                                                                                        </option>
                                                                                        @foreach ($categories as $category)
                                                                                            <option
                                                                                                value="{{ $category->id }}"
                                                                                                {{ $productdata->category_id == $category->id ? 'selected' : '' }}>
                                                                                                {{ $category->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            @error('category')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror


                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon">
                                                                                            <i class="fas fa-paw"></i>
                                                                                            <!-- Changed icon to 'fa-paw' for pet context -->
                                                                                        </span>
                                                                                    </div>
                                                                                    <select class="form-control"
                                                                                        id="petSelect" name="pet"
                                                                                        required>
                                                                                        <option value="" disabled>
                                                                                            Select Pet...</option>
                                                                                        @foreach ($pets as $pet)
                                                                                            <option
                                                                                                value="{{ $pet->id }}"
                                                                                                {{ $productdata->pet_id == $pet->id ? 'selected' : '' }}>
                                                                                                {{ $pet->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            @error('pet')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror


                                                                        </div>


                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon"><i
                                                                                                class="fas fa-percentage"></i></span>
                                                                                    </div>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="productdiscount"
                                                                                        name="productdiscount" required
                                                                                        placeholder="Enter Discount..."
                                                                                        value="{{ $productdata->discount }}">
                                                                                </div>
                                                                            </div>
                                                                            @error('productdiscount')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon">
                                                                                            <i class="fas fa-star"></i>
                                                                                            <!-- Changed icon to 'fa-tags' for category context -->
                                                                                        </span>
                                                                                    </div>
                                                                                    <select
                                                                                        onchange="changeFeature(this, {{ $productdata->id }})"
                                                                                        class="form-control custom-select"
                                                                                        style="border: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent; text-align-last: center; width: 100%;">
                                                                                        <option value="1"
                                                                                            {{ $productdata->feature == '1' ? 'selected' : '' }}>
                                                                                            Show
                                                                                        </option>
                                                                                        <option value="0"
                                                                                            {{ $productdata->feature == '0' ? 'selected' : '' }}>
                                                                                            Hide
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            @error('feature')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror

                                                                        </div>


                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text icon"><i
                                                                                        class="fas fa-image"></i></span>
                                                                            </div>
                                                                            <div class="custom-file">
                                                                                <input type="file"
                                                                                    class="form-control @error('productimage') is-invalid @enderror"
                                                                                    id="image" name="productimage">
                                                                                <label class="custom-file-label"
                                                                                    for="image">{{ $productdata->photo ? basename($productdata->photo) : 'Choose file' }}</label>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <!-- Dynamic fields for color, size, Price price, and sale price selection -->
                                                                    <div class="form-group" hidden>
                                                                        <label for="dynamicColor">Color</label>
                                                                        <input type="text" id="dynamicColor"
                                                                            name="color[]" class="form-control">
                                                                    </div>

                                                                    <div class="form-group" hidden>
                                                                        <label for="dynamicSize">Size</label>
                                                                        <input type="text" id="dynamicSize"
                                                                            name="size[]" class="form-control">
                                                                    </div>
                                                                    <div class="form-group" hidden>
                                                                        <label for="dynamicWeight">Weight</label>
                                                                        <input type="text" id="dynamicWeight"
                                                                            name="weight[]" class="form-control">
                                                                    </div>
                                                                    <div class="form-group" hidden>
                                                                        <label for="dynamicFlavor">Flavor</label>
                                                                        <input type="text" id="dynamicFlavor"
                                                                            name="flavor[]" class="form-control">
                                                                    </div>
                                                                    <div class="form-group" hidden>
                                                                        <label for="dynamicShape">Shape</label>
                                                                        <input type="text" id="dynamicShape"
                                                                            name="shape[]" class="form-control">
                                                                    </div>
                                                                    <div class="form-group" hidden>
                                                                        <label for="dynamicPieces">Pieces</label>
                                                                        <input type="text" id="dynamicPieces"
                                                                            name="pieces[]" class="form-control">
                                                                    </div>

                                                                    <div class="form-group" hidden>
                                                                        <label for="purchasePrice">Purchase Price</label>
                                                                        <input type="number" id="purchasePrice"
                                                                            name="purchase[]" class="form-control">
                                                                    </div>

                                                                    <div class="form-group" hidden>
                                                                        <label for="salePrice">Sale Price</label>
                                                                        <input type="number" id="salePrice"
                                                                            name="sale[]" class="form-control">
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
                                                                                <button type="button" id="addFlavor"
                                                                                    class="btn btn-info btncustom">Add
                                                                                    Flavor</button>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button type="button"
                                                                                    id="addFlavorWeight"
                                                                                    class="btn btn-info btncustom">Add
                                                                                    Flavor/Weight</button>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button type="button"
                                                                                    id="addFlavorPieces"
                                                                                    class="btn btn-info btncustom">Add
                                                                                    Flavor/Pieces</button>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button type="button" id="addShapeSize"
                                                                                    class="btn btn-info btncustom">Add
                                                                                    Shape/Size</button>

                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button type="button" id="addPieces"
                                                                                    class="btn btn-info btncustom">Add
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

                                                                            <textarea id="description" name="productdescription" required
                                                                                class="form-control @error('productdescription') is-invalid @enderror" placeholder="Product Description ...">{!! $productdata->description !!}</textarea>


                                                                        </div>
                                                                        @error('productdescription')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>






                                                                    <!-- Add any other form fields for editing here -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

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
            // Function jo form fields ko add karega


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

        function changeFeature(selectElement, featureId) {
            var feature = selectElement.value;



            // Perform form submission using AJAX
            $.ajax({
                url: '{{ route('admin.product.feature.update') }}',
                method: 'GET',
                data: {
                    id: featureId,
                    feature: feature
                },
                success: function(response) {
                    // Assuming you're using SweetAlert2 for the Toast
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    // Show success toast
                    Toast.fire({
                        icon: 'success',
                        title: response.success
                    });
                },
                error: function(xhr, status, error) {
                    // Show error toast
                    Toast.fire({
                        icon: 'error',
                        title: 'Error! Updating Product Feature'
                    });
                }
            });

        }
    </script>

@endsection
