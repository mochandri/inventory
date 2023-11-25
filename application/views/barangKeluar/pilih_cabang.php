<div class="container-fluid">


<?= form_open('barangKeluar/form'); ?>
<select name="id" id="">
    <option value="">Pilih Cabang</option>

    <?php foreach($cb as $data): ?>
        <option value="<?= $data['id_cabang'];?>"><?= $data['nama']; ?></option>




    <?php endforeach; ?>
</select>
<button type="submit">Pilih</button>

<?= form_close(); ?>

</div>
