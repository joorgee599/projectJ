@extends('layout.main')
@section('title', 'Usuarios')
@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <a class="btn btn-primary btn-sm bg-logistic" href="{{ route('admin.users.index') }}">Atrás</a>
        </div>
        <div class="col-12 ">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST" id="formUser">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="">Usuario</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $user->name) }}">

                                    @if ($errors->has('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Email</label>
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $user->email) }}">

                                    @if ($errors->has('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="">Roles</label>
                                <div class="form-floating">
                                    <select name="rol" id="rol-id" class="form-select">
                                        <option value="" disabled selected>Selecciona un rol</option>
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->name }}"
                                                {{ old('rol', $roleUser) === $rol->name ? 'selected' : '' }}>
                                                {{ $rol->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-primary btn-sm">
                                    Actualizar Usuario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
