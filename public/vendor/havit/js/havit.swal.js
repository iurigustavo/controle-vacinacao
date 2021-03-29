/**
 * Created by Gustavo on 24/11/2014.
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


havit.swal = {
    remover: function (url) {
        swal({
            title: "Tem certeza?",
            text: "Deseja remover o registro?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim!",
            cancelButtonText: "Não!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                havit.utils.redirecionar(url);
            }
        });
    },

    sucesso: function (msg) {
        Swal.fire({title: "Sucesso!", text: msg, icon: "success", timer: 4000});
    },

    erro: function (msg) {
        Swal.fire({title: "Erro!", text: msg, icon: "error", timer: 4000});
    },

    mensagem: function (titulo, msg) {
        Swal.fire({title: titulo, text: msg, timer: 4000});
    },
    confirmar: function (msg, url) {
        Swal.fire({
            title: "Tem certeza?",
            text: msg,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#32c5d2",
            confirmButtonText: "Sim!",
            cancelButtonText: "N�o!",
            cancelButtonColor: "#e7505a",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                havit.utils.redirecionar(url);
            }
        });
    },

    sair: function (url) {
        Swal.fire({
            title: "Tem certeza?",
            text: "Deseja sair do sistema?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim!",
            cancelButtonText: "N�o!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                havit.utils.redirecionar(url);
            }
        });
    }


};