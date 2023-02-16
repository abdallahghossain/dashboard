@extends('cms.parent')
@section('create_admin')
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
                {{-- <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student Form</h3>
                    </div> --}}
                <!-- /.card-header -->
                <!-- form start -->

            {{-- <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="form-group">
                                <label for="admin_name">Name</label>
                                <input type="text" class="form-control" name="admin_name" placeholder="Enter Name">
                            </div>
                            <div>
                                <label for="admin_email">admin email</label>
                                <input type="email" class="form-control" name="admin_email" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="tel" class="form-control" name="mobile" placeholder="Enter Mobile">
                            </div>
                            <div class="form-group">
                                <label for="career">career</label>
                                <input type="text" class="form-control" name="career" placeholder="Enter career">
                            </div>
                            <div>
                                <label for="password"> Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                </form> --}}
            {{-- <form>
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name">
                        </div>
                        <div>
                            <label for="email">admin email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="tel" class="form-control" id="mobile" placeholder="Enter Mobile">
                        </div>

                        <div>
                            <label for="password"> Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password">
                        </div>


                        <div class="card-footer">
                            <button type="button"  onclick="saveAdminAxios()" class="btn btn-primary">Submit</button>
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
                                        <h2 class="text-uppercase text-center mb-5">Create an Admin</h2>
                                        <form>
                                            <div class="form-outline mb-4">
                                                <input type="text" id="name" class="form-control form-control-lg" />
                                                <label class="form-label" for="name">Your Name</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="email" id="email" class="form-control form-control-lg" />
                                                <label class="form-label" for="email">Your Email</label>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <input type="tel" id="mobile" class="form-control form-control-lg" />
                                                <label class="form-label" for="mobile">Enter Your Mobile</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="password"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="button" onclick="saveAdminAxios()"
                                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
        <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
        <script>
            function saveAdminAxios() {
                axios.post('/cms/admin/admins', {
                        name: document.getElementById('name').value,
                        email: document.getElementById('email').value,
                        mobile: document.getElementById('mobile').value,
                        password: document.getElementById('password').value
                    }).then(function(response) {
                        console.log(response)
                        Swal.fire({
                            position: 'center',
                            icon: response.data.icon,
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    })
                    .catch(function(error) {
                        console.log(error)
                        Swal.fire({
                            position: 'center',
                            icon: error.response.data.icon,
                            title: error.response.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
            }
        </script>

    </body>

    </html>
@endsection
