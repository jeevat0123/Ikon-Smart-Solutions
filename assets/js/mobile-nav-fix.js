// Mobile dropdown toggle
jQuery(document).ready(function ($) {

    // Inject a toggle arrow on every dropdown parent inside the mobile menu
    $('.mobile-menu .navigation li.dropdown > a').each(function () {
        if (!$(this).find('.dropdown-btn').length) {
            $(this).append('<span class="dropdown-btn"><i class="fas fa-chevron-down"></i></span>');
        }
    });

    // Tap the arrow (or the link itself if it has no real href) to expand
    $('.mobile-menu .navigation li.dropdown').on('click', '> a .dropdown-btn, > a[href="#"]', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var $li = $(this).closest('li.dropdown');
        $li.siblings('.dropdown').children('ul').slideUp(200);
        $li.siblings('.dropdown').removeClass('open');
        $li.children('ul').slideToggle(200);
        $li.toggleClass('open');
    });

});