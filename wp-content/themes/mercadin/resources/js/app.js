require('./bootstrap');

import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import 'popper.js';
import 'bootstrap';
import '@fancyapps/fancybox';

import produtoSearch from "./partials/produtoSearch";
import menu from './partials/menu';

($ => {
    $(() => {
        menu();
        produtoSearch();
        $(document).on('click', '.btn-plus, .btn-minus', function (e) {
            const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
            const input = $(e.target).closest('.input-group').find('input');
            const action = $(e.target).closest('.product').find('a.add-to-cart');

            const otherincome = $(".price-second").data('price');


            

            if (input.is('input') ) {
                input[0][isNegative ? 'stepDown' : 'stepUp']()
            }
            $(action).attr('data-quantity', parseInt($(input).val()));
            $(action).attr($(input).val(), parseInt($(input).val()));
            const total = ( parseFloat(otherincome) * parseInt($(input).val()) );
            $(".price-second").html( 'R$ '+total);

            console.log(otherincome, total)
            $('.cart-details button[name="update_cart"]').removeAttr('disabled')
        })
    });
})(jQuery);
