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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student Id</h3>
                    </div>
                <!-- /.card-header -->
                <!-- form start -->

            <form action="{{ route('compalints.show',$student->id) }}" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
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
                                <label for="id">Enter Id</label>
                                <input type="number" class="form-control" name="id" placeholder="Enter id">
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                {{-- <a href="{{ route('complaints.show',$student->id)}}">Show The Response</a> --}}
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
    </body>
    </html>
@endsection
