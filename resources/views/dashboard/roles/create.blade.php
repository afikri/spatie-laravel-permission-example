@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-lg-9 margin-tb">
                <div class="card">
                    <div class="card-header">
                        Create new role
                    </div>
                    <div class="card-body">
                        @can('show role')
                        <a class="btn btn-dark mb-1" href="{{ route('roles.index') }}"> Back</a>
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

                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="card mt-3">
                                <div class="card-header bg-dark text-white">Role and permissions</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                            <div class="form-group">
                                                <strong>Permissions:</strong>

                                                <div class="row">
                                                    @foreach ($permission as $value)
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                                            {{ $value->name }}
                                                        </label>
                                                    </div>

                                                    <br />
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-dark mt-2">Submit</button>
                                        </div>
                                    </div>
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