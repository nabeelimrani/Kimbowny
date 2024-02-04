@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>Add Product - Kimbowny</title>
    @endpush
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
                                                        <span class="input-group-text icon"><i
                                                                class="fas fa-tags"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" id="sale" name="sale"
                                                        required placeholder="Enter Sale...">
                                                </div>
                                            </div>
                                            @error('sale')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon"><i
                                                                class="fas fa-shopping-cart"></i>

                                                        </span>
                                                    </div>
                                                    <input type="number" class="form-control" id="purchase" required
                                                        name="purchase" placeholder="Enter Purchase...">
                                                </div>
                                            </div>
                                            @error('purchase')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

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
                                                    <select class="form-control" id="featureSelect" name="feature"
                                                        required>
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
@endsection
