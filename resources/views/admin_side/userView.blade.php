@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>User - Kimbowny</title>
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
                        <h1><i class="fas fa-user"></i>&nbsp;View User</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('admin.user.show') }}">View User</a>
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
                                    style="font-size: 1.5em; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">User Table
                                </h3>

                            </div>
                            <div class="card-body table-responsive p-2" style="background-color: #f8f9fa;">
                                <table id="example" class="table table-hover table-striped text-nowrap">
                                    <thead style="background-color: #007bff9a; color: #fff;">
                                        <tr>
                                            <th class="text-center">S.NO</th>
                                            <th class="text-center">Full Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Reward</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($user))
                                            @foreach ($user as $index => $userdata)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $index + 1 }}
                                                    </td>

                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $userdata->firstname . ' ' . $userdata->lastname }}
                                                    </td>

                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $userdata->email }}</td>

                                                    <td class="text-center" style="font-family: monospace; padding: 0; ">
                                                        <div
                                                            style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100%;">
                                                            <select onchange="changeReward(this, {{ $userdata->id }})"
                                                                class="form-control custom-select"
                                                                style="border: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent; text-align-last: center; width: 100%;">
                                                                <option value="1"
                                                                    {{ $userdata->reward_received == '1' ? 'selected' : '' }}>
                                                                    Given
                                                                </option>
                                                                <option value="0"
                                                                    {{ $userdata->reward_received == '0' ? 'selected' : '' }}>
                                                                    Not Given
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </td>


                                                    <td class="text-center">
                                                        <div class="btn-group">

                                                            <button class="btn btn-sm btn-outline-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $userdata->id }}">
                                                                <i class="fa fa-trash" style="font-size: 1.2em;"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $userdata->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fa fa-trash"></i>&nbsp;Delete
                                                                    User</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this User?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.user.del', ['id' => $userdata->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
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

        function changeReward(selectElement, id) {
            var reward = selectElement.value;



            // Perform form submission using AJAX
            $.ajax({
                url: '{{ route('admin.user.reward.update') }}',
                method: 'GET',
                data: {
                    id: id,
                    reward: reward
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
                        title: 'Error! Updating User Reward'
                    });
                }
            });

        }
    </script>
@endsection
