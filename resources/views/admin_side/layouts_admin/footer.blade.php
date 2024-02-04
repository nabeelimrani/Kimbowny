<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">

    </div>

    <strong>Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} <a
            href="{{ url('/admin/dashboard') }}"><b>KIMBOWNY</b>
            Pet Shop</a>.</strong> All rights reserved.
</footer>
</div>
<script src="{{ asset('frontend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('fontawesome/js/fontawesome.min.js') }}"></script>
<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>

<script src="{{ asset('frontend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('frontend/dist/js/demo.js') }}"></script>

<script src="{{ asset('frontend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('frontend/plugins/toastr/toastr.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Include the TinyMCE library from CDN -->
<script src="https://cdn.tiny.cloud/1/45zjnzzql1tbznxpdm35l1llulyqxnjgqxubav7ks34x7acq/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<!-- Initialize TinyMCE -->
<script>
    tinymce.init({
        selector: 'textarea[id=description]',
        height: 400,
        width: '100%',
        plugins: 'link lists table',
        toolbar: 'undo redo | bold italic | bullist numlist | link',
    });
    $('#image').on('change', function() {
        var files = $(this)[0].files;
        var fileNames = [];

        // Loop through the selected files and store their names in an array
        for (var i = 0; i < files.length; i++) {
            fileNames.push(files[i].name);
        }

        // Display only the first 20 characters of the concatenated file names
        var truncatedFileNames = fileNames.join(', ').substring(0, 50) + '...';

        // Update the label with the truncated file names
        $(this).next('.custom-file-label').text(truncatedFileNames);
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000, // 3 seconds
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @if (session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        })
    @endif

    @if (session('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        })
    @endif
    $("#example").DataTable({
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],

    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>

</html>
