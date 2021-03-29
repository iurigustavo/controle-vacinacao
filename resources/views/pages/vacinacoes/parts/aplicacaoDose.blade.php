<?php
    /**
     * @var Pessoa $model
     * @var Dose   $dose
     */

    use App\Models\Dose;
    use App\Models\Pessoa;
    use App\Models\Vacinacao;

    $vacinacao = $model->doseAplicada($dose->id);

?>
@if($vacinacao->id > 0)
    {!! Form::open(['url' => route('vacinacoes.doses.update',[$model->id,$vacinacao->id]), 'id'=>'validate_'.$dose->id, 'method' => 'put']) !!}
@else
    {!! Form::open(['url' => route('vacinacoes.doses.store',$model->id), 'id' => 'validate_'.$dose->id]) !!}
@endif

{!! Form::hidden('dose_id',$dose->id) !!}
{!! Form::hidden('pessoa_id',$model->id) !!}

<div class="form-group row">
    {!! Form::label('data','Data '.$dose->descricao,['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::text('data', \App\Http\Helpers\DateUtils::DataParaString($vacinacao->data), [ 'id' => 'data_'.$dose->id,'class' => 'form-control maskData validate[required]']) !!}
        </div>
    </div>
</div>


<div class="form-group row">
    {!! Form::label('cargo_id','Cargo',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::select('cargo_id',[NULL=>'Selecione uma opção']+$listaCargos ,$vacinacao->cargo_id, [ 'id' => 'cargo_id_'.$dose->id,'class' => 'form-control select2 validate[required]']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('local_id','Local da Vacina',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::select('local_id',[NULL=>'Selecione uma opção']+$listaLocais ,$vacinacao->local_id, [ 'id' => 'local_id_'.$dose->id,'class' => 'form-control select2 validate[required]']) !!}
        </div>
    </div>
</div>


<div class="form-group row">
    {!! Form::label('lote_id','Vacina e Lote',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::select('lote_id',[NULL=>'Selecione uma opção']+$listaVacinas ,$vacinacao->lote_id, [ 'id' => 'lote_id_'.$dose->id,'class' => 'form-control select2']) !!}
        </div>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('observacao','Observação',['class' => 'col-lg-3 col-xl-2 col-form-label text-right']) !!}
    <div class="col-lg-9">
        <div class="input-group">
            {!! Form::textarea('observacao',$vacinacao->observacao, [ 'id' => 'observacao_'.$dose->id,'class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="card-footer">
    {!! Form::submit('Salvar',['class' => 'btn btn-primary font-weight-bolder text-uppercase mr2']) !!}
    <a href="{!! route('vacinacoes.index') !!}" class="btn btn-light-primary font-weight-bolder text-uppercase">Voltar</a>
</div>
{!! Form::close() !!}
