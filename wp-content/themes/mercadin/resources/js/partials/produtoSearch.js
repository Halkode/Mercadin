import "lodash";

export default function () {
    $("#txtBusca").on( 'keyup', _.debounce( function(e) {
        $('#results-search').html('');

        if ($("#txtBusca").val()) {
            $('#results-search').html('<p class="loading-content">Carregando...</p>');

            // global wp
            // global themeData

            $.ajax({
                url: `${themeData.restURL}/prods`,
                data: {
                    s: $("#txtBusca").val()
                },
                type: 'GET',
                dataType: 'json',
            }).done(response => {

                $('#results-search').html('<ul></ul>');
                response.prods.map(item => {
                    $('#results-search ul').append(
                        '<li>' +
                        '<a href="'+item.link+'"> <div class="produt-item-result"> ' +
                        '<img src="' + item.thumb + '" alt="prod-img">' +
                        '<p>' + item.title + '</p>' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>' +
                        '</div></a>' +
                        '</li>' +
                        '</ul>');
                })

                $('#results-search').append('<div class="button-global"> <button type="submit" class="btn btn-rounded btn-submit-search">Ver todos resultados</button> </div>')



            }).fail(err => {

                $('#results-search').html('<p>Nenhum resultado encontrado</p>');
            })

        }
    }, 800));

    $('#txtBusca').on('search', function() {
        if ( $(this).val() == '' ) {
            $('#results-search').html('');
        }
    })

    // $(window).on('load', function() {
    //     $('.woof_container_checkbox h4').text( function(index, text) {
    //         return text.replace('Atributo', '').replace('de produto', '').replace('"', '').replace('"','');
    //     });
    // });

    $('.woof_list_checkbox input[type=checkbox]').on('change', function() {
        $('.col-filters form').trigger('submit');
    })
    
    // $('.col-filters input[type=checkbox]').on('change', function() {
    //     console.log($(this).parent());
    //     $(this).parent().trigger('click');
    // })

    $(window).on('load', function() {
        let max = $('#max_price').val() ? $('#max_price').val() : $('#max_price').data('max');
        $('#max_price').val(max);
        let min = $('#min_price').val() ? $('#min_price').val() : $('#min_price').data('min');
        $('#min_price').val(min);
        $('.price_slider_amount .price_label .from').html('R$' + min );
        $('.price_slider_amount .price_label .to').html('R$' + max);

        let UrlParams = new URLSearchParams(location.search);
        let param = UrlParams.get('max_price');

        if (!param) {
            $('.ui-slider-handle:last-child').addClass('initial');
            $('.ui-slider-range').addClass('initial');
        }

        // if ( !$('#max_price').val() ) {
        //     $('.ui-slider-handle:last-child').css('left: 100%');
        //     $('.ui-slider-range').css('width: 100%');
        // }
    });

    $(document).on('mousedown', '.ui-slider-handle', function() {
        console.log('ok')
        $('.ui-slider-handle:last-child').removeClass('initial');
        $('.ui-slider-range').removeClass('initial');
        $('#max_price').val($('#max_price').data('max'))
    })

    $(document).on('click', '.price_slider_amount .price_label .from, .price_slider_amount .price_label .to', function() {

        if ( !$('#max_price').val() ) {
            $('.ui-slider-handle:last-child').css('left: 100%');
            $('.ui-slider-range').css('width: 100%');
        }
    });

    $(document).click(function(e) {
        var container = $("#results-search");
        var button =  $("#txtBusca");

        if (!container.is(e.target) && container.has(e.target).length === 0 && !button.is(e.target)) {
            container.hide();
        }
    });

    $("#txtBusca").click(function () {
        var container = $("#results-search");
        container.show();
    })

    $(document).on('click', '.collapse-categories-button', function () {
        $(this).toggleClass('opened');
        let catId = $(this).data('category-id');
        $('.collapse-categories-'+catId).toggleClass('opened');
    })
}