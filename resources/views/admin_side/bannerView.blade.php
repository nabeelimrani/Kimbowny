@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>View Banners - Kimbowny</title>
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
                        <h1><i class="fas fa-image"></i>&nbsp;View Banner</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">View Banner
                                </li>
                            </ol>
                            <a href="{{ route('admin.banner.index') }}" class="btn btn-info">Add Banners</a>
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
                                    style="font-size: 1.5em; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">Banner Table</h3>

                            </div>

                            <div class="card-body table-responsive p-2" style="background-color: #f8f9fa;">
                                <table id="example" class="table table-hover table-striped text-nowrap">
                                    <thead style="background-color: #007bff9a; color: #fff;">
                                        <tr>
                                            <th class="text-center">S.NO</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Promo Code</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (isset($banner))
                                            @foreach ($banner as $index => $bannerdata)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $bannerdata->title }}</td>
                                                    <td class="text-center" style="font-family: monospace;"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="{{ $bannerdata->description }}">
                                                        {{ Str::limit($bannerdata->description, 30) }}

                                                    </td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $bannerdata->promo_code }}</td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $bannerdata->discount }}%</td>
                                                    <td class="text-center">
                                                        <img src="{{ asset('storage/banner_images/' . $bannerdata->image) }}"
                                                            alt="{{ $bannerdata->title }}" width="50"
                                                            style="border-radius: 10px; box-shadow: 0 0 5px rgba(0, 0, 0, 1);">
                                                    </td>


                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                data-toggle="modal"
                                                                data-target="#editModal{{ $bannerdata->id }}">
                                                                <i class="fa fa-edit" style="font-size: 1.2em;"></i>
                                                            </button>&nbsp;&nbsp;
                                                            <button class="btn btn-sm btn-outline-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $bannerdata->id }}">
                                                                <i class="fa fa-trash" style="font-size: 1.2em;"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $bannerdata->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fa fa-trash"></i>&nbsp;Delete
                                                                    Banner</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Banner?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.banner.del', ['id' => $bannerdata->id]) }}"
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
                                                <div class="modal fade" id="editModal{{ $bannerdata->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="editAreaModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editAreaModalLabel"><i
                                                                        class="fa fa-edit"></i>&nbsp;Edit
                                                                    Banner</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('admin.banner.edit', ['id' => $bannerdata->id]) }}"
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
                                                                                    <input type="text" required
                                                                                        name="bannertitle"
                                                                                        class="form-control @error('bannertitle') is-invalid @enderror"
                                                                                        value="{{ $bannerdata->title }}">
                                                                                </div>
                                                                                @error('bannertitle')
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
                                                                                                class="fas fa-percent"></i></span>
                                                                                    </div>
                                                                                    <input type="number" required
                                                                                        name="bannerdiscount"
                                                                                        class="form-control @error('bannerdiscount') is-invalid @enderror"
                                                                                        value="{{ $bannerdata->discount }}">
                                                                                </div>
                                                                                @error('bannerdiscount')
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
                                                                                                class="fas fa-ticket-alt"></i></span>
                                                                                    </div>
                                                                                    <input type="text" name="promoCode"
                                                                                        required class="form-control"
                                                                                        value="{{ $bannerdata->promo_code }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">

                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span
                                                                                            class="input-group-text icon"><i
                                                                                                class="fas fa-image"></i></span>
                                                                                    </div>
                                                                                    <div class="custom-file">
                                                                                        <input type="file"
                                                                                            class="form-control @error('bannerimage') is-invalid @enderror"
                                                                                            id="bannerimage"
                                                                                            name="bannerimage">
                                                                                        <label class="custom-file-label"
                                                                                            for="bannerimage">{{ $bannerdata->image ? basename($bannerdata->image) : 'Choose file' }}</label>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <textarea id="description" name="bannerdescription" required
                                                                                class="form-control @error('bannerdescription') is-invalid @enderror" placeholder="Banner Description ...">{!! $bannerdata->description !!}</textarea>


                                                                        </div>
                                                                        @error('bannerdescription')
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
