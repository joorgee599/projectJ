$(document).ready(function() {
    $("#tableCategories").DataTable({
        responsive: true,
        order: [
            [0, "DESC"],
        ],
        language: {
            decimal: "",
            emptyTable: "No hay información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Categorias",
            infoEmpty: "Mostrando 0 to 0 of 0 Categorias",
            infoFiltered: "(Filtrado de _MAX_ total Categorias)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Categorias",
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