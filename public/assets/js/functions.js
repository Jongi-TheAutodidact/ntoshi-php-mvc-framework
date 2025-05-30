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
 
 /* Upload Files */
    // Images
    function display_image(file, e) {
        let img = e.currentTarget.parentNode.querySelector('img')

        img.src = URL.createObjectURL(file)
    }
    /**
     * Change Image
     * @param {*} file  
     * */
    function change_image(file) {
        var obj = {};
        obj.image = file;
        obj.data_type = "profile-image";
        obj.id = "<?= user('id') ?>";

        send_data(obj);
    }


// User greeting, depending on timezone and the time of the day
window.onload = function() {
    var today = new Date();
    var hour = today.getHours();

    var greeting;
    if (hour < 12) {
        greeting = 'Good morning';
    } else if (hour >= 12 && hour < 18) {
        greeting = 'Good afternoon';
    } else {
        greeting = 'Good evening';
    }

    document.getElementById('greeting').innerHTML = greeting;
};