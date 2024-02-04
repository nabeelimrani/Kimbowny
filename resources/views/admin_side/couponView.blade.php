@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>View Coupon - Kimbowny</title>
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
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-ticket-alt"></i>&nbsp;View Coupon</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">View Coupon
                                </li>
                            </ol>
                            <a href="{{ route('admin.coupon.index') }}" class="btn btn-info">Add Coupon</a>
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
                                    style="font-size: 1.5em; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">Coupon Table
                                </h3>

                            </div>

                            <div class="card-body table-responsive p-2" style="background-color: #f8f9fa;">
                                <table id="example" class="table table-hover table-striped text-nowrap">
                                    <thead style="background-color: #007bff9a; color: #fff;">
                                        <tr>
                                            <th class="text-center">S.NO</th>
                                            <th class="text-center">Code</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (isset($coupon))
                                            @foreach ($coupon as $index => $coupondata)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $coupondata->code }}</td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $coupondata->discount }}</td>




                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                data-toggle="modal"
                                                                data-target="#editModal{{ $coupondata->id }}">
                                                                <i class="fa fa-edit" style="font-size: 1.2em;"></i>
                                                            </button>&nbsp;&nbsp;
                                                            <button class="btn btn-sm btn-outline-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $coupondata->id }}">
                                                                <i class="fa fa-trash" style="font-size: 1.2em;"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $coupondata->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fa fa-trash"></i>&nbsp;Delete
                                                                    Coupon</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Coupon?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.coupon.del', ['id' => $coupondata->id]) }}"
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
                                                <div class="modal fade" id="editModal{{ $coupondata->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="editAreaModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editAreaModalLabel"><i
                                                                        class="fa fa-edit"></i>&nbsp;Edit
                                                                    Coupon</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('admin.coupon.edit', ['id' => $coupondata->id]) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text icon"><i
                                                                                        class="fas fa-code"></i></span>
                                                                            </div>
                                                                            <input type="text" name="code" required
                                                                                class="form-control @error('code') is-invalid @enderror"
                                                                                value="{{ $coupondata->code }}">
                                                                        </div>
                                                                        @error('code')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text icon"><i
                                                                                        class="fas fa-percentage"></i></span>
                                                                            </div>
                                                                            <input type="text" name="discount" required
                                                                                class="form-control @error('discount') is-invalid @enderror"
                                                                                value="{{ $coupondata->discount }}">
                                                                        </div>
                                                                        @error('discount')
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


@endsection
