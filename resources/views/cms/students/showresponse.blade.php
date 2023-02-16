@extends('cms.parent')
@section('table_content')
<section class="content">
    <div class="container-fluid">
    {{-- <div class="container justify-content-center"> --}}
      <div class="row">
        <div class="col-md-6">

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Show Responses</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong> Respone to : <span style="color: #007096;">{{$student->email}}</span> </strong>
                <br><br>
              <p class="text-muted">
                <i class="fas fa-sms"></i>
                  @if ($student->response)
                  <span style="font-weight: bold ; color: green;">{{$student->response}}</span>
                  @else
                    <span style="color: red">No Response Yet</span>
              @endif
              </p>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              {{-- <button type="submit"  class="btn btn-default float-right">Cancel</button> --}}
              <a class="btn btn-default float-right" href="{{route('complaints.index')}}">Back</a>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
