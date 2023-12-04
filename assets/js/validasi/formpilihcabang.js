function validateForm() {
    var id = document.forms["myForm"]["id"].value;
    var tanggal = document.forms["myForm"]["tanggal"].value;

    if (id == "") {
        validasi('Cabang wajib di pilih!', 'warning');
        return false;
    }else if (tanggal == '') {
        validasi('Tanggal wajib di isi!', 'warning');
        return false;
    }

}