{{-- Extends layout --}}
@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.bundle.css') }}">
@endpush

{{-- Content --}}
@section('content')
    <div class="card card-custom card-sticky">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    {!! $data['title'] !!} <i class="mr-2"></i>
                </h3>
            </div>
            <div class="card-tools">
                @if(!empty($data['new']))
                    <a href="{{$data['new']}}" class="btn btn-lg btn-primary font-weight-bolder border-2">
                        Cadastrar Novo</a>
                @endif
            </div>
        </div>

        <div class="card-body">
            @if(isset($data['customFilter']))
                @include($data['customFilter'])
            @endif
            <div class="dataTables_wrapper dt-bootstrap4 no-footer table-">
                {!! $dataTable->table(['class' => 'table table-hover dataTable', 'width'=>"100%"], TRUE) !!}
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('vendor/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('js/customDelete.js') }}"></script>
    {{$dataTable->scripts()}}
@endpush