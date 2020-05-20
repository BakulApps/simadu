var semesterjs = function () {
    var _componetnDataTable = function () {
        $('.year_id').change(function () {
            $('.datatable-semester').DataTable().ajax.reload();
        })
        $('.semester_id').change(function () {
            $('.datatable-semester').DataTable().ajax.reload();
        })
        $('.datatable-semester').DataTable({
            bprocessing: true,
            bserverSide: true,
            ajax:({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/penilaian/semester',
                type: 'post',
                dataType: 'json',
                data: function (d) {
                    d._type = 'data';
                    d._data = 'all';
                    d.year_id = $('.year_id').val();
                    d.semester_id = $('.semester_id').val();
                },
            }),
            autoWidth: false,
            bLengthChange: true,
            bSort: false,
            scrollX: true,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                emptyTable: 'Tak ada data yang tersedia pada tabel ini',
                loadingRecords: '<i class="icon-spinner4 spinner"></i> Memuat data...',
                info: 'Menampilkan _START_ - _END_ Total _TOTAL_ entri',
                processing: '<i class="icon-spinner4 spinner"></i> Memuat data...',
                search: '_INPUT_',
                binfo: false,
                orderable: false,
                searchPlaceholder: 'Pencarian...',
                lengthMenu: '<span>Tampilkan:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') === 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') === 'rtl' ? '&rarr;' : '&larr;' }
            },
        })
    }

    var _componentSelect = function () {
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
        $('.select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    }

    var _componentUniform = function () {
        $('.form-control-uniform-custom').uniform({
            fileButtonClass: 'action btn bg-blue',
            selectClass: 'uniform-select bg-pink-400 border-pink-400',
            fileButtonHtml: 'Pilih Berkas',
            fileDefaultHtml: 'Tidak ada berkas terpilih'
        });
    }

    var _componentUpload = function () {
        $('#value_semester').change(function () {
            $('#modal-upload').modal('hide');
            var notice = new PNotify({
                text: "Mengunggah...",
                addclass: 'bg-primary border-primary',
                type: 'info',
                icon: 'icon-spinner4 spinner',
                hide: false,
                buttons: {
                    closer: false,
                    sticker: false
                },
                opacity: .9,
                width: "200px"
            });
            var fd = new FormData();
            var files = $('#value_semester')[0].files[0];
            fd.append('_type', 'data');
            fd.append('_data', 'upload');
            fd.append('semester_id', $('#semester_id').val());
            fd.append('year_id', $('#year_id').val());
            fd.append('value_semester', files);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/penilaian/semester',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(resp){
                    var options = {
                        title: resp.title,
                        addclass: "bg-"+resp.class+" border-"+resp.class,
                        type: resp.class,
                        hide: true,
                        text: resp.text,
                        buttons: { closer: true, sticker: true},
                        icon: false,
                        opacity: 1,
                        width: PNotify.prototype.options.width,
                    };
                    $('.datatable-semester').DataTable().ajax.reload();
                    notice.update(options);
                },
            });
        })
    }

    return {
        init: function() {
            _componetnDataTable();
            _componentSelect();
            _componentUniform();
            _componentUpload();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    semesterjs.init();
});
