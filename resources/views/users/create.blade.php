@extends('layout.main')
@section('title', 'Usuarios')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}">Atrás</a>
        </div>
        <div class="col-12 ">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST" id="formUser">
                        @csrf
                        <div class="row g-3">

                            <div class="col-6">
                                <label for="">Usuario</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', '') }}">

                                    @if ($errors->has('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Email</label>
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', '') }}">

                                    @if ($errors->has('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Contraseña</label>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" id="password"
                                        value="{{ old('password', '') }}">

                                    @if ($errors->has('password'))
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Repita su contraseña</label>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_two"
                                        value="{{ old('password_two', '') }}">

                                    @if ($errors->has('password_two'))
                                        <small class="text-danger">{{ $errors->first('password_two') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="">Rol</label>
                                <div class="form-floating">

                                    <select name="rol" id="rol-id" class="form-select">
                                        <option value="" disabled selected>Selecciona un rol</option>
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->name }}" <?php echo old('rol', '') == $rol->name ? 'selected' : ''; ?>>
                                                {{ $rol->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('rol'))
                                        <small class="text-danger">{{ $errors->first('rol') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Crear usuario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/users/users.js') }}" defer></script>
@endsection
