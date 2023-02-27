export default function() {
    $(document).on('click', '.toggle-mobile-menu', function() {
        $('.toggle-mobile-menu').toggleClass('active');
        $('.main-nav').toggleClass('open');
    });
    
    $(document).on('click', '.main-header .btn-search', function() {
        $('.search-modal').addClass('open');
    });
    
    $(document).on('click', '.close-search', function() {
        $('.search-modal').removeClass('open');
    });

    $(document).on('click', '.language-selector', function(){
        var el = $(this);
        if(el.hasClass('active')) {
            $('.language-options').removeClass('active');
            el.removeClass('active');
        } else {
            el.parent().find('.language-options').addClass('active');
            el.addClass('active');
        }
    });
}