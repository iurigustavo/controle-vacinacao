<style>

    .amcharts-pie-slice {
        transform: scale(1);
        transform-origin: 50% 50%;
        transition-duration: 0.3s;
        transition: all .3s ease-out;
        -webkit-transition: all .3s ease-out;
        -moz-transition: all .3s ease-out;
        -o-transition: all .3s ease-out;
        cursor: pointer;
        box-shadow: 0 0 30px 0 #000;
    }

    .amcharts-pie-slice:hover {
        transform: scale(1.1);
        filter: url(#shadow);
    }
</style>
{{--{{dd( (object)$porSexo->data)}}--}}
<script>
    // var randomColorGenerator = function () {
    //     return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
    // };
    var chart;
    var listaPorSexoData = [];
    @foreach($porSexo as $key =>$value)
    listaPorSexoData.push({
        status: '{{$value['sexo']}}',
        qtd: {{$value['total']}},
        color: "{{$value['sexo'] == 'Masculino' ? '#90caf9' : '#f8bbd0'}}"
    });
    @endforeach

    AmCharts.ready(function () {
        // PIE CHART
        var chart = AmCharts.makeChart('porSexo', {
            // chart = new AmCharts.AmPieChart();
            'type': 'pie',
            'theme': 'none',
            'dataProvider': listaPorSexoData,
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
            "addClassNames": true,
            "legend": {
                "autoMargins": false
            },
            "defs": {
                "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
            }
        });
    });
</script>

<div id="porSexo" style="width: 100%; height: 400px;"></div>