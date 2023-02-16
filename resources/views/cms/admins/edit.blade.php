@extends('cms.parent')
@section('edit_table')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Students </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="cms/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <br><br><br>
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Admin Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            {{-- <form  >
                @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"   value="{{ $admin->name }}" id="name" placeholder="Enter Name">
                        </div>
                        <div>
                            <label for="email">admin email</label>
                            <input type="email" class="form-control" value="{{  $admin->email}}"  id="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="tel" class="form-control" value="{{  $admin->mobile}}"  id="mobile" placeholder="Enter Mobile">
                        </div>
                        <div class="card-footer">
                            <button type="button"  onclick="updateAdmin('{{ $admin->id }}')" class="btn btn-primary">Submit</button>
                        </div>
            </form> --}}
            <section class="vh-100 bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Update an Admin</h2>
                                    <form>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="name" class="form-control form-control-lg" />
                                            <label class="form-label" for="name">update Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" class="form-control form-control-lg" />
                                            <label class="form-label" for="email">update Email</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="tel" id="mobile" class="form-control form-control-lg" />
                                            <label class="form-label" for="mobile">Update Mobile</label>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" onclick="updateAdmin()"
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Edit</button>
                                        </div>
                                    </form>

        </div>
        <!-- /.card -->

    </div>

    <!-- jQuery -->
    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

</body>

</html>
@endsection
@section('script')
<script>
    function updateAdmin(id){
        axios.put(`/cms/admin/admins/${id}`, {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    mobile: document.getElementById('mobile').value,
                }).then(function(response) {
                    showMessage(response.data.icon, response.data.message);
                    // window.location.href = '/cms/admin/categories';
                })
                .catch(function(error) {
                    showMessage(error.response.data.icon, error.response.data.message);
                })
        }

        function showMessage(icon, title) {
            Swal.fire({
                icon: icon,
                title: title,
                showConfirmButton: false,
                timer: 3000
            })
    }
</script>

@endsection
