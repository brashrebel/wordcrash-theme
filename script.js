/*
 WordCrash theme functionality.
 @since 0.1.0
 @global jQuery
 */
(function ($) {
    'use strict';

    $(document).foundation();

    // Put your functionality here!

    // This is jQuery's default way of waiting until the page loads. Wrap anything that interacts with the DOM in one of
    // these closures
    $(function () {

        // Best to store this DOM element for quick reference, also so we don't have to look it up more than once
        var $user_grid = $('.user-grid'),
            $modal = $('#gf-ping-form'),
            $input_to_alter; // Init our var here instead of later (just JS best practice to init all usable variables
                             // at the top of each closure

        // Make sure everything exists before doing ANYTHING!
        if (!$user_grid.length || !$modal.length) {
            return;
        }

        // Now that we know the $modal exists, try to find the input to alter (this would be the hidden input in the GF)
        $input_to_alter = $modal.find('#input_3_1');

        // Again, bail if we don't have what we need
        if (!$input_to_alter.length) {
            return;
        }

        // Fire this function when clicking a trigger
        $user_grid.find('.modal-trigger').click(function () {

            // This is how we grab the `data-user-id` attr. Alternatively, we could use `$(this).attr('data-user-id');`
            var user_ID = $(this).data('user-id');
            console.log(user_ID);

            // Again, make sure we have what we need before proceeding
            if (!user_ID) {
                return;
            }

            $input_to_alter.val(user_ID);
        });

        // It would be wise to erase the ID value once we close the form, to avoid any weirdness
        $(document).on('close.fndtn.reveal', '[data-reveal]', function () {

            // Make sure this is the right modal before continuing
            if (!$(this).is("#gf-ping-form")) {
                return;
            }

            $input_to_alter.val('');
        });
    });

})(jQuery);