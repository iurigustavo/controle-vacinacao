<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>

<!-- Chart code -->
<script>
    var chart;
    var listaPorDiaData = [];
    @foreach($porDia as $key =>$value)
    listaPorDiaData.push({
        date: '{{$value['data']}}',
        value: {{$value['total']}},
    });
    @endforeach
    var chart = AmCharts.makeChart("chartdiv", {
        "hideCredits": true,
        "type": "serial",
        "theme": "none",
        "dataProvider": listaPorDiaData,
        "valueAxes": [{
            "axisAlpha": 0,
            "dashLength": 4,
            "position": "left"
        }],
        "graphs": [{
            "bulletSize": 14,
            "customBullet": "https://www.amcharts.com/lib/3/images/star.png?x",
            "customBulletField": "customBullet",
            "valueField": "value",
            "balloonText": "<div style='margin:10px; text-align:left;'><span style='font-size:13px'>[[category]]</span><br><span style='font-size:18px'>Vacinados :[[value]]</span>",
        }],
        "marginTop": 20,
        "marginRight": 70,
        "marginLeft": 40,
        "marginBottom": 20,
        "chartCursor": {
            "graphBulletSize": 1.5,
            "zoomable": false,
            "valueZoomable": true,
            "cursorAlpha": 0,
            "valueLineEnabled": true,
            "valueLineBalloonEnabled": true,
            "valueLineAlpha": 0.2
        },
        "autoMargins": false,
        "dataDateFormat": "YYYY-MM-DD",
        "categoryField": "date",

        "valueScrollbar": {
            "offset": 30
        },
        "categoryAxis": {
            "parseDates": false,
            "axisAlpha": 0,
            "gridAlpha": 0,
            "inside": true,
            "tickLength": 0
        },
        "export": {
            "enabled": true
        }
    });
</script>

<!-- HTML -->
<div id="chartdiv"></div>