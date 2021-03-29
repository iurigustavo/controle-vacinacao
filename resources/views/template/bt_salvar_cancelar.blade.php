<button type="submit" class="btn btn-light-primary font-weight-bold mr-2">
    <i class="fa fa-check"></i> Salvar
</button>
@if(isset($data['btnCancelar']))

    <a href="{!! route($data['btnCancelar'])!!}">
        <button type="button" class="btn btn-light-success font-weight-bold mr-2">
            <i class="fa fa-backward"></i>Cancelar
        </button>
    </a>

@else

    <a href="javascript:history.back(-1)">
        <button type="button" class="btn btn-light-success font-weight-bold mr-2">
            <i class="fa fa-backward"></i>Cancelar
        </button>
    </a>

@endif