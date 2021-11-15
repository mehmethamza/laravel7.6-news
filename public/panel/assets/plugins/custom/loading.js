    jQuery(document).ready(function() {
        $('form').submit(function () {
            $('button').find('span').hide();
            $('button').find('.spinner-border').show();
        });
    });