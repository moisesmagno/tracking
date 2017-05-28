$(document).ready(function() {

    //language - Português
    var language = {
        "search":         "Buscar:",
        "emptyTable":     "Sem dados disponíveis na tabela",
        "zeroRecords":    "Nenhum registro correspondente encontrado",
        "infoEmpty":      "Mostrando 0 para 0 de 0 entradas",
        "info":           "Mostrando _START_ para _END_ de _TOTAL_ registros",
        "processing":     "Processado...",
        "loadingRecords": "Carregando...",
        "lengthMenu":     "Ver _MENU_ registros",
        "paginate": {
            "first":      "Primeiro",
            "last":       "Ultimo",
            "next":       "Próximo",
            "previous":   "Anterior"
        },
        "aria": {
            "sortAscending":  ": Ativar para ordenar a coluna ascendente",
            "sortDescending": ": Ativar para ordenar a coluna descendente"
        }
    }

    //Data table - Table Marks
    $('#dt-marks').DataTable({
        "language": language,
    });
});