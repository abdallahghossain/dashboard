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
    <style>
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <br><br><br>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Send Suggestion Or Complaint</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="message">message</label>
                            <input type="text" class="form-control" name="message" placeholder="Enter message">
                        </div>
                        <div class="form-group">
                            <label>Select Type </label>
                            <select class="form-control" name="type">
                                <option>Complaint</option>
                                <option>Suggestion</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_id">Student Id</label>
                            <input type="number" class="form-control" name="student_id" placeholder="Enter ID">
                        </div>
                        <div>
                            <label for="name">Student Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="email">Student Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="image"> Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div
                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="urgent" name="urgent">
                                    <label class="custom-control-label" for="urgent">Urgent</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {{-- <button type="button" onclick=" saveStudent()" class="btn btn-primary">Submit</button> --}}
                        </div>
            </form>

            {{-- <form>
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"   id="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="message">message</label>
                            <input type="text" class="form-control"  id="message" placeholder="Enter message">
                        </div>
                        <div class="form-group">
                            <label>Select Type </label>
                            <select class="form-control" id="type" >
                                <option>Complaint</option>
                                <option>Suggestion</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_id">Student Id</label>
                            <input type="number" class="form-control" id="student_id"
                                placeholder="Enter ID">
                        </div>
                        <div>
                            <label for="name">Student Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="email">Student Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="image"> Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" value="0" id="urgent" name="urgent">
                                  <label class="custom-control-label" for="urgent">Urgent</label>
                                </div>
                              </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            {{-- <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" onclick=" saveStudent()" class="btn btn-primary">Submit</button>
                        </div>
            </form> --}}
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
    {{-- <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>
        function saveStudent() {
            axios.post('/cms/admin/complaints', {
                headers: {
                    'Content-Type': 'multipart/form-data'
                    },
                title: document.getElementById('title').value,
                message: document.getElementById('message').value,
                type: document.getElementById('type').value,
                student_id: document.getElementById('student_id').value,
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                image: document.getElementById('image').files,
                urgent: document.getElementById('urgent').checked
                }).then(function(response) {
                    console.log(response)
                    Swal.fire({
                        position: 'center',
                        icon: response.data.icon,
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 4500
                    })
                })
                .catch(function(error) {
                    console.log(error)
                    Swal.fire({
                        position: 'center',
                        icon: error.response.data.icon,
                        title: error.response.data.message,
                        showConfirmButton: false,
                        timer: 4500
                    })
                });
        }
    </script> --}}
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>
