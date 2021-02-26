/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Apex - Responsive Admin Theme
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Wizard tabs with icons setup
$(document).ready( function(){

    $(".icons-tab-steps").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: 'Submit'
        },
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }
            $(".icons-tab-steps").validate().settings.ignore = ":disabled,:hidden";
            return  $(".icons-tab-steps").valid();
        },
        onFinishing: function (event, currentIndex)
        {
            $(".icons-tab-steps").validate().settings.ignore = ":disabled";
            return  $(".icons-tab-steps").valid();
        },
        onFinished: function (event, currentIndex) {
            $(".icons-tab-steps")[0].submit();
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) {   error.insertAfter(element); },

        rules : {
            'designation[]': {
                required: true,
            },
            password : {
                minlength : 6
            },
            password_confirmation : {
                minlength : 6,
                equalTo : "#password"
            }
        }
    });


    $(".icons-tab-steps2").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: 'Submit'
        },
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }
            $(".icons-tab-steps2").validate().settings.ignore = ":disabled,:hidden";
            return  $(".icons-tab-steps2").valid();
        },
        onFinishing: function (event, currentIndex)
        {
            $(".icons-tab-steps2").validate().settings.ignore = ":disabled";
            return  $(".icons-tab-steps2").valid();
        },
        onFinished: function (event, currentIndex) {
            $(".icons-tab-steps2")[0].submit();
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) {   error.insertAfter(element); },

        rules : {
            'designation[]': {
                required: true,
            },
        }
    });


    // To select event date
    $('.pickadate').pickadate();
 });