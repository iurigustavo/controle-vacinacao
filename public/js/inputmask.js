var KTInputmask = function () {

    // Private functions
    var demos = function () {


        $(".maskChave").inputmask("********");
        $(".maskPct99").inputmask("99");
        $(".maskPct999").inputmask("199%");
        $(".maskCep").inputmask("99999-999");
        $(".maskCpf").inputmask("999.999.999-99");
        $(".maskCnpj").inputmask("99.999.999/9999-99");
        $(".maskDataHora").inputmask('datetime', {
            "placeholder": "dd/mm/aaaa hh:mm",
            inputFormat:'dd/mm/yyyy HH:MM',
            autoUnmask: false
        }); //direct mask
        $(".maskData").inputmask('datetime', {
            "placeholder": "dd/mm/aaaa",
            inputFormat:'dd/mm/yyyy',
            autoUnmask: false
        }); //direct mask
        $("#kt_inputmask_1").inputmask("99/99/9999", {
            "placeholder": "mm/dd/yyyy",
            autoUnmask: true
        });
        $(".maskMoney").maskMoney({thousands: '.', decimal: ','});
        // $(".maskDinheiro").maskMoney({thousands: '.', decimal: ','});
        // $(".maskDecimal").maskMoney({showSymbol: false});
        // $(".maskDecimal3").maskMoney({thousands: '.', decimal: ',', showSymbol: false, precision: 3});
        $(".maskCpfCnpj").change(function () {
            var cgc = $(".maskCpfCnpj").val();
            if (cgc.length == 11) {
                $(".maskCpfCnpj").inputmask("999.999.999-99");
                $(".maskCpfCnpj").unmask();
            } else if (cgc.length == 15) {
                $(".maskCpfCnpj").inputmask("99.999.999/9999-99");
                $(".maskCpfCnpj").unmask();
            } else if (cgc.length == 0) {
                $(".maskCpfCnpj").unmask();
            }
        });
        $(".maskTel").inputmask("(99) 9999-9999");
        $(".maskCel").inputmask("(99) 99999-9999");


    };

    return {
        // public functions
        init: function () {
            demos();
        }
    };
}();

var KTSelect2 = function () {

    // Private functions
    var demos = function () {
        $('.select2').select2({});
    };
    return {
        // public functions
        init: function () {
            demos();
        }
    };
}();


jQuery(document).ready(function () {
    KTInputmask.init();
    KTSelect2.init();

});