$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click', '.remove-confirmation', function (e) {
    e.preventDefault();
    const current_object = $(this);

    Swal.fire({
        title: 'Você tem certeza?',
        text: "Você não poderá reverter a exclusão!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, delete agora!',
        cancelButtonText: 'Cancelar!'
    }).then(function (e) {
        if (e.value) {
            var token = $('meta[name="csrf-token"]').attr('content');
            var action = current_object.attr('data-action');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='" + action + "'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="' + token + '">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="' + id + '">');
            $('body').find('.remove-form').submit();

        } else if (
            /* Read more about handling dismissals below */
            e.dismiss === Swal.DismissReason.cancel
        ) {
            // Swal.fire(
            //     'Cancelado',
            //     'Que bom que mudou de idéia',
            //     'info'
            // );
        }
    });


});
