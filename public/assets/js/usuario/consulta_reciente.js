// assets/js/usuario/consulta_reciente.js
$(document).ready(function(){
    $('.filtro').on('input', function(){
        applyFilters();
    });

    function applyFilters() {
        var form = $('#filtro-form');
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function(response) {
                $('tbody').html($(response).find('tbody').html());
                $('.d-flex').html($(response).find('.d-flex').html());

                $('.caso-row').on('click', function(){
                    var cliente = $(this).data('cliente');
                    var documento = $(this).data('documento');
                    var url = $(this).data('url');

                    $('#clienteNombre').text(cliente);
                    $('#documentoNombre').text(documento);
                    $('#documentoLink').attr('href', url);
                });
            },
            error: function(xhr) {
                console.log('Error:', xhr.responseText);
            }
        });
    }

    $('.caso-row').on('click', function(){
        var cliente = $(this).data('cliente');
        var documento = $(this).data('documento');
        var url = $(this).data('url');

        $('#clienteNombre').text(cliente);
        $('#documentoNombre').text(documento);
        $('#documentoLink').attr('href', url);
    });
});