<script>
    var randomColorGenerator = function () {
        return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
    };
    var chart;
    var listaFaixaEtariaPrioritarioData = [];
    @foreach($porFaixaEtaria as $key =>$value)
    listaFaixaEtariaPrioritarioData.push({
        grupo: '{{$value['faixa_etaria']}}',
        quantidade: {{$value['total']}},
        color: [randomColorGenerator()]
    });
    @endforeach

    AmCharts.ready(function () {
        var chart = AmCharts.makeChart("porFaixaEtariaPrioritario", {
            "hideCredits": true,
            "type": "serial",
            "theme": "light",
            "marginRight": 70,
            "dataProvider": listaFaixaEtariaPrioritarioData,
            "valueAxes": [{
                "axisAlpha": 0,
                "minimum": 0,
                "position": "left",
                "title": "Quantidade de Vacinados",
            }],
            "startDuration": 1,
            "graphs": [{
                "balloonText": "<b>[[category]]: [[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "quantidade"
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "grupo",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 0
            },
            "export": {
                "enabled": true
            },
            "numberFormatter": {
                "precision": -1,
                "decimalSeparator": ",",
                "thousandsSeparator": "."
            }
        });

    });
</script>

<div id="porFaixaEtariaPrioritario" style="width: 100%; height: 400px;"></div>