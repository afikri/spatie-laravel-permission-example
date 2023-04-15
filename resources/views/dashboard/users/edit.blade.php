@extends('layouts.app')


@section('content')
<div class="page-wrapper">
  <div class="page-content">

    <div class="row">
      <div class="col-lg-9 mx-auto">
        <div class="card">
          <div class="card-header">
            Update User
          </div>
          <div class="card-body">
            @can('show user')
            <a href="{{route('users.index')}}" class="btn btn-dark mb-3">See All</a>
            @endcan

            <form method="POST" action="{{ route('users.update', $user->id) }}">
              @csrf
              @method('PATCH')
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="">Name</label>
                  <input type="text" name="name" value="{{ $user->name }}" placeholder="Name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Email</label>
                  <input type="text" name="email" value="{{ $user->email }}" placeholder="Email" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Confirm Password</label>
                  <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Assign role</label>
                  <select name="roles[]" class="form-control" multiple>
                    @foreach($roles as $key => $value)
                    <option value="{{ $key }}" {{ in_array($key, $userRole) ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                @can('edit user')
                <div class="col-12">
                  <button type="submit" class="btn btn-dark mt-3 px-5">Save</button>
                </div>
                @endcan
              </div>
            </form>


            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>oops!</strong>Existen algunos problemas con los datos ingresados<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection