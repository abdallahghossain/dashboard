<link rel="stylesheet" href="{{asset('cms/css/style.css')}}">
@extends('cms.parent')
@section('table_content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style="color: rgb(0, 157, 255); font-weight: bolder;">Admin Content </h3>

          <div class="card-tools">

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>mobile</th>
                <th>password</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin )
                <tr>
                    <td>{{$loop->index +1}} </td>
                    <td>{{$admin->name}} </td>
                    <td>{{$admin->email}} </td>
                    <td>{{$admin->mobile}} </td>
                    <td>{{$admin->password}} </td>
                    {{-- <td  class="options">
                        <a href="{{ route('admins.edit',$admin->id)}}">Edit</a>
                        <form action="{{ route('admins.destroy',$admin->id)}}" method="POST" >
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn-delete"> Delete</button>
                        </form>
                    </td> --}}
                    <td class="options">
                        <a href="{{ route('admins.edit', $admin->id) }}">Edit</a>
                        <button  type="button"
                            onclick="deleteAdmin('{{ $admin->id }}')"
                            style="color: red">Delete</button>
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

@section('script')
<script>
    function deleteAdmin(id) {
        axios.delete(`/cms/admin/admins/${id}`)
            .then(function(response) {
                // document.getElementById(`admin_${id}`).remove();
                document.getElementById('id').remove();
                showMessage('success', response.data.message);
            })
            .catch(function(error) {
                showMessage('error', error.response.data.message);
            })
    }
    function showMessage(icon, message) {
        Swal.fire({
            position: 'center',
            icon: icon,
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
@endsection
