<?php
    /**
     * @var Pessoa    $model
     * @var Vacinacao $primeiraDose
     * @var Vacinacao $segundaDose
     * @var Dose[]    $listaDoses
     */

    use App\Models\Dose;
    use App\Models\Pessoa;
    use App\Models\Vacinacao;

?>
@extends('adminlte::page')

{{-- Content --}}
@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Cadastro de Dosagens
                </h3>
            </div>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-line">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab_5_1" data-toggle="tab" aria-expanded="true">
                        Dados Pessoais</a>
                </li>
                @foreach($listaDoses as $dose)
                    <li class="nav-item">
                        <a class="nav-link" href="#tab_dose_{{$dose->id}}" data-toggle="tab" aria-expanded="false">
                            {{$dose->descricao}} </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content mt-5">
                <div class="tab-pane fade show active" id="tab_5_1">
                    @include('pages.vacinacoes.parts.vacinacao')
                </div>
                @foreach($listaDoses as $dose)
                    <div class="tab-pane fade" id="tab_dose_{{$dose->id}}">
                        @include('pages.vacinacoes.parts.aplicacaoDose',['dose' => $dose])
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection