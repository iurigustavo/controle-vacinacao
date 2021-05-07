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
        </div>

        <div class="card-body">
            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-xl-12">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-2 mb-0 d-none d-md-block">Data:</label>
                                    <select class="form-control" name="data" id="data">
                                        <option value="">Todos</option>
                                        @foreach($listaDatas as $data)
                                            <option value="{{$data->data}}" {{ \Illuminate\Support\Facades\Request::input('data')  == $data->data ? 'selected' : '' }}>{{\App\Http\Helpers\DateUtils::DataParaString($data->data)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-2 mb-0 d-none d-md-block">Local:</label>
                                    <select class="form-control" name="local" id="local">
                                        <option value="">Todos</option>
                                        @foreach($listaLocais as $local)
                                            <option value="{{$local->id}}" {{ \Illuminate\Support\Facades\Request::input('local')  == $local->id ? 'selected' : '' }}>{{$local->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2 my-2 my-md-0">
                                <button type="button" onclick="redirecionar()" class="btn btn-primary px-6 font-weight-bold">
                                    Filtrar
                                </button>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            @if(isset($data['customFilter']))
                @include($data['customFilter'])
            @endif
            <div class="dataTables_wrapper dt-bootstrap4 no-footer table-">
                {!! $dataTable->table(['class' => 'table table-hover dataTable', 'width'=>"100%"], true) !!}
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('vendor/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('js/customDelete.js') }}"></script>
    {{$dataTable->scripts()}}
    <script>
        function redirecionar() {
            const data = document.getElementById('data').value;
            const local = document.getElementById('local').value;
            window.location = "?data=" + data + "&local=" + local
        }
    </script>
@endpush