$(document).ready(function() {
    $("#tableProviders").DataTable({
        responsive: true,
        order: [
            [0, "DESC"],
        ],
        language: {
            decimal: "",
            emptyTable: "No hay información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
            infoEmpty: "Mostrando 0 to 0 of 0 Proveedores",
            infoFiltered: "(Filtrado de _MAX_ total Proveedores)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Proveedores",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Ultimo",
                next: "Siguiente",
                previous: "Anterior",
            },
        },
    });
});