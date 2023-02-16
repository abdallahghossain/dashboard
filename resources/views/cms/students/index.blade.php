<link rel="stylesheet" href="{{ asset('cms/css/style.css') }}">
@extends('cms.parent')
@section('table_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Content</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Type</th>
                                <th>Student Id</th>
                                <th>Student Name</th>
                                <th>Student Email</th>
                                <th>Status</th>
                                <th>Urgent</th>
                                <th>close date</th>
                                <th>Response</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->index + 1 }} </td>
                                    <td>
                                        <img class="contacts-list-img zoom" src="{{ Storage::url($student->image) }}"
                                            alt="message user image">
                                    </td>
                                    <td>{{ $student->title }} </td>
                                    <td>{{ $student->message }} </td>
                                    <td>{{ $student->type }} </td>
                                    <td>{{ $student->student_id }} </td>
                                    <td>{{ $student->name }} </td>
                                    <td>{{ $student->email }} </td>
                                    <td>
                                        @if ($student->status == 'Open')
                                            <span style="color:green; "> {{ $student->status }}</span>
                                        @else
                                            <span style="color: red;"> Closed</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($student->urgent)
                                            <span style="font-weight: bold; color: green">urgent</span>
                                        @else
                                            <span style="color: red">Not urgent</span>
                                        @endif
                                    </td>
                                    <td>{{ $student->updated_at }}
                                    </td>
                                    <td>{{ $student->response }}
                                    </td>

                                    <td class="options">
                                       <span><a class="btn btn-primary" href="{{ route('complaints.edit', $student->id) }}" >Response</a></span>
                                        {{-- <a class="btn btn-primary" href="{{ route('complaints.show', $student->id) }}" >Response</a> --}}
                                        <span><a class="btn btn-warning" href="{{ route('complaints.update', $student->id) }}">Status </a></span>
                                        <form action="{{ route('complaints.destroy', $student->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"> Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
