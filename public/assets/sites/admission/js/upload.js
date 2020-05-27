var upload = function () {

    var _componentUniform = function () {
        $('.form-control-uniform').uniform({
            fileButtonHtml: 'Pilih Berkas',
            fileDefaultHtml: 'Tidak ada berkas terpilih.'
        });
    }

    return {
        init: function () {
            _componentUniform();
        }
    }
}();
document.addEventListener('DOMContentLoaded', function() {
    upload.init();
});
