@extends('layout.login')

@section('content')
    <div class="container">
         @if (session('message'))
         <div class="col-10">
            <p class="text-primary">{{session('message')}}</p>
         </div>
             
         
             
         @endif
        <div class="row m-4">
            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card border-1 shadow-sm m-2">
                        <div class="col-12 m-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h1>Login</h1>
                                <div class="col-6 mb-2">
                                    <input type="text" name="email" id="email" class="form-control">
                                    @if ($errors->has('email'))
                                    <small class="text-danger">{{$errors->first('email')}}</small>
                                        
                                    @endif
                                </div>
                                <div class="col-6 mb-2">

                                    <input type="password" name="password" id="password" class="form-control">
                                    @if ($errors->has('password'))
                                    <small class="text-danger">{{$errors->first('password')}}</small>
                                        
                                    @endif
                                </div>
                                <div-col-4>
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                </div-col-4>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
