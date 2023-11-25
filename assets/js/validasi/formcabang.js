function validateForm() {
    var cabang = document.forms["myForm"]["cabang"].value;

    if (cabang == "") {
        validasi('Nama cabang wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var cabang = document.forms["myFormUpdate"]["nama"].value;

    if (cabang == "") {
        validasi('Nama cabang tidak boleh kosong!', 'warning');
        return false;
    }

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}