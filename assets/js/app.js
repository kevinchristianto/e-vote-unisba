$(document).ready(() => {
    toggleLoadingModal = option => {
        $('#loading-modal').modal(option)
    }

    $('[title]').tooltip()

    $('.modal').on('shown.bs.modal', e => {
        $('.modal').find('input[type="text"]:first').focus()
    })


    $('#btn-ubah-jurusan').click(() => {
        // $.ajax({

        // })
        $('#modal-ubah-jurusan').modal('show')
    })
})

