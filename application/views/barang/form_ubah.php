<?php foreach ($data as $d): ?>
    

<!-- Begin Page Content -->
<div class="container-fluid">

<form action="<?= base_url() ?>barang/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>barang" class="btn btn-md btn-circle btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah Barang</h1>
            </div>

            <button id="button_aktif" type="submit" class="btn btn-primary btn-md btn-icon-split">
                
                <span class="text text-white">Aktif</span>
                <!-- <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span> -->
            </button>
            
            

    <form action="<?= base_url() ?>barang/proses_ubah_rusak" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Rusak</span>
                <!-- <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span> -->
            </button>

            <button type="submit" class="btn btn-success btn-md btn-icon-split">
                <span class="text text-white">Simpan Perubahan</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Form Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- ID Barang -->
                            <div class="form-group"><label>ID Barang</label>
                                <input class="form-control" name="idbarang" type="text" value="<?= $d->id_barang ?>" readonly>
                            </div>

                            <!-- Nama Barang -->
                            <div class="form-group"><label>Nama Barang</label>
                                <input class="form-control" name="barang" type="text" value="<?= $d->nama_barang ?>">
                            </div>

                            <!-- Stok -->
                            <div class="form-group"><label>Tanggal Keluar</label>
                                <input class="form-control" name="tanggal" id="datepicker" value="<?= $d->tanggal ?>" type="text" placeholder="" autocomplete="off" readonly>
                            </div>
                            <div class="form-group"><label>Cabang</label>
                                    <input name="cabang" type="hidden" value="<?= $d->id_cabang ?>">
                                    <input class="form-control" name="preview" type="text" value="<?= $d->id_cabang?>" autocomplete="off" readonly>
                                </div>


                            <div class="form-group"><label>Lokasi</label>
                                <input class="form-control" name="lokasi" type="text" value="<?= $d->lokasi ?>">
                            </div>
                            <div class="form-group"><label>Status</label>
                                <input id="label_status"  class="form-control" name="status" type="text" value="<?= $d->status ?>">
                            </div>

                            <div class="form-group"><label>Keterangan</label>
                                <input id="keterangan"  class="form-control" name="keterangan" type="text" value="<?= $d->keterangan ?>">
                            </div>

                        </div>

                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-secondary shadow mb-4">
                    <div class="card-header py-3 bg-secondary">
                        <h6 class="m-0 font-weight-bold text-white">Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Format
                                <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/barang/<?= $d->foto ?>" id="outputImg"
                                    width="200" maxheight="300">
                            </div>
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="fotoLama" value="<?= $d->foto ?>">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                    onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
</form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/barang.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbarang.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('.chosen').chosen({
    width: '100%',

});
</script>

<script type="text/jsx;harmony=true">
    void function() { "use strict";

var App = React.createClass({
  getInitialState() {
    return {status: 'Aktif'}
  },
  handleChange(e) {
    this.setState({statuus: e.target.value})
  },
  render() {
    return <div>
      <input name="status" value={this.state.status} onChange={this.handleChange}/>
      
    </div>
  }
})

React.render(<App/>, document.getElementById('app'))

}()</script>

<script type="text/javascript">
    var aktif = document.getElementById('button_aktif');
    var label_status = document.getElementById('label_status');
  

    if(label_status == <?= $d->status ?> && !Aktif){
        aktif.style.display = 'blok';
    }else{
        aktif.style.display='none';
    }
</script>


<?php endforeach; ?>
