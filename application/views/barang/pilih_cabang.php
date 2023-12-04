<div class="container-fluid">

<form action="<?= base_url() ?>barang/form" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">



<div class="form-group"><label>Cabang</label>
    <select name="id" id="">

        <option value="">Pilih Cabang</option>
        <?php foreach ($cabang as $c) : ?>

            <option value="<?= $c['id_cabang']; ?>"><?= $c['nama']; ?></option>

        <?php endforeach; ?>
    </select>

</div>


<div class="form-group"><label>Bulan Beli</label>
    <input class="form-control" name="tanggal" id="" value="" type="date" placeholder="yyyy/mm" autocomplete="off">
</div>


<button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Next</span>
                <span class="icon text-white-50">
                    <i class="fas fa-next"></i>
                </span>
            </button>

<?= form_close(); ?>

</div>

<script src="<?= base_url(); ?>assets/js/validasi/formpilihcabang.js"></script>