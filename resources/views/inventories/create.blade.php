@extends('layout.main')
@section('title', 'Registrar Movimiento de Inventario')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.inventories.index') }}">Atrás</a>
    </div>
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <form id="inventoryForm" action="{{ route('admin.inventories.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row g-3">

                        {{-- Descripción --}}
                        <div class="col-md-12">
                            <label for="">Descripción</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="description" style="height: 100px;">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Documento --}}
                        <div class="col-md-6">
                            <label for="">Documento</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="document" value="{{ old('document') }}">
                                @error('document')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Sección para agregar detalles --}}
                        <hr>
                        <h5 class="mt-3">Detalles del Movimiento</h5>

                        <div class="col-md-3">
                            <label>Producto</label>
                            <select id="product_id" class="form-select">
                                <option value="" disabled selected>Selecciona</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-name="{{ $product->name }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Proveedor</label>
                            <select id="provider_id" class="form-select">
                                <option value="" disabled selected>Selecciona</option>
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}" data-name="{{ $provider->name }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label>Tipo</label>
                            <select id="type" class="form-select">
                                <option value="entrada">Entrada</option>
                                <option value="salida">Salida</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label>Cantidad</label>
                            <input type="number" id="quantity" class="form-control">
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-success btn-sm" onclick="addDetail()">Agregar</button>
                        </div>

                        {{-- Tabla de detalles --}}
                        <div class="col-12 mt-3">
                            <table class="table table-bordered" id="detailsTable">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Proveedor</th>
                                        <th>Tipo</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <input type="hidden" name="details_json" id="details_json">
                        </div>

                        {{-- Botón Final --}}
                        <div class="col-12 text-end">
                            <button class="btn btn-primary btn-sm" type="submit">
                                Registrar Movimiento
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Script para manejar la tabla dinámica --}}
<script>
    let details = [];

    function addDetail() {
        const productSelect = document.getElementById("product_id");
        const providerSelect = document.getElementById("provider_id");
        const type = document.getElementById("type").value;
        const quantity = document.getElementById("quantity").value;

        const product_id = productSelect.value;
        const provider_id = providerSelect.value;
        const product_name = productSelect.options[productSelect.selectedIndex]?.dataset.name;
        const provider_name = providerSelect.options[providerSelect.selectedIndex]?.dataset.name;

        if (!product_id || !provider_id || !type || !quantity) {
            alert("Todos los campos del detalle son obligatorios");
            return;
        }

        const detail = { product_id, provider_id, type, quantity, product_name, provider_name };
        details.push(detail);
        renderDetails();

        // Limpiar campos
        productSelect.selectedIndex = 0;
        providerSelect.selectedIndex = 0;
        document.getElementById("type").selectedIndex = 0;
        document.getElementById("quantity").value = "";
    }

    function removeDetail(index) {
        details.splice(index, 1);
        renderDetails();
    }

    function renderDetails() {
        const table = document.getElementById("detailsTable").querySelector("tbody");
        table.innerHTML = "";
        details.forEach((d, i) => {
            table.innerHTML += `
                <tr>
                    <td>${d.product_name}</td>
                    <td>${d.provider_name}</td>
                    <td>${d.type}</td>
                    <td>${d.quantity}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeDetail(${i})">Eliminar</button>
                    </td>
                </tr>
            `;
        });

        // Guardar JSON en input oculto
        document.getElementById("details_json").value = JSON.stringify(details);
    }

     // Validar antes de enviar el formulario
    document.getElementById("inventoryForm").addEventListener("submit", function (e) {
        const description = document.querySelector('textarea[name="description"]').value.trim();
        const documentField = document.querySelector('input[name="document"]').value.trim();

        if (!description) {
            alert("La descripción es obligatoria.");
            e.preventDefault();
            return;
        }

        if (!documentField) {
            alert("El documento es obligatorio.");
            e.preventDefault();
            return;
        }

        if (details.length === 0) {
            alert("Debe agregar al menos un detalle del movimiento.");
            e.preventDefault();
            return;
        }

        document.getElementById("details_json").value = JSON.stringify(details);
    });
</script>
@endsection
