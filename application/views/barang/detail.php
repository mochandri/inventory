<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <a href="<?= base_url() ?>barang" class="btn btn-md btn-circle btn-secondary">
                <i class="fas fa-arrow-left"></i>
            </a>
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Asset</h1>
        </div>
        

  

    </div>



    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12 mb-4">
        <?php foreach ($data as $d) : ?>
            <!-- Barang -->
            <div class="card shadow border-bottom-secondary mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="100%" style="border-radius: 10px;" src="<?= base_url() ?>assets/upload/barang/<?= $d->foto ?>" alt="">
                        <img width="100%" style="border-radius: 10px;" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= base_url() ?>/barang/detail/<?= $d->id_barang ?>" alt="">
                        <img width="100%" src="https://barcode.tec-it.com/barcode.ashx?data=<?= $d->id_barang ?>&translate-esc=on&imagetype=Jpg"alt="">
                        
                    </div>



                    <br>
                    <br>

                    <div class="col-lg-9">
                        <!-- ID Barang -->
                        <div class="form-group"><label>ID Barang</label>
                            <h4 class="h4 text-gray-800"><b><?= $d->id_barang ?></b></h4>
                           
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nama Barang -->
                        <div class="form-group"><label>Nama Barang</label>
                            <h4 class="h4 text-gray-800"><?= $d->nama_barang ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <div class="form-group"><label>Tanggal</label>
                            <h4 class="h4 text-gray-800"><?= $d->tanggal ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <div class="form-group"><label>Cabang</label>
                            <h4 class="h4 text-gray-800"><?= $d->id_cabang?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <div class="form-group"><label>Lokasi</label>
                            <h4 class="h4 text-gray-800"><?= $d->lokasi ?></h4>
                        </div>

                        <hr class="sidebar-divider">

                        <div class="form-group"><label>Status</label>
                            <h4 class="h4 text-gray-800"><?= $d->status ?></h4>
                        </div>

                        <hr class="sidebar-divider">
                        <div class="form-group"><label>Keterangan</label>
                            <h4 class="h4 text-gray-800"><?= $d->keterangan ?></h4>
                        </div>

                        <!-- Stok -->


                    </div>

                </div>
            </div>

        </div>

    <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<?php if ($this->session->flashdata('Pesan')) : ?>

<?php else : ?>
    <script>
        $(document).ready(function() {

            $('#pdf').hide();

            let timerInterval
            Swal.fire({
                title: 'Memuat...',
                timer: 1000,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {

            })
        });
    </script>
<?php endif; ?>