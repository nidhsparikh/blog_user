@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row mt-4">
                <div class="col-lg-12 margin-tb">
                    <div class="float-left">
                        <h2>Edit Your Profile</h2>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin_users.edit',$users->id) }}">Edit Your Profile</a>
                    </div>
                </div>
            </div>
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
                @foreach ($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $admin->f_name }}</td>
                    <th>{{ $admin->l_name }}</th>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->mobile_number }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>
                        <!-- <form action="{{ route('users.destroy',$admin->id) }}" method="POST"> -->
                            
                            <a class="btn btn-warning" href="{{ route('admin_users.edit',$admin->id) }}">Edit</a>
                            <!-- @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button> 
                        </form> -->
                    </td> 
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection