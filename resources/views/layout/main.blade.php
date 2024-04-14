<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto J</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>
<body>
    @if (session('message'))
    <div class="col-10">
        <h1 class="text-success">{{ session('message') }}</h1>
    </div>
    @endif

    <div class="card border-1">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">
                Cerrar sesión
            </button>
        </form>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <ul class="nav flex-column">
                    <!-- Sidebar links -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('admin/dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.roles.index') }}">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pendiente</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Content goes here. This div will be populated dynamically. -->
                <div id="main-content">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>
