@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>Add Shape - Kimbowny</title>
    @endpush
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-plus"></i>&nbsp;Add Shape</h1>


                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Shape</li>
                            </ol>
                            <a href="{{ route('admin.shape.show') }}" class="btn btn-submit">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card">
                            <div class="card-header"
                                style="background: linear-gradient(to right, rgba(0, 123, 255, 0.7), rgba(0, 86, 179, 0.7)); color: rgba(255, 255, 255, 0.9); font-size: 1.8em; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">
                                <h3 class="card-title" style="font-size: 0.8em;">Add Shape</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.shape.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text icon"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input type="text" name="shapename"
                                                class="form-control @error('shapename') is-invalid @enderror"
                                                placeholder="Shape Name..." value="{{ old('shapename') }}">
                                        </div>
                                        @error('shapename')
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
