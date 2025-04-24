$(document).ready(function() {
    $("#tablaUsers").DataTable({
        responsive: true,
        order: [
            [0, "DESC"],
        ],
        language: {
            decimal: "",
            emptyTable: "No hay información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Usuario",
            infoEmpty: "Mostrando 0 to 0 of 0 Usuario",
            infoFiltered: "(Filtrado de _MAX_ total Usuario)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Usuario",
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