@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Role</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->f_name }}</td>
                    <th>{{ $user->l_name }}</th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile_number }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <!-- <form action="{{ route('users.destroy',$user->id) }}" method="POST"> -->
                            
                            <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            @if($user->role == 'employee')
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Assign</a>
                            @endif
                            <!-- @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button> -->
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection