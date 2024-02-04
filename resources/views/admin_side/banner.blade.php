@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>Add Banners - Kimbowny</title>
    @endpush
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-image"></i>&nbsp;Add Banners</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Banners</li>
                            </ol>
                            <a href="{{ route('admin.banner.show') }}" class="btn btn-submit">View</a>
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
                                <h3 class="card-title" style="font-size: 0.8em;">Add Banner</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.banner.store') }}" method="post"
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
                                                    <input type="text" name="bannertitle"
                                                        class="form-control @error('bannertitle') is-invalid @enderror"
                                                        placeholder="Banner Title..." value="{{ old('bannertitle') }}">
                                                </div>
                                                @error('bannertitle')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon"><i
                                                                class="fas fa-percent"></i></span>
                                                    </div>
                                                    <input type="number" name="bannerdiscount"
                                                        class="form-control @error('bannerdiscount') is-invalid @enderror"
                                                        placeholder="Banner Discount..."
                                                        value="{{ old('bannerdiscount') }}">
                                                </div>
                                                @error('bannerdiscount')
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
                                                                class="fas fa-image"></i></span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="form-control @error('bannerimage') is-invalid @enderror"
                                                            id="image" name="bannerimage">
                                                        <label class="custom-file-label" for="image"
                                                            style="color: #999999e8;">Choose Banner Image...</label>
                                                    </div>
                                                </div>
                                                @error('bannerimage')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text icon"><i
                                                                class="fas fa-ticket-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="promoCode"
                                                        name="promoCode" placeholder="Enter Promo Code...">
                                                </div>
                                            </div>
                                            @error('promoCode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>


                                    </div>
                                    <div class="form-group">

                                        <div class="input-group">

                                            <textarea id="description" name="bannerdescription"
                                                class="form-control @error('bannerdescription') is-invalid @enderror"
                                                placeholder="Write your banner description here...">{{ old('bannerdescription') }}</textarea>
                                        </div>
                                        @error('bannerdescription')
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
