/**
 * Created by Gustavo on 24/11/2014.
 */

havit.form = {
    handleMascaras: function () {
        $.extend($.inputmask.defaults, {
            'autounmask': false
        });
        $(".maskData").inputmask("date", {
            "placeholder": "dd/mm/aaaa",
            autoUnmask: false
        }); //direct mask
        $(".maskDataHora").inputmask("d/m/y h:s", {
            "placeholder": "dd/mm/aaaa hh:mm",
            autoUnmask: false
        }); //direct mask
        $("#mask_phone").inputmask("mask", {
            "mask": "(999) 999-9999"
        }); //specifying fn & options
        $("#mask_tin").inputmask({
            "mask": "99-9999999"
        }); //specifying options only
        $("#mask_number").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"
        $("#mask_decimal").inputmask('decimal', {
            rightAlignNumerics: false
        }); //disables the right alignment of the decimal input
        $("#mask_currency").inputmask('? 999.999.999,99', {
            numericInput: true
        }); //123456  =>  ? ___.__1.234,56

        $("#mask_currency2").inputmask('? 999,999,999.99', {
            numericInput: true,
            rightAlignNumerics: false,
            greedy: false
        }); //123456  =>  ? ___.__1.234,56
        $("#mask_ssn").inputmask("999-99-9999", {
            placeholder: " ",
            clearMaskOnLostFocus: true
        }); //default

        //===== Masked input =====//

        $.mask.definitions['~'] = "[+-]";

        $(".maskTel").mask("(99) 9999-9999");
        $(".maskCel").mask("(99) 9999-9999?9").ready(function (event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            if (typeof target != 'undefined') {
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();
                if (phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            }

        });
        $(".maskChave").mask("********")
        $(".maskPct99").mask("99");
        $(".maskPct999").mask("199%");
        $(".maskCep").mask("99999-999");
        $(".maskCpf").mask("999.999.999-99");
        $(".maskCnpj").mask("99.999.999/9999-99");
        $(".maskMoney").maskMoney({thousands: '.', decimal: ','});
        $(".maskDinheiro").maskMoney({thousands: '.', decimal: ','});
        $(".maskDecimal").maskMoney({showSymbol: false});
        $(".maskDecimal3").maskMoney({thousands: '.', decimal: ',', showSymbol: false, precision: 3});
        $(".maskCpfCnpj").change(function () {
            var cgc = $(".maskCpfCnpj").val();
            if (cgc.length == 11) {
                $(".maskCpfCnpj").mask("999.999.999-99");
                $(".maskCpfCnpj").unmask();
            } else if (cgc.length == 15) {
                $(".maskCpfCnpj").mask("99.999.999/9999-99");
                $(".maskCpfCnpj").unmask();
            } else if (cgc.length == 0) {
                $(".maskCpfCnpj").unmask();
            }
        });
        $(".maskCpfCnpj2").change(function () {
            var cgc = $(".maskCpfCnpj2").val();
            if (cgc.length == 11) {
                $(".maskCpfCnpj2").mask("999.999.999-99");
                $(".maskCpfCnpj2").unmask();
            } else if (cgc.length == 15) {
                $(".maskCpfCnpj2").mask("99.999.999/9999-99");
                $(".maskCpfCnpj2").unmask();
            } else if (cgc.length == 0) {
                $(".maskCpfCnpj2").unmask();
            }

        });
    },
    set: function (elemento, variavel, valor) {
        variavel = "{{" + variavel + "}}";
        var replaced = $(elemento).html().replace(new RegExp(variavel, "igm"), valor);
        $(elemento).html(replaced);
    }
}