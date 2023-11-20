<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Detail Penulis</h4>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label>Nama Penulis:</label>
                <p><?= $detail_penulis->nama_penulis ?></p>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <p><?= $detail_penulis->alamat ?></p>
            </div>
            <div class="form-group">
                <label>Nomor Telepon:</label>
                <p><?= $detail_penulis->no_telp ?></p>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <p><?= $detail_penulis->email ?></p>
            </div>
            <a href="<?= base_url('penulis') ?>" class="btn btn-primary">Kembali Ke Daftar Penulis</a>
        </div>
    </div>

</div>
