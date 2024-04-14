
$(document).ready(function () {
    $('#search').on('keyup', function () {
        var query = $(this).val();

        if(query){
            $('.alldata').hide();
            $('.vistadata').show();
        }else{
            $('.alldata').show();
            $('.vistadata').hide();
        }

        var searchUrl = $(this).data('search-url'); // Obtiene la URL de la ruta de búsqueda
        $.ajax({
            url: searchUrl,
            type: "GET",
            data: {search: query},
            success: function (data) {
                
                var output = '';

                if (data.length > 0) {
                    $.each(data, function (key, card) {
                        output += '<div class="col-sm-12 col-md-6 col-lg-4">'
                        output += '<div class="card h-100">';
                        output += '<img src="storage/' + card.card_image +'" class="card-img-top" alt="' + card.card_image + '" data-bs-toggle="modal" data-bs-target="#exampleModal'+card.card_id+'">';
                        output += '<div class="card-body">';
                        output += '<h5 class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal'+card.card_id+'">' + card.card_title + '</h5>';
                        output += '</div>';
                        output += '</div>';
                        output += '</div>';
                        //modal

                    });
                } else {
                    output += '<div class="alert alert-primary" role="alert">No hay registro de lo que buscas!</div>';
                }
                $('#container_search').html(output);
            }
        });
    });
});

