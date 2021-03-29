
<script>
    var chart;
    var listaEstabelecimentoData = [{
        "estabelecimento": "2012-03-01",
        "vacinados": 20
    }, {
        "data": "2012-03-02",
        "vacinados": 75
    }, {
        "data": "2012-03-03",
        "vacinados": 15
    }, {
        "data": "2012-03-04",
        "vacinados": 75
    }, {
        "data": "2012-03-05",
        "vacinados": 158
    }, {
        "data": "2012-03-06",
        "vacinados": 57
    }, {
        "data": "2012-03-07",
        "vacinados": 107
    }, {
        "data": "2012-03-08",
        "vacinados": 89
    }, {
        "data": "2012-03-09",
        "vacinados": 75
    }, {
        "data": "2012-03-10",
        "vacinados": 132
    }, {
        "data": "2012-03-11",
        "vacinados": 158
    }, {
        "data": "2012-03-12",
        "vacinados": 56
    }, {
        "data": "2012-03-13",
        "vacinados": 169
    }, {
        "data": "2012-03-14",
        "vacinados": 24
    }, {
        "data": "2012-03-15",
        "vacinados": 147
    }];

    AmCharts.ready(function () {
        var chart = AmCharts.makeChart("chartdiv", {
            "theme": "light",
            "type": "serial",
            "dataProvider": [{
                "year": 2005,
                "income": 23.5
            }, {
                "year": 2006,
                "income": 26.2
            }, {
                "year": 2007,
                "income": 30.1
            }, {
                "year": 2008,
                "income": 29.5
            }, {
                "year": 2009,
                "income": 24.6
            }],
            "valueAxes": [{
                "title": "Income in millions, USD"
            }],
            "graphs": [{
                "balloonText": "Income in [[category]]:[[value]]",
                "fillAlphas": 1,
                "lineAlpha": 0.2,
                "title": "Income",
                "type": "column",
                "valueField": "income"
            }],
            "depth3D": 20,
            "angle": 30,
            "rotate": true,
            "categoryField": "year",
            "categoryAxis": {
                "gridPosition": "start",
                "fillAlpha": 0.05,
                "position": "left"
            },
            "export": {
                "enabled": true
            }
        });
    });
</script>

<div id="porDia" style="width: 100%; height: 400px;"></div>

