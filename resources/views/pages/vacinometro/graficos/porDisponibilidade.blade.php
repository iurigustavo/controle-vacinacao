<script>
    var chart;
    var listaDisponibilidadeData = [{
        "grupo": "1° Dose",
        "quantidade": 60,
        "color": "#1266F1"
    }];

    AmCharts.ready(function () {
        var chart = AmCharts.makeChart("porDisponibilidade", {
            "type": "serial",
            "theme": "light",
            "marginRight": 70,
            "dataProvider": listaDisponibilidadeData,
            "valueAxes": [{
                "axisAlpha": 0,
                "maximum" : 100,
                "minimum": 0,
                "position": "left",
                "title": "Quantidade de Vacinados",
            }],
            "startDuration": 1,
            "graphs": [{
                "balloonText": "<b>[[category]]: [[value]]%</b>",
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

<div id="porDisponibilidade" style="width: 100%; height: 400px;"></div>