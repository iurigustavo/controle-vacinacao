<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<div class="table-responsive">
    <table id="table_id" class="display table table-responsive table-condensed" style="font-size: 12px;">
        <thead>
        <tr>
            <th>CPF</th>
            <th>NOME</th>
            <th>CNS</th>

            <th>1ª Dose</th>
            <th>Cargo 1ª Dose</th>
            <th>Local 1ª Dose</th>
            <th>2º Dose</th>
            <th>Cargo 2º Dose</th>
            <th>Local 2º Dose</th>

        </tr>
        </thead>

    </table>
</div>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": "{{route('pessoasVacinadas')}}",
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            },
            "columns": [
                null,
                null,
                null,
                {"type": "date-eu"},
                null,
                null,
                {"type": "date-eu"},
                null,
                null
            ],
            "order": [[3, "asc"]]
        });
    });
</script>