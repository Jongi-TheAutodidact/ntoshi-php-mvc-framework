/*!
 * Ntoshi PHP MVC Framework - Frontend Stylesheet
 * (c) Jongi Mbodla | Jongi Brands Tech Solutions
 * Website: https://jongibrandz.co.za
 *
 * This file is part of the Ntoshi Framework.
 * All rights reserved. Unauthorized use, reproduction, or distribution is strictly prohibited.
 *
 * Released as part of the GPL-3.0-or-later license.
 */


$(document).ready(function () {
    // --- Animated Counters (Example for Dashboard) ---
    if ($('.counter').length) { // Only run if counters exist on the page
        $('.counter').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 1500,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    }

    // --- Add Customer Page: Edit Mode Logic ---
    
    if ($('#customer-form').length && window.location.pathname.includes('add-customer.html')) {
        const urlParams = new URLSearchParams(window.location.search);
        const customerId = urlParams.get('id');
        if (customerId) {
            $('#form-title').text('Edit Customer'); // Assumes #form-title exists
            $('#submit-button').html('<i class="bi bi-check-circle-fill me-2"></i>Update Customer'); // Assumes #submit-button exists
            console.log('Editing customer ID (from admin.js):', customerId);
            // Placeholder: In a real app, you'd fetch and populate form fields here
        }
    }

    // --- Single Customer Page: View Logic ---
    // This logic was previously in a script tag in single-customer.html
    if ($('#customerTabs').length && window.location.pathname.includes('single-customer.html')) { // Check for a unique element
        const urlParams = new URLSearchParams(window.location.search);
        const customerId = urlParams.get('id');
        if (customerId) {
            console.log('Viewing customer ID (from admin.js):', customerId);
            // Placeholder: Fetch and populate customer data
            // Example: $('.page-title').text(`Customer Details - ID ${customerId}`);
            // Example: Populate customer profile card, stats, and tab content
        } else {
            console.log('No customer ID specified for single-customer page.');
            // $('#page-content-wrapper main').html('<div class="alert alert-danger">No customer ID specified.</div>');
        }
    }

    // Add other admin-specific JavaScript functions here
});