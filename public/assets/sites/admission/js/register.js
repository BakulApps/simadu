var register = function() {
    var _componentSelect = function () {
        var $select = $('.select2').select2({
            minimumResultsForSearch: Infinity,
        });
    };

    var _componentCheck = function () {
        $('.form-check-input-styled-success').uniform({
            wrapperClass: 'border-success-600 text-success-800'
        });
    };

    var _componentCalender = function () {
        $('.daterange').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
    }
    return {
        init: function() {
            _componentCalender();
            _componentSelect();
            _componentCheck();
        }
    }
}();
document.addEventListener('DOMContentLoaded', function() {
    register.init();
});
