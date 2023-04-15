@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-lg-9 margin-tb">
                <div class="card">
                    <div class="card-header">Create New User</div>
                    <div class="card-body">
                        @can('show user')
                        <a class="btn btn-dark" href="{{ route('users.index') }}"> Back</a>
                        @endcan
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong>There are some problems with the entered data<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password Confirmation:</strong>
                                        <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        <select name="roles[]" class="form-control" multiple>
                                            @foreach ($roles as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-dark mt-3">Save</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection