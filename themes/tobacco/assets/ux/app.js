(function ($) {

    jQuery(document).ready(function () {
        jQuery('body').jKit();

        var $window = jQuery(window);

        var $menuTop = jQuery('#menu-top');
        var $landing = jQuery('#landing');
        var $listDetail = jQuery('#list-detail');


        // listen scroll
        if ($landing.length > 0) {
            jQuery(document).on('scroll', function () {
                console.info('tes');
                activefixedMenuTop($window.scrollTop(), $menuTop, $landing);
            });

            activefixedMenuTop($window.scrollTop(), $menuTop, $landing);
        }
        else {
            $menuTop.removeClass('navbar-inverse').addClass('navbar-default');
        }

        // list detail
        /*if ($listDetail.length > 0) {
            window.listDetailFIx();
        }*/

    });


    // quick function
    var activefixedMenuTop = function (pos, $menuTop, $landing) {

        // prevent loading continue
        if ($menuTop.is('.animating')) return;

        // get landing box
        var landingHeight = $landing.outerHeight();

        if ($menuTop.is('.navbar-default') && pos >= landingHeight) return;
        if ($menuTop.is('.navbar-inverse') && pos < landingHeight) return;

        $menuTop.addClass('animating');
        if (pos >= landingHeight) {
            $menuTop.stop().animate({top: '-60px'}, 100, function () {
                $menuTop.addClass('navbar-default');
                $menuTop.removeClass('navbar-inverse');
                $menuTop.animate({top: 0}, 400, function () {
                    $menuTop.removeClass('animating');
                });
            })
        }
        else {
            $menuTop.stop().animate({top: '-60px'}, 100, function () {
                $menuTop.addClass('navbar-inverse');
                $menuTop.removeClass('navbar-default');
                $menuTop.animate({top: 0}, 400, function () {
                    $menuTop.removeClass('animating');
                });
            });
        }
    };

    window.listDetailFIx = function () {
        jQuery(document).on('scroll', function () {
            console.info('tes');
            //activefixedMenuTop($window.scrollTop(), $menuTop, $landing);
        });
    }

})(jQuery);