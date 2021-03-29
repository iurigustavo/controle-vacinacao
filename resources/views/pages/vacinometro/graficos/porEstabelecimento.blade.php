<script>
    var randomColorGenerator = function () {
        return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
    };
    var chart;
    var listaEstabelecimentoData = [];
    @foreach($porEstabelecimento as $key =>$value)
    listaEstabelecimentoData.push({
        estabelecimento: '{{$value['descricao']}}',
        doses: {{$value['total']}},
        color: [randomColorGenerator()]
    });
    @endforeach



    AmCharts.ready(function () {

        var chart = AmCharts.makeChart("porEstabelecimento", {
            "hideCredits": true,
            "theme": "light",
            "type": "serial",
            "dataProvider": listaEstabelecimentoData,
            "valueAxes": [{
                "title": "Doses Aplicadas"
            }],
            "graphs": [{
                "balloonText": "Doses na [[category]]: [[value]]",
                "fillAlphas": 1,
                "lineAlpha": 0.2,
                "title": "Doses",
                "type": "column",
                "valueField": "doses",
            }],
            "depth3D": 10,
            "angle": 30,
            "rotate": true,
            "categoryField": "estabelecimento",
            "categoryAxis": {
                "gridPosition": "start",
                "fillAlpha": 0.05,
                "position": "left"
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

<div id="porEstabelecimento" style="width: 100%; height: 1200px;"></div>

