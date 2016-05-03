module.exports = function() {

    $('.data-table').DataTable({
        aLengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, 'Todos'] // change per page values here
        ],
        language: {
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'No hay registros disponibles',
            infoFiltered: '(filtrado de _MAX_ registros totales)',
            lengthMenu: 'Mostrar _MENU_ registros por página',
            paginate: {
                first: 'Primera',
                last: 'Última',
                next: 'Siguiente',
                previous: 'Anterior'
            },
            sSearch: 'Buscar:',
            zeroRecords: 'Sin resultados'
        },
        stateSave: true
    })

}
