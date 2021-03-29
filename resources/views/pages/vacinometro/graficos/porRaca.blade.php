<?php $cores = [
    '',
    '#8b0ccf', //agendado
    '#f9ff01', //confirmado
    '#0d52d1', //triagem
    '#cd0d74', //aguardando
    '#05d215', //em consulta
    '#b0de09', //em procedimento
    '#0d8ecf', //finalizado
    '#fcd202', //desistencia
    '#ff9e01', //em observacao
    '#ff6600', //rechamada
    '#05d215', //procedimento rechamada
    '',
    '',
    '',
    '#ff9e01' //alta administrativa
]; ?>

<script>
    var chart;
    var listaPorRacaData = [];

    listaPorRacaData.push({
        status: "AMARELA",
        qtd: 60,
        color: "#f1b55f"
    });
    listaPorRacaData.push({
        status: "BRANCA",
        qtd: 30,
        color: "#fcd202"
    });
    listaPorRacaData.push({
        status: "NÃO INFORMADO",
        qtd: 30,
        color: "#dc6460"
    });
    listaPorRacaData.push({
        status: "INDÍGENA",
        qtd: 30,
        color: "#b0de09"
    });
    listaPorRacaData.push({
        status: "PARDA",
        qtd: 30,
        color: "#3490df"
    });
    listaPorRacaData.push({
        status: "PRETA",
        qtd: 30,
        color: "#B23CFD"
    });






    AmCharts.ready(function () {
        // PIE CHART
        var chart = AmCharts.makeChart('porRaca', {
            // chart = new AmCharts.AmPieChart();
            'type': 'pie',
            'dataProvider': listaPorRacaData,
            'titleField': "status",
            'valueField': "qtd",
            'outlineColor': "#FFFFFF",
            'colorField': "color",
            'balloonText': "[[title]]: <b>[[value]]</b>",
            'outlineAlpha': 0.8,
            'outlineThickness': 0,
            'minRadius': 100,
            'pullOutRadius': 30,
            'startRadius': 50,
            'startDuration': 0.5,
            'startEffect': "easeOutSine",
            'hideCredits': true,
            "innerRadius": "60%",
            "export": {
                "enabled": true
            },
            "legend":{
                "autoMargins":false
            },
        });
    });
</script>

<div id="porRaca" style="width: 100%; height: 400px;"></div>

{{--<ul id="legendaAtendimento" class="visible-xs">--}}
{{--    <li>--}}
{{--        <div class="cor" style="background-color: #b0de09"></div>--}}
{{--        <div class="desc">EM PROCEDIMENTO</div>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--        <div class="cor" style="background-color: #05d215"></div>--}}
{{--        <div class="desc">EM CONSULTA</div>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--        <div class="cor" style="background-color: #0d8ecf"></div>--}}
{{--        <div class="desc">FINALIZADO</div>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--        <div class="cor" style="background-color: #ff6600"></div>--}}
{{--        <div class="desc">RECHAMADA</div>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--        <div class="cor" style="background-color: #cd0d74"></div>--}}
{{--        <div class="desc">AGUARDANDO</div>--}}
{{--    </li>--}}
{{--</ul>--}}