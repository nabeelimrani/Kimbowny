@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>Pending Order - Kimbowny</title>
    @endpush
    <style>
        .btn-outline-primary:hover .fa-edit {
            color: #fff;
        }

        .btn-outline-danger:hover .fa-trash {
            color: #fff;
        }

        .pagination {
            display: flex;
            justify-content: center;

        }

        .pagination .page-item {
            margin: 0 4px;
        }

        .pagination .page-link {
            color: #007bff;
            background-color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination .page-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination .active .page-link {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .product-details {
            display: table;
            width: 100%;
        }

        .product-header,
        .product-item {
            display: table-row;
        }

        .product-property,
        .product-value {
            display: table-cell;
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .product-header .product-property {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-clipboard-list"></i>&nbsp;Pending Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('admin.orders.pending') }}">Pending
                                        Orders</a>
                                </li>
                            </ol>

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
                                    style="font-size: 1.5em; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">Pending Orders
                                </h3>

                            </div>
                            <div class="card-body table-responsive p-2" style="background-color: #f8f9fa;">
                                <table id="example" class="table table-hover table-striped text-nowrap">
                                    <thead style="background-color: #007bff9a; color: #fff;">
                                        <tr>
                                            <th class="text-center">S.NO</th>
                                            <th class="text-center">Customer Name</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($pendingOrder))
                                            @foreach ($pendingOrder as $index => $pendingorderdata)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ ($pendingOrder->currentPage() - 1) * $pendingOrder->perPage() + $index + 1 }}
                                                    </td>

                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $pendingorderdata->user->firstname }}</td>
                                                    <td class="text-center">
                                                        {{ number_format($pendingorderdata->bill) }} AED
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($pendingorderdata->status == 0)
                                                            <span class="badge badge-danger">Pending</span>
                                                        @endif
                                                    </td>


                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                data-toggle="modal"
                                                                data-target="#detailModal{{ $pendingorderdata->id }}">
                                                                <i class="fa fa-info-circle" style="font-size: 1.2em;"></i>
                                                            </button>&nbsp;&nbsp;
                                                            <button class="btn btn-sm btn-outline-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $pendingorderdata->id }}">
                                                                <i class="fa fa-trash" style="font-size: 1.2em;"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $pendingorderdata->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fa fa-trash"></i>&nbsp;Delete
                                                                    Order</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Order?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.orders.delete', ['id' => $pendingorderdata->id]) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Order Detail Modal -->
                                                <div class="modal fade" id="detailModal{{ $pendingorderdata->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="detailAreaModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailAreaModalLabel"><i
                                                                        class="fas fa-clipboard"></i>&nbsp;Order Detail</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <!-- Left side with 4 columns -->
                                                                    <!-- Left side with 5 columns -->
                                                                    <div class="col-md-4">
                                                                        <div class="card" style="height:100%;">
                                                                            <div class="card-header">
                                                                                <h5 class="card-title"><i
                                                                                        class="fas fa-user-circle"></i>
                                                                                    Customer Detail</h5>
                                                                            </div>

                                                                            <div class="card-body">
                                                                                <p><strong>Name:</strong>
                                                                                    {{ $pendingorderdata->user->firstname }}
                                                                                    {{ $pendingorderdata->user->lastname }}
                                                                                </p>
                                                                                <p><strong>Email:</strong>
                                                                                    {{ $pendingorderdata->user->email }}
                                                                                </p>
                                                                                <p><strong>Phone:</strong>
                                                                                    {{ $pendingorderdata->user->phone }}
                                                                                </p>
                                                                                <p><strong>Address:</strong>
                                                                                    {{ $pendingorderdata->user->address }}
                                                                                </p>
                                                                                <p><strong>City:</strong>
                                                                                    {{ $pendingorderdata->user->city }}
                                                                                </p>
                                                                                <p><strong>Country:</strong>
                                                                                    {{ $pendingorderdata->user->country }}
                                                                                </p>
                                                                                <p><strong>Zip Code:</strong>
                                                                                    {{ $pendingorderdata->user->zipcode }}
                                                                                </p>

                                                                                <!-- Add other details for the card here -->
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- Right side with the rest of the columns -->
                                                                    <div class="col-md-8">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h5 class="card-title"><i
                                                                                        class="fas fa-box"></i> Product
                                                                                    Detail</h5>
                                                                            </div>

                                                                            <div class="card-body">
                                                                                <!-- Product Details -->
                                                                                <div class="product-details">
                                                                                    <!-- Header -->
                                                                                    <div class="product-header">
                                                                                        <div
                                                                                            class="product-property text-center">
                                                                                            Product</div>
                                                                                        <div
                                                                                            class="product-property text-center">
                                                                                            Quantity</div>
                                                                                        <div
                                                                                            class="product-property text-center">
                                                                                            Price
                                                                                        </div>
                                                                                        <div
                                                                                            class="product-property text-center">
                                                                                            Total
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Product Item -->
                                                                                    @foreach ($pendingorderdata->products as $product)
                                                                                        <div class="product-item">
                                                                                            <div
                                                                                                class="product-value text-center">
                                                                                                {{ $product->name }}</div>
                                                                                            <div
                                                                                                class="product-value text-center">
                                                                                                {{ $product->quantity }}
                                                                                            </div>
                                                                                            <div
                                                                                                class="product-value text-center">
                                                                                                {{ $product->price }}</div>
                                                                                            <div
                                                                                                class="product-value text-center">
                                                                                                {{ $product->total }}
                                                                                            </div>
                                                                                            <!-- Corrected total from 365 to 330 assuming a mistake -->
                                                                                        </div>
                                                                                    @endforeach
                                                                                    <!-- Add more product items here -->
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h5 class="card-title"><i
                                                                                        class="fas fa-sync"></i>&nbsp;Update
                                                                                    Status</h5>
                                                                            </div>


                                                                            <div class="card-body">
                                                                                <form
                                                                                    action="{{ route('admin.updateorder') }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <!-- Courier ID Input Field -->

                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">

                                                                                                <div class="input-group">
                                                                                                    <div
                                                                                                        class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text icon"><i
                                                                                                                class="fas fa-building"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="companyname"
                                                                                                        name="companyname"
                                                                                                        placeholder="Enter Company Name">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">

                                                                                                <div class="input-group">
                                                                                                    <div
                                                                                                        class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text icon"><i
                                                                                                                class="fas fa-link"></i></span>
                                                                                                    </div>
                                                                                                    <input type="url"
                                                                                                        class="form-control"
                                                                                                        id="companylink"
                                                                                                        name="companylink"
                                                                                                        placeholder="Enter Company Link">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">

                                                                                                <div class="input-group">
                                                                                                    <div
                                                                                                        class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text icon"><i
                                                                                                                class="fas fa-truck"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="courierId"
                                                                                                        name="courierId"
                                                                                                        placeholder="Enter Courier ID">
                                                                                                    <input type="hidden"
                                                                                                        class="form-control"
                                                                                                        id="orderid"
                                                                                                        name="orderid"
                                                                                                        value="{{ $pendingorderdata->id }}">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <!-- Select Status Dropdown -->
                                                                                            <div class="form-group">

                                                                                                <div class="input-group">
                                                                                                    <div
                                                                                                        class="input-group-prepend">
                                                                                                        <span
                                                                                                            class="input-group-text icon"><i
                                                                                                                class="fas fa-tasks"></i></span>
                                                                                                    </div>
                                                                                                    <select
                                                                                                        class="form-control"
                                                                                                        id="status"
                                                                                                        name="status">
                                                                                                        <option
                                                                                                            value="0">
                                                                                                            Pending</option>
                                                                                                        <option
                                                                                                            value="1">
                                                                                                            Completed
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Update Button -->
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Update</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- Add additional details for the right side here -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#alert").animate({
                    opacity: 0,
                    height: 0,
                    padding: 0
                }, 1000, function() {
                    $(this).hide();
                });
            }, 1000);
            $('#example').DataTable();
        });
    </script>
@endsection
