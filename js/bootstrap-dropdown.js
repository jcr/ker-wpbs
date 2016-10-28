jQuery(document).ready(function($) {
    // Adjust submenu to fit in screen
    $('.dropdown').click(function(e) {
        if (e.target.href) {
            window.location.href = e.target.href;
        }
    });
    $('.dropdown a').hover(function(e) {
        var target = $(this).parent();
        if (e.type === 'mouseenter') {
            var p = target.parent().find('.open');
            p.removeClass('open');
            var subMenu = target.find('.dropdown-menu').eq(0);
            if (subMenu) {
                var offset = target.width() + target.offset().left + subMenu.width();
                var isVis = (offset  <= $(window).width() );
                target.toggleClass('pull-left', !isVis);
                target.addClass('open');
            }
        }
    });
}, jQuery);
