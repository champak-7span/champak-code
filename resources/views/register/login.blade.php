@extends('layout')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login User</h3>
                    <div class="card-body">

                        <form action="{{ route('login') }}" method="POST">
                            
                            @csrf
                            @foreach($errors->all() as $error)
                            <li class="text-danger text-xs">{{$error}}</li>
                            @endforeach
                         


                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email"  value="{{ old('email') }}"  id="email_address" class="form-control"
                                    name="email"  autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password"    id="password" class="form-control"
                                    name="password" >
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            
                          

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign in</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection