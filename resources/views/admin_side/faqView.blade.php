@extends('admin_side.layouts_admin.main')

@section('main-section')
    @push('title')
        <title>View FAQs - Kimbowny</title>
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
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-lightbulb"></i>
                            &nbsp;View FAQs</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">View FAQs
                                </li>
                            </ol>
                            <a href="{{ route('admin.faq.index') }}" class="btn btn-info">Add FAQs</a>
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
                                    style="font-size: 1.5em; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);">FAQs Table
                                </h3>

                            </div>

                            <div class="card-body table-responsive p-2" style="background-color: #f8f9fa;">
                                <table id="example" class="table table-hover table-striped text-nowrap">
                                    <thead style="background-color: #007bff9a; color: #fff;">
                                        <tr>
                                            <th class="text-center">S.NO</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Is_Open</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (isset($faq))
                                            @foreach ($faq as $index => $faqdata)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td class="text-center" style="font-family: monospace;">
                                                        {{ $faqdata->title }}</td>
                                                    <td class="text-center" style="font-family: monospace; padding: 0; ">
                                                        <div
                                                            style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100%;">
                                                            <select onchange="changeStatus(this, {{ $faqdata->id }})"
                                                                class="form-control custom-select"
                                                                style="border: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent; text-align-last: center; width: 100%;">
                                                                <option value="1"
                                                                    {{ $faqdata->is_open == '1' ? 'selected' : '' }}>Open
                                                                </option>
                                                                <option value="0"
                                                                    {{ $faqdata->is_open == '0' ? 'selected' : '' }}>Closed
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </td>





                                                    <td class="text-center" style="font-family: monospace;"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="{{ $faqdata->description }}">
                                                        {{ Str::limit($faqdata->description, 30) }}

                                                    </td>




                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                data-toggle="modal"
                                                                data-target="#editModal{{ $faqdata->id }}">
                                                                <i class="fa fa-edit" style="font-size: 1.2em;"></i>
                                                            </button>&nbsp;&nbsp;
                                                            <button class="btn btn-sm btn-outline-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $faqdata->id }}">
                                                                <i class="fa fa-trash" style="font-size: 1.2em;"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $faqdata->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i
                                                                        class="fa fa-trash"></i>&nbsp;Delete
                                                                    FAQs</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Faq?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.faq.del', ['id' => $faqdata->id]) }}"
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
                                                <div class="modal fade" id="editModal{{ $faqdata->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="editAreaModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editAreaModalLabel"><i
                                                                        class="fa fa-edit"></i>&nbsp;Edit
                                                                    FAQs</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('admin.faq.edit', ['id' => $faqdata->id]) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text icon"><i
                                                                                        class="fas fa-pen"></i></span>
                                                                            </div>
                                                                            <input type="text" name="faqname" required
                                                                                class="form-control @error('faqname') is-invalid @enderror"
                                                                                value="{{ $faqdata->title }}">
                                                                        </div>
                                                                        @error('faqname')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text icon"><i
                                                                                        class="fas fa-question-circle"></i></span>
                                                                            </div>
                                                                            <select
                                                                                onchange="changeStatus(this, {{ $faqdata->id }})"
                                                                                class="form-control custom-select"
                                                                                style="border: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent; width: 100%;">
                                                                                <option value="1"
                                                                                    {{ $faqdata->is_open == '1' ? 'selected' : '' }}>
                                                                                    Open
                                                                                </option>
                                                                                <option value="0"
                                                                                    {{ $faqdata->is_open == '0' ? 'selected' : '' }}>
                                                                                    Closed
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    @error('faqname')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <textarea id="description" name="faqdescription" required
                                                                                class="form-control @error('faqdescription') is-invalid @enderror" placeholder="Faq Description ...">{!! $faqdata->description !!}</textarea>


                                                                        </div>
                                                                        @error('faqdescription')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                            </div>










                                                            <!-- Add any other form fields for editing here -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Save
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
        function changeStatus(selectElement, faqId) {
            var status = selectElement.value;



            // Perform form submission using AJAX
            $.ajax({
                url: '{{ route('admin.faq.status.update') }}',
                method: 'GET',
                data: {
                    id: faqId,
                    isOpen: status
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
                        title: 'Error updating FAQ status'
                    });
                }
            });

        }
    </script>



@endsection
