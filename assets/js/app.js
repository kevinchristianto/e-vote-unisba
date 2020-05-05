$(document).ready(() => {
    var baseUrl = $('base').attr('href')

    $('[title]').tooltip()

    bsCustomFileInput.init()

    $('.modal').on('shown.bs.modal', function() {
        $('.modal').find('input[type="text"]:first').focus()
    })

    toggleLoading = id => {
        $(`#${id}`).toggleClass('d-none')
    }

    clearConsole = () => {
        console.log(window.console); 
        if(window.console ) {    
            console.clear()  
        }
    }

    toast = (title = '', text = '', icon = 'success') => {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            toast: true,
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            position: 'top-end',
        })
    }

    // Get jurusan on edit click
    $('.btn-ubah-jurusan').click(function(e) {
        toggleLoading('loading-modal-ubah-jurusan')
        $('#modal-ubah-jurusan').modal('show')
        let id = $(this).data('id')
        $.get(`${baseUrl}jurusan/get/${id}`, data => {
            if (data.success) {
                $("#modal-ubah-jurusan form").attr('action', `${baseUrl}jurusan/update/${id}`)
                $("#modal-ubah-jurusan form input[name='id']").val(data.data.id_jurusan)
                $("#modal-ubah-jurusan form input[name='nama']").val(data.data.nama_jurusan)
                toggleLoading('loading-modal-ubah-jurusan')
            } else {
                Swal.fire({
                    title: 'Terjadi Kesalahan',
                    text: 'Gagal mendapatkan data',
                    icon: 'error',
                })
            }
        })
        e.preventDefault()
    })

    // Get kelas on jurusan change
    $('#select-jurusan').change(function() {
        let jurusan = $(this).val()
        getKelas(jurusan)
    })

    // Get kelas on kelas page
    getKelas = jurusan => {
        $('#btn-tambah-kelas').addClass('d-none')
        $("#form-add-kelas input[name='jurusan']").val(jurusan)
        $.get(`${baseUrl}kelas/get/${jurusan}`, data => {
            $('#table-kelas tbody').html('')
            $('#btn-tambah-kelas').removeClass('d-none')
            $.each(data, (key, data) => {
                $('#table-kelas tbody').append(`
                    <tr>
                        <td>${key + 1}</td>
                        <td>${data.nama_kelas}</td>
                        <td>${data.angkatan}</td>
                        <td align="center">
                            <a href="javascript:void(0)" title='Ubah' class="btn-ubah-kelas" data-id="${data.id_kelas}"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0)" title='Hapus' class="btn-delete-kelas" data-nama="${data.nama_kelas}" data-id="${data.id_kelas}"><i class="fas fa-trash-alt text-danger ml-2"></i></a>
                        </td>
                    </tr>
                `)
            })
        })
    }

    // Insert kelas
    $('#form-add-kelas').submit(function(e) {
        const jurusan = $("#form-add-kelas input[name='jurusan']").val()
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: data => {
                getKelas(jurusan)
                toast(data.success ? 'Berhasil!' : 'Gagal!', data.msg, data.success ? 'success' : 'error')
                $("#form-add-kelas").trigger('reset').find('input:first').focus()
            }
        })
        e.preventDefault()
    })

    // Delete kelas
    $('#table-kelas').on('click', '.btn-delete-kelas', function(e) {
        let id = $(this).data('id'), nama = $(this).data('nama'), jurusan = $("#form-add-kelas input[name='jurusan']").val()
        console.log(id)
        Swal.fire({
            title: 'Anda Yakin?',
            text: `Apakah anda yakin ingin menghapus kelas ${nama}?`,
            icon: 'question',
            showCancelButton: true,
        }).then(result => {
            if (result.value) {
                $.get(`${baseUrl}kelas/delete/${id}`, data => {
                    getKelas(jurusan)
                    toast(data.success ? 'Berhasil!' : 'Gagal!', data.msg, data.success ? 'success' : 'error')
                })
            }
        })
    })

    // Get kelas on edit click
    $('#table-kelas').on('click', '.btn-ubah-kelas', function() {
        let id = $(this).data('id')
        $.get(`${baseUrl}kelas/get/${id}`, data => {
            data = data[0]
            $("#modal-ubah-kelas form").attr('action', `${baseUrl}kelas/update/${id}`)
            $("#modal-ubah-kelas form input[name='nama']").val(data.nama_kelas)
            $("#modal-ubah-kelas form input[name='angkatan']").val(data.angkatan)
            $('#modal-ubah-kelas').modal('show')
        })
    })

    // Get kelas on jurusan change in modal add calon
    $('#add-calon-select-jurusan').change(function() {
        $('#add-calon-select-kelas').attr('disabled', '')
        let id = $(this).val()
        $.get(`${baseUrl}kelas/get/${id}`, data => {
            $('#add-calon-select-kelas').html('')
            $('#add-calon-select-kelas').append(`<option selected disabled>--- Pilih Kelas ---</option>`)
            $('#add-calon-select-kelas').removeAttr('disabled')
            $.each(data, (key, data) => {
                $('#add-calon-select-kelas').append(`<option value="${data.id_kelas}">${data.nama_kelas}</option>`)
            })
        })
    })

    // Get kelas on jurusan change in modal ubah calon
    $('#ubah-calon-select-jurusan').change(function() {
        $('#ubah-calon-select-kelas').attr('disabled', '')
        let id = $(this).val()
        $.get(`${baseUrl}kelas/get/${id}`, data => {
            $('#ubah-calon-select-kelas').html('')
            $('#ubah-calon-select-kelas').append(`<option selected disabled>--- Pilih Kelas ---</option>`)
            $('#ubah-calon-select-kelas').removeAttr('disabled')
            $.each(data, (key, data) => {
                $('#ubah-calon-select-kelas').append(`<option value="${data.id_kelas}">${data.nama_kelas}</option>`)
            })
        })
    })

    // Delete calon
    $('.btn-delete-calon').click(function(e) {
        let nama = $(this).data('nama'), url = $(this).data('url')
        Swal.fire({
            title: 'Anda Yakin?',
            text: `Apakah anda yakin ingin menghapus ${nama}?`,
            icon: 'question',
            showCancelButton: true,
        }).then(result => {
            if (result.value) {
                window.location = url
            }
        })
    })

    // Get single calon, display in modal
    $('.btn-ubah-calon').click(function(e) {
        let id = $(this).data('id'), jurusan = $(this).data('jurusan')
        $.get(`${baseUrl}calon/get/${id}/${jurusan}`, data => {
            $("#form-ubah-calon").attr('action', `${baseUrl}calon/update/${id}`)
            $("#form-ubah-calon select[name='tipe']").append(`
                <option value="bem" ${data.calon.tipe_calon == 'bem' ? 'selected' : ''}>BEM</option>
                <option value="dam" ${data.calon.tipe_calon == 'dam' ? 'selected' : ''}>DAM</option>
                <option value="hima" ${data.calon.tipe_calon == 'hima' ? 'selected' : ''}>HIMA</option>
            `)
            $("#form-ubah-calon input[name='npm']").val(data.calon.npm)
            $("#form-ubah-calon input[name='nama']").val(data.calon.nama_calon)
            $("#form-ubah-calon select[name='jurusan']").html('')
            $.each(data.jurusan, (key, jurusan) => {
                $("#form-ubah-calon select[name='jurusan']").append(`
                    <option value="${jurusan.id_jurusan}" ${jurusan.id_jurusan == data.calon.id_jurusan ? 'selected' : ''}>${jurusan.nama_jurusan}</option>
                `)
            })
            $("#form-ubah-calon select[name='kelas']").html('')
            $.each(data.kelas, (key, kelas) => {
                $("#form-ubah-calon select[name='kelas']").append(`
                    <option value="${kelas.id_kelas}" ${kelas.id_kelas == data.calon.kelas ? 'selected' : ''}>${kelas.nama_kelas}</option>
                `)
            })
            $("#form-ubah-calon textarea[name='visi']").val(data.calon.visi)
            $("#form-ubah-calon textarea[name='misi']").val(data.calon.misi)
            $("#form-ubah-calon input[name='keagamaan']").val(data.calon.keagamaan)
            $("#form-ubah-calon input[name='kepemimpinan']").val(data.calon.kepemimpinan)
            $("#form-ubah-calon img[name='prev_foto']").attr('src', `${baseUrl}content/uploads/calon/${data.calon.foto}`)
            $('#modal-ubah-calon').modal('show')
        })
    })

})

