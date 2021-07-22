@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-lg-12 margin-tb">
                    <div class="float-left">
                        <h2>Assign Admin</h2>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
                    </div>
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

            <form class="mb-4" action="{{ route('users.update_admin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>"> 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Asign Admin:</strong>
                            <select name="assign_admin" id="assign_admin" required class="form-control @error('assign_admin') is-invalid @enderror" autofocus>
                                @foreach($admin as $admin)
                                <option value="{{$admin->id}}">{{$admin->f_name}} {{$admin->l_name}}</option>
                                @endforeach
                            </select>

                            @error('assign_admin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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