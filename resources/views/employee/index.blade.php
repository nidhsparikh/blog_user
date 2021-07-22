@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-lg-12 margin-tb">
                    <div class="float-left">
                        <h2>Edit Yoyr Profile</h2>
                    </div>
                    <!-- <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('employee.index') }}">Back</a>
                    </div> -->
                </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="mb-4" action="{{ route('employee.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>First Name:</strong>
                            <input type="text" name="f_name" class="form-control" value="{{ $user->f_name }}" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="l_name" class="form-control" value="{{ $user->l_name }}" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mobile Number:</strong>
                            <input type="integer" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ $user->mobile_number }}" placeholder="Mobile Number">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Role:</strong>
                            <select name="role" id="role" required class="form-control @error('role') is-invalid @enderror" autofocus>
                                <option value="" disabled>----select Role----</option>
                                <option value="admin" {{$user->role == 'admin' ? 'selected' :''}}>Admin</option>
                                <option value="employee" {{$user->role == 'employee' ? 'selected' :''}}>Employee</option>
                            </select>

                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="email" readonly>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection