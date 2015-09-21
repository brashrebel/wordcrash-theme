/*
 WordCrash theme functionality.
 @since 0.1.0
 @global jQuery
 */
(function ($) {
    'use strict';

    $(document).foundation();

    // Init hosts shuffle
    $(function () {

        var $hosts = $('.crash-pad-list');

        $hosts.shuffle();
    });

    // Filter hosts
    $(function () {

        var $filters = $('.filter-hosts'),
            $hosts = $('.crash-pad-list'),
            cities = {};

        if (!$filters.length) {
            return;
        }

        // Generic filter
        $filters.find('select').change(function () {

            var value = $(this).val();

            if (value != '0') {
                $hosts.shuffle('shuffle', value);
            } else {
                $hosts.shuffle('shuffle', 'all');
            }
        });

        // City state relationship
        $filters.find('[name="filter-hosts-city"] option').each(function () {

            var state = $(this).data('state');

            if (!state) {
                return true;
            }

            if (!cities[state]) {
                cities[state] = [];
            }

            cities[state].push($(this).val());

            $(this).remove();
        });

        $filters.find('[name="filter-hosts-state"]').change(function () {

            var state = $(this).val(),
                i;

            if (state == '0') {
                return;
            }

            $filters.find('[name="filter-hosts-city"]').find('option[value!="0"]').remove();

            for (i = 0; i < cities[state].length; i++) {
                $filters.find('[name="filter-hosts-city"]').append($("<option></option>")
                        .attr("value",cities[state][i])
                        .text(cities[state][i]));
            }
        });
    });

    // Send user ID to GF form when trying to contact a host
    $(function () {

        var $user_grid = $('.user-grid'),
            $modal = $('#gf-ping-form'),
            $input_to_alter;

        if (!$user_grid.length || !$modal.length) {
            return;
        }

        $input_to_alter = $modal.find('#input_3_1');

        if (!$input_to_alter.length) {
            return;
        }

        $user_grid.find('.modal-trigger').click(function () {

            var user_ID = $(this).data('user-id');

            if (!user_ID) {
                return;
            }

            $input_to_alter.val(user_ID);
        });

        $(document).on('close.fndtn.reveal', '[data-reveal]', function () {

            if (!$(this).is("#gf-ping-form")) {
                return;
            }

            $input_to_alter.val('');
        });
    });

})(jQuery);