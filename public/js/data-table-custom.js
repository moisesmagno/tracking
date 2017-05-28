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
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
        "language": language
    });

    //Data table - Table Campaigns
    $('#dt-campaigns').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
        "language": language
    });

    //Data table - Table Influencer
    $('#dt-influencers').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
        "language": language
    });

    //Data table - Table Results
    $('#dt-results').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
        "language": language
    });

    //Data table - Table Results Pixel
    $('#dt-pixel-results').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
        "language": language
    });

    //Data table - Table Pixel
    $('#dt-pixel').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
        "language": language
    });
});