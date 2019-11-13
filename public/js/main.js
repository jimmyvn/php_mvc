$(document).ready(function () {
    $('#reservation').daterangepicker({
        // timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'YYYY-MM-DD'
        },
        timePicker24Hour: true,
    });

});