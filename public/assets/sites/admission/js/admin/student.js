var student = function () {
    var _componentDatatable = function () {
        $('.datatable-student').DataTable({
            autoWidth: true,
            bLengthChange: false,
            bSort: false,
            scrollX: true,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                emptyTable: 'Tak ada data yang tersedia pada tabel ini',
                loadingRecords: '<i class="icon-spinner4 spinner"></i> Memuat data...',
                info: 'Menampilkan _START_ - _END_ Total _TOTAL_ entri',
                search: '_INPUT_',
                binfo: false,
                orderable: false,
                searchPlaceholder: 'Pencarian...',
                lengthMenu: '<span>Tampilkan:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') === 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') === 'rtl' ? '&rarr;' : '&larr;' }
            },
            buttons: [
                {
                    text: '<i class="icon-file-excel">',
                    className: 'btn btn-outline-primary',
                    action: function() {
                        window.location = (baseurl + '/peserta/?_type=submit&&_data=export')
                    }
                },
                {
                    text: '<i class="icon-printer2">',
                    className: 'btn btn-outline-primary',
                    action: function() {
                        alert('berhasilkah')
                    }
                }
            ],
            columnDefs : [
                {className: 'text-center', targets: 0},
                {className: 'text-center', targets: 1},
                {className: 'text-center', targets: 2},
                {className: 'text-center', targets: 3},
                {className: 'text-center', targets: 4},
                {className: 'text-center', targets: 5},
                {className: 'text-center', targets: 6},
                {className: 'text-center', targets: 7},
                {className: 'text-center', targets: 8},
                {className: 'text-center', targets: 9}
            ],
            ajax: ({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/peserta',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type' : 'data',
                    '_data' : 'student'
                }
            })
        }).on('click', '.btn-accept', function (e) {
            e.preventDefault();
            var student_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/peserta',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'submit',
                    '_data': 'accept',
                    'student_id': student_id,
                },
                success : function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left'
                    });
                    $('.datatable-student').DataTable().ajax.reload();
                }
            });
        }).on('click', '.btn-reject', function (e) {
            e.preventDefault();
            var student_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/peserta',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'submit',
                    '_data': 'reject',
                    'student_id': student_id,
                },
                success : function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left'
                    });
                    $('.datatable-student').DataTable().ajax.reload();
                }
            });
        }).on('click', '.btn-view', function(e) {
            e.preventDefault();
            var student_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/peserta',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'data',
                    '_data': 'modal',
                    'student_id': student_id,
                },
                success : function (resp) {
                    $('#student_name').val(resp.student_name);
                    $('#student_nisn').val(resp.student_nisn);
                    $('#student_nik').val(resp.student_nik);
                    $('#student_place_birth').val(resp.student_place_birth);
                    $('#student_birthday').val(resp.student_birthday);
                    $('#student_gender').val(resp.student_gender).trigger('change');
                    $('#student_religion').val(resp.student_religion).trigger('change');
                    $('#student_address').val(resp.student_address);
                    $('#student_place_sibling').val(resp.student_place_sibling);
                    $('#student_sibling').val(resp.student_sibling);
                    $('#student_achievement').val(resp.student_achievement);
                    $('#student_father_name').val(resp.student_father_name);
                    $('#student_father_nik').val(resp.student_father_nik);
                    $('#student_father_study').val(resp.student_father_study).trigger('change');
                    $('#student_father_religion').val(resp.student_father_religion).trigger('change');
                    $('#student_father_job').val(resp.student_father_job).trigger('change');
                    $('#student_mother_name').val(resp.student_mother_name);
                    $('#student_mother_nik').val(resp.student_mother_nik);
                    $('#student_mother_study').val(resp.student_mother_study).trigger('change');
                    $('#student_mother_religion').val(resp.student_mother_religion).trigger('change');
                    $('#student_mother_job').val(resp.student_mother_job).trigger('change');
                    $('#student_parent_value').val(resp.student_parent_value).trigger('change');
                    $('#student_no_kk').val(resp.student_no_kk);
                    $('#student_phone').val(resp.student_phone);
                    $('#student_from_school').val(resp.student_from_school);
                    $('#student_from_school_npsn').val(resp.student_from_school_npsn);
                    $('#student_no_ijazah').val(resp.student_no_ijazah);
                    $('#student_no_skhun').val(resp.student_no_skhun);
                    $('#student_value_exam').val(resp.student_value_exam);
                    $('#student_program').val(resp.student_program).trigger('change');
                    $('#student_boarding').val(resp.student_boarding).trigger('change');
                    $('#student_status').val(resp.student_status);
                    $('#student_sttb_file').attr('href',resp.student_sttb_file).html('unduh disini');
                    $('#student_skhun_file').attr('href',resp.student_skhun_file).html('unduh disini');
                    $('#student_photo_file').attr('href',resp.student_photo_file).html('unduh disini');
                    $('#student_akta_file').attr('href',resp.student_akta_file).html('unduh disini');
                    $('#student_pip_file').attr('href',resp.student_pip_file).html('unduh disini');
                    $('.modal-student').modal('show');
                }
            });
        }).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var student_id = $(this).data('num');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url : baseurl + '/peserta',
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'submit',
                    '_data': 'delete',
                    'student_id': student_id,
                },
                success : function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left'
                    });
                    $('.datatable-student').DataTable().ajax.reload();
                }
            });
        });
    };
    var _componentSelect = function () {
        var $select = $('.select2').select2({
            minimumResultsForSearch: Infinity,
        });
    };
    return {
        init: function () {
            _componentSelect();
            _componentDatatable();
        }
    }
}();
document.addEventListener('DOMContentLoaded', function () {
    student.init();
});
