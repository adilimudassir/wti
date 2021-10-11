// Keenthemes' plugins
window.KTUtil = require('../../core/js/components/util.js');
window.KTBlockUI = require('../../core/js/components/blockui.js');
window.KTCookie = require('../../core/js/components/cookie.js');
window.KTDialer = require('../../core/js/components/dialer.js');
window.KTDrawer = require('../../core/js/components/drawer.js');
window.KTEventHandler = require('../../core/js/components/event-handler.js');
window.KTFeedback = require('../../core/js/components/feedback.js');
window.KTImageInput = require('../../core/js/components/image-input.js');
window.KTMenu = require('../../core/js/components/menu.js');
window.KTPasswordMeter = require('../../core/js/components/password-meter.js');
window.KTScroll = require('../../core/js/components/scroll.js');
window.KTScrolltop = require('../../core/js/components/scrolltop.js');
window.KTSearch = require('../../core/js/components/search.js');
window.KTStepper = require('../../core/js/components/stepper.js');
window.KTSticky = require('../../core/js/components/sticky.js');
window.KTSwapper = require('../../core/js/components/swapper.js');
window.KTToggle = require('../../core/js/components/toggle.js');

// Layout base js
window.KTApp = require('../../extended/js/layout/app.js');
window.KTLayoutAside = require('./layout/aside.js');
window.KTLayoutExplore = require('./layout/explore.js');
window.KTLayoutSearch = require('./layout/search.js');
window.KTLayoutToolbar = require('./layout/toolbar.js');

// Element to indecate

/**
 * Place any jQuery/helper plugins in here.
 */
$(function () {

    /**
     * Disable submit inputs in the given form
     *
     * @param form
     */
    function disableSubmitButtons(form) {
        form.find('input[type="submit"]').attr('disabled', true);
        form.find('button[type="submit"]').attr('disabled', true);
    }

    /**
     * Enable the submit inputs in a given form
     *
     * @param form
     */
    function enableSubmitButtons(form) {
        form.find('input[type="submit"]').removeAttr('disabled');
        form.find('button[type="submit"]').removeAttr('disabled');
    }

    /**
     * Disable all submit buttons once clicked
     */
    $('form').submit(function () {
        disableSubmitButtons($(this));
        return true;
    });

    /**
     * Add a confirmation to a delete button/form
     */
    $('body').on('submit', 'form[name=delete-item]', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to delete this item?',
            showCancelButton: true,
            confirmButtonText: 'Confirm Delete',
            cancelButtonText: 'Cancel',
            icon: 'warning',
            cancelButtonColor: '#5E6278',
            confirmButtonColor: '#f10222' 
        }).then((result) => {
            if (result.value) {
                this.submit()
            } else {
                enableSubmitButtons($(this));
            }
        });
    }).on('click', 'a[name=confirm-item]', function (e) {
        /**
         * Add an 'are you sure' pop-up to any button/link
         */
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to do this?',
            showCancelButton: true,
            confirmButtonText: 'Continue',
            cancelButtonText: 'Cancel',
            icon: 'info',
            cancelButtonColor: '#5E6278',
            confirmButtonColor: '#f10222' 
        }).then((result) => {
            result.value && window.location.assign($(this).attr('href'));
        });
    });

    // Remember tab on page load
    $('a[data-toggle="tab"], a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        var hash = $(e.target).attr('href');
        if (history.pushState) {
            history.pushState(null, null, hash);
        } else {
            location.hash = hash;
        }
    });

    var hash = window.location.hash;
    if (hash) {
        $('.nav-link[href="' + hash + '"]').tab('show');
    }
});

