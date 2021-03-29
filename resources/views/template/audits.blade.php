<!-- Modal-->
<div class="modal fade" id="modal{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterações Realizadas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <p><b>User Agent: </b> {{$model->user_agent}}</p>
                <p><b>IP: </b> {{$model->ip_address}}</p>
                <p><b>URL: </b> {{$model->url}}</p>
                <h3>Original</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Campo</th>
                        <th scope="col">Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($model->old_values as $key => $old)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$old}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <h3>Modificado para</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Campo</th>
                        <th scope="col">Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($model->new_values as $key => $new)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$new}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>