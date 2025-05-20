jQuery(function () {

    jQuery('body').on('mouseup', '.pgen-password-input, .pgen-password-textarea', function () {
        jQuery(this).select();
    });


    jQuery('#pgen_pwd_specialcharacters').click(function () {

        if (jQuery(this).is(':checked')) {
            if (!jQuery('#pgen-specialcharacterslist-container').is(':visible')) {
                jQuery('#pgen-specialcharacterslist-container').slideDown('fast');
            }

            if (jQuery('#pgen-specialcharacterslist-container').is(':visible')) {
                jQuery('#pgen_checkallspecialcharacters').hide();

                jQuery('#pgen_uncheckallspecialcharacters').show();
            }

            jQuery('.pgen-specialcharacter-container').find('label').addClass('pgen-specialcharacter-selected');

            jQuery('.pgen-checkbox-specialcharacter').each(function () {
                jQuery(this).prop('checked', true)
            });
        }

        if (!jQuery(this).is(':checked')) {
            jQuery('#pgen-specialcharacterslist-container').slideUp('fast');

            jQuery('.pgen-checkbox-specialcharacter').prop('checked', false);

            jQuery('.pgen-specialcharacter-container').find('label').removeClass('pgen-specialcharacter-selected');

            jQuery('.pgen-checkbox-specialcharacter').each(function () {
                jQuery(this).prop('checked', false)
            });
        }

    });


    jQuery('#pgen_uncheckallspecialcharacters').click(function () {

        jQuery(this).hide();

        jQuery('#pgen_checkallspecialcharacters').show();

        jQuery('.pgen-checkbox-specialcharacter, #pgen_pwd_specialcharacters').prop('checked', false);

        jQuery('label[for="pgen_pwd_specialcharacters"]').find('.pgen-label-title').removeClass('pgen-label-selected');

        jQuery('.pgen-specialcharacter-container').find('label').removeClass('pgen-specialcharacter-selected');

    });


    jQuery('#pgen_checkallspecialcharacters').click(function () {

        jQuery(this).hide();

        jQuery('#pgen_uncheckallspecialcharacters').show();

        jQuery('.pgen-checkbox-specialcharacter, #pgen_pwd_specialcharacters').prop('checked', 'checked');

        jQuery('label[for="pgen_pwd_specialcharacters"]').find('.pgen-label-title').addClass('pgen-label-selected');

        jQuery('.pgen-specialcharacter-container').find('label').addClass('pgen-specialcharacter-selected');

    });


    jQuery('.pgen-checkbox-specialcharacter').click(function () {

        if (jQuery(this).is(':checked')) {
            jQuery('#pgen_pwd_specialcharacters').prop('checked', 'checked');
        }

        if (!jQuery('.pgen-checkbox-specialcharacter:checked').length) {

            jQuery('#pgen_pwd_specialcharacters').prop('checked', false);

            jQuery('#pgen_uncheckallspecialcharacters').hide();

            jQuery('#pgen_checkallspecialcharacters').show();

            jQuery('label[for="pgen_pwd_specialcharacters"]').find('.pgen-label-title').removeClass('pgen-label-selected');
        }

    });


    jQuery('input[name="pgen_pwd_options[]"]').click(function () {

        var pgen_option_label = jQuery(this).closest('.pgen-password-option').find('.pgen-label-title');

        if (jQuery(this).is(':checked')) {

            pgen_option_label.addClass('pgen-label-selected');

        } else {

            pgen_option_label.removeClass('pgen-label-selected');
        }

    });


    jQuery('input[name="pgen_specialcharacter[]"]').click(function () {

        var pgen_option_label = jQuery('label[for="pgen_pwd_specialcharacters"]').find('.pgen-label-title');

        var pgen_optionspecialcharacter_label = jQuery(this).closest('.pgen-specialcharacter-container').find('label');

        if (jQuery(this).is(':checked')) {

            pgen_optionspecialcharacter_label.addClass('pgen-specialcharacter-selected');

            pgen_option_label.addClass('pgen-label-selected');

        } else {

            pgen_optionspecialcharacter_label.removeClass('pgen-specialcharacter-selected');

        }
    });

    jQuery('#pgen_generator_btn').click(function (e) {

        e.preventDefault();

        var pgen_loading = jQuery('.pgen-loading');

        jQuery('.pgen-password-list').slideUp(100, function () {

            jQuery('.pgen-error').hide().empty();

            pgen_loading.show();


            // options checked
            var pgen_pwd_options_checked_post = Array();

            var pgen_pwd_options_checked_collection = jQuery('input[name="pgen_pwd_options[]"]:checked');

            pgen_pwd_options_checked_collection.each(function () {
                pgen_pwd_options_checked_post.push(jQuery(this).val());
            });


            // special characters checked
            var pgen_specialcharacters_cheked_post = Array();

            var pgen_specialcharacters_checked_collection = jQuery('input[name="pgen_specialcharacter[]"]:checked');

            pgen_specialcharacters_checked_collection.each(function () {
                pgen_specialcharacters_cheked_post.push(jQuery(this).val());
            });


            jQuery.post('/inc/password.php', {
                    'pwd_options[]': pgen_pwd_options_checked_post,
                    'pgen_specialcharacter[]': pgen_specialcharacters_cheked_post,
                    'length': jQuery('#pgen_passwordlength').val(),
                    'nbpwd': jQuery('#pgen_nbpwd').val()
                },
                function (pgen_data) {
                    pgen_loading.hide();

                    pgen_data = jQuery.trim(pgen_data);

                    //	console.log(pgen_data);

                    pgen_response = jQuery.parseJSON(pgen_data);
                    jQuery('.pgen-password-list').empty();

                    if (pgen_response['error']) {
                        jQuery('.pgen-error').fadeIn('fast').append(pgen_response['error']);

                    } else {

                        jQuery.each(pgen_response['passwords_input'], function (index, value) {
                            jQuery('.pgen-password-list').append(value);
                        });

                        if (pgen_response['passwords_input'].length > 1) {
                            jQuery('.pgen-password-list').append(pgen_response['passwords_textarea']);
                        }

                    }

                    jQuery('.pgen-password-list').slideDown(200);
                }
            ); //jQuery.post

        }); // slideUp

        return false;
    }); // click btn

}); // jQuery
