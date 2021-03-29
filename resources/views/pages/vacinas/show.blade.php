<?php
    /**
     * @var Vacina $model
     */

    use App\Models\Vacina;

?>
@extends('adminlte::page')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Registro
                </h3>
            </div>
        </div>
        {!! Form::open(['url' => route('vacinas.update',$model->id), 'id'=>'validate', 'method' => 'put']) !!}
        <div class="card-body">
            <div class="form-group row">
                {!! Form::label('descricao','Descrição',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
                <div class="col-lg-9">
                    <div class="input-group">
                        {!! Form::text('descricao',$model->descricao, [ 'id' => 'nome','class' => 'form-control validate[required]']) !!}
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            {!! Form::submit('Salvar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
            <a href="{!! route('vacinas.index') !!}" class="btn btn-danger font-weight-bolder text-uppercase">Voltar</a>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="card card-custom mt-10">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Lotes
                </h3>
            </div>
            <div class="card-tools">
                <!--begin::Button-->
                <a href="{{route('vacinas.lotes.create',$model->id)}}" class="btn btn-lg btn-primary font-weight-bolder border-2">
                    Cadastrar Novo</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-hover table-sm table-responsive-sm">
                <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Validade</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @forelse($model->lotes as $lote)
                    <tr>
                        <td>{{$lote->descricao}}</td>
                        <td>{{$lote->quantidade }}</td>
                        <td>{{\App\Http\Helpers\DateUtils::DataParaString($lote->data_vencimento) }}</td>
                        <td><a href="{{route('vacinas.lotes.show',[$lote->vacina_id,$lote->id])}}" class="btn btn-sm btn-primary">Editar Lote</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Sem registros</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection