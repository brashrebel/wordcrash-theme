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

                if ($(this).attr('name') == 'filter-hosts-city') {
                    $hosts.shuffle('shuffle', $filters.find('[name="filter-hosts-state"]').val());
                } else {
                    $hosts.shuffle('shuffle', 'all');
                }
            }
        });

        // City, state, country relationship
        $filters.find('[name="filter-hosts-city"] option').each(function () {

            var country = $(this).data('country'),
                state = $(this).data('state');

            if (!country) {
                return true;
            }

            if (!cities[country]) {
                cities[country] = [];
            }
            
            if (!cities[country][state]) {
                cities[country][state] = [];
            }

            cities[country][state].push($(this).val());

            $(this).remove();
        });
        
        $filters.find('[name="filter-hosts-country"]').change(function () {

            var country = $(this).val();

            if (country == '0') {
                return;
            }

            $filters.find('[name="filter-hosts-state"]').find('option[value!="0"]').remove();
            $filters.find('[name="filter-hosts-city"]').find('option[value!="0"]').remove();

            // For/In since we only have Keys to work with
            for ( var state in cities[country] ) {
                $filters.find('[name="filter-hosts-state"]').append($("<option></option>")
                        .attr("value", state)
                        .attr("data-country", country)
                        .text(state));
            }
        });

        $filters.find('[name="filter-hosts-state"]').change(function () {

            var state = $(this).val(),
                country = $(this).find('option[value="' + state + '"]').data('country'),
                i;

            if (country == '0' || state == '0') {
                return
            }

            $filters.find('[name="filter-hosts-city"]').find('option[value!="0"]').remove();

            for (i = 0; i < cities[country][state].length; i++) {
                $filters.find('[name="filter-hosts-city"]').append($("<option></option>")
                        .attr("value", cities[country][state][i] )
                        .attr("data-country", country )
                        .attr("data-state", state )
                        .text( cities[country][state][i] ));
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