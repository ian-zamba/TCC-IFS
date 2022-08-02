$(document).ready(function() {
    $('#tabela_func').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        "scrollX": true,
        "info": false,
        "columns": [null, { "width": "10%" }, { "width": "10%" }, { "width": "9%" }, null, null, { "width": "13%" }, null, null, null, null],
        autoWidth: false,
        columnDefs: [{
            targets: ['_all'],
            className: 'mdc-data-table__cell'
        }]
    });
});

$(document).ready(function() {
    $('#tabela_alunos').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        "scrollX": true,
        "info": false,
    });
});
$(document).ready(function() {
    $('#tabela_turma').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        "scrollX": true,
        "info": false,
    });
});
$(document).ready(function() {
    $('#tabela_turma_aluno').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        "scrollX": true,
        "info": false,
    });
});
$(document).ready(function() {
    $('#mostrar_boletimaluno').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        "scrollX": true,
        "info": false,
    });
});
$(document).ready(function() {
    $('#tabela_aluno').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        "columns": [null, null, { "width": "10%" }, null, null, null, null, null, { "width": "7%" }, null, null, null, null, null, null, null, null, null, null, null, null, null, null],
        "info": false,
        "scrollX": true,

    });
});
$(document).ready(function() {
    $('#tabela_aluno1').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        "columns": [null, null, { "width": "10%" }, null, null, null, null, null, { "width": "7%" }, null, null, null, null, null, null, null, null, null, null, null, null, null, null],
        "searching": false,
        "ordering": false,
        "info": false,
        "scrollX": true,
        "paging": false,
        "lengthChange": false

    });
});
$(document).ready(function() {
    $('#tabela_ch').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        "searching": false,
        "ordering": false,
        "info": false,
        "scrollX": true,
        "paging": false,
        "lengthChange": false

    });
});


/*=========================colocar automaticamente select================================*/


$(document).ready(function() {
    var acesso = $("#acesso_funci").val();

    if (acesso == "1") {
        $("#Temacesso").prop("selected", true);
    } else if (acesso == "0") {
        $("#Naotem").prop("selected", true);
    }

});

$(document).ready(function() {
    var cargo = $("#cargo_funci").val();

    if (cargo == "diretor") {
        $("#diretor").prop("selected", true);
    } else if (cargo == "professor") {
        $("#professor").prop("selected", true);
    } else if (cargo == "coordenador") {
        $("#coordenador").prop("selected", true);
    } else if (cargo == "assistente_administrativo") {
        $("#assistente_administrativo").prop("selected", true);
    } else if (cargo == "secretario") {
        $("#secretario").prop("selected", true);
    } else if (cargo == "outros") {
        $("#outros").prop("selected", true);
    }

});

$(document).ready(function() {
    var status = $("#status_funci").val();

    if (status == "1") {
        $("#Emservico").prop("selected", true);
    } else if (status == "2") {
        $("#Foradeservico").prop("selected", true);
    }

});

$(document).ready(function() {
    var sexys = $("#sexy").val();

    if (sexys == "h") {
        $("#Masculino").prop("selected", true);
    } else if (sexys == "f") {
        $("#Feminino").prop("selected", true);
    }

});


$(document).ready(function() {
    var turnoss = $("#turnos").val();

    if (turnoss == "Matutino") {
        $("#Matutino").prop("selected", true);
    } else if (turnoss == "Vespertino") {
        $("#Vespertino").prop("selected", true);
    }

});


/*=========================mostrar senha================================*/
function mostrar() {
    var tipo = document.getElementById("senha_func");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}