<script>
    var chart;
    var listaPorGrupo = [{
        "grupo": "IDOSOS ILPI",
        "vacinados": 3025,
        "color": "#1266F1"
    }, {
        "grupo": "TRABALHADORES DA SAÚDE",
        "vacinados": 1882,
        "color": "#F93154"
    }];


    AmCharts.ready(function () {
        // PIE CHART
        var chart = AmCharts.makeChart("porGrupo", {
            "type": "serial",
            "theme": "light",
            "marginRight": 70,
            "dataProvider": listaPorGrupo,
            "valueAxes": [{
                "axisAlpha": 0,
                "position": "left",
                "title": "Quantidade de Vacinados"
            }],
            "startDuration": 1,
            "graphs": [{
                "balloonText": "<b>[[category]]: [[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "vacinados"
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "grupo",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 45
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

<div id="porGrupo" style="width: 100%; height: 400px;"></div>