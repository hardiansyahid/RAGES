<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.12/dist/sweetalert2.all.min.js" integrity="sha256-EjEW69+2WCgytC19HPvg6DvJlL/WdS6VkQX8CrThMEI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<script>
    $('.my-select2').select2();

    @if (session()->has('success'))
        alertMsg = "{{session()->get('success')}}";
        alert('success', alertMsg)
    @elseif(session()->has('error'))
        alertMsg = "{{session()->get('error')}}";
        alert('error', alertMsg)
    @endif

    var validator = $("#form").validate({
        errorClass:'is-invalid text-danger font-xs'
    });

    function alert(type, message){
        if (type == 'success') {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 2500
            })
        } else {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: message,
                showConfirmButton: false,
                timer: 2500
            })
        }
    }

    function myConfirmation(type){
        if (type == 'update') {
            let textMsg = 'Apakah anda yakin ingin menyimpan perubahan ?';
            let message = 'Perubahan berhasil disimpan';
        }
        else if(type == 'delete'){
            let textMsg = 'Apakah anda yakin ingin menghapus data ?';
            let message = 'Data berhasil dihapus';
        }

        Swal.fire({
            title: 'Konfirmasi',
            text: textMsg,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus',
            }).then((result) => {
            if (result.isConfirmed) {
                alert('success', message)
            }
        })
    }
</script>