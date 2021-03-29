<?php
    /**
     * @var Vacinacao $model
     */

    use App\Models\Vacinacao;

?>
@extends('adminlte::page')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Cadastro de Pessoas
                </h3>
            </div>
        </div>

        <div class="card-body">
            @include('pages.vacinacoes.parts.vacinacao')
        </div>


    </div>
@endsection