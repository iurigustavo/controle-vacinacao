<!-- Resources -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<style>

    .centered {
        margin: 0 auto !important;
        float: none !important;
    }
</style>
<!------------- GRÁFICOS ------------->
<div class="" style="margin-top: 50px">
    <h4 style="text-align: center; background-color: #c5c5c5; padding: 10px">VACINÔMETRO</h4>
    <div class="col-md-12">
        <div class="row">
            <!-------- TOTAL VACINADOS ------->
            <div class="col-md-6">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">TOTAL VACINADOS</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-9 centered">
                                <p style="font-size: 70px"><img src="{{asset('assets/site/img/syringe.png')}}" alt="">
                                    {!! $resultTotalVacinados !!}</p>
                                <div class="row">
                                    @foreach($resultPorDose as $porDose)
                                        <div class="col-8 col-sm-6 centered">
                                            <h3>{{$porDose['descricao']}}</h3>
                                            <p>{!!$porDose['total']!!}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    --}}{{--                    </div>--}}
                </div>
            </div>
            <!-------- TOTAL VACINADOS FIM ------->
            <!-------- POR SEXO ------->
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">VACINAÇÃO POR SEXO</h3>
                    </div>
                    <div class="panel-body">

                        <!-------- SEXO ------->
                        @include('pages.vacinometro.graficos.sexo',['porSexo'=>$resultPorSexo])
                        <hr>


                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">VACINAÇÃO POR DIA (GRUPOS PRIORITÁRIOS)</h3>
                    </div>
                    <div class="panel-body">

                        <!-------- DIA ------->
                        @include('pages.vacinometro.graficos.porDia',['porDia'=>$resultPorDia])
                        <hr>


                    </div>
                </div>
            </div>

            <!-------- POR FAIXA ETARIA ------->
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">VACINAÇÃO POR FAIXA ETÁRIA (GRUPOS PRIORITÁRIOS)</h3>
                    </div>
                    <div class="panel-body">
                        <!-------- FAIXA ETARIA ------->
                        @include('pages.vacinometro.graficos.porFaixaEtariaPrioritario',['porFaixaEtaria'=>$resultPorFaixaEtaria])
                        <hr>
                    </div>
                </div>
            </div>
            <!-------- POR FAIXA ETARIA FIM ------->
            <!-------- POR ESTABELECIMENTO ETARIA ------->
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">NÚMERO DE DOSES APLICADAS POR ESTABELECIMENTO DE SAÚDE</h3>
                    </div>
                    <div class="panel-body">

                        <!-------- FAIXA ESTABELECIMENTO ------->
                        @include('pages.vacinometro.graficos.porEstabelecimento',['porEstabelecimento'=>$resultPorEstabelecimento])
                        <hr>
                    </div>
                </div>
            </div>
            <!-------- POR ESTABELECIMENTO FIM ------->

        </div>
        <!------------- GRÁFICOS FIM ------------->
    </div>

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">PESSOAS VACINADAS</h3>
            </div>
            <div class="panel-body">
                <!-------- FAIXA ESTABELECIMENTO ------->
                @include('pages.vacinometro.graficos.pessoasVacinadas')
                <hr>
            </div>
        </div>
    </div>

</div>
