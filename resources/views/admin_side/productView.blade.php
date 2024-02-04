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
                                                            <div class="modal-header">
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
                                                    <div class="modal-dialog modal-lg" role="document">
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
    <script>
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
