@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

  <div class="row">
     <div class="col-md-12">

        <div class="card mt-4">

          <div class ="card-header">
               <h4>Edit user
                  <a href="{{url('users')}}" class="btn btn-warning float-end"> Back </a>
               </h4>
            </div>

          <div class ="card-body">

                 <form action = "{{url('update-user/'.$user->id)}}" method="POST" novalidate enctype="multipart/form-data">
                    @csrf
                       @method('PUT')

                       <div class="row">
                            <div class="col-md-6">

                                <div class="col-md-6 mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" value="{{ $user->first_name}}" class="form-control" name="first_name" id="first_name">

                                    @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" value="{{ $user->last_name}}"  class="form-control" name="last_name" id="last_name">
                                    @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Username</label>
                                    <input type="text" value="{{ $user->username}}"  class="form-control" name="username" id="username">

                                    @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="email"  value="{{ $user->email}}" class="form-control" name="email" id="email">

                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Role as</label>
                                    <select class="form-select" name="role_as">
                                            <option value="1" {{ $user->role_as =='1' ? 'selected':'' }} > Admin </option>
                                            <option value="0" {{ $user->role_as =='0' ? 'selected':'' }} > User  </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="col-md-6 col-form-label text-md-right">Password</label>

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password" class="col-md-6 col-form-label text-md-right">Confirm Password</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"> Submit </button>
                        </div>


                </form>

              </div>
         </div>
      </div>
   </div>
</div>
@endsection
