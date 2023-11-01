<!-- v_detail_anggota.php -->

<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Detail Anggota</h4>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label>Kode Anggota:</label>
                <p><?= $detail_anggota->kode_anggota ?></p>
            </div>
            <div class="form-group">
                <label>Nama Anggota:</label>
                <p><?= $detail_anggota->nama_anggota ?></p>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <p><?= $detail_anggota->alamat ?></p>
            </div>
            <div class="form-group">
                <label>Nomor Telepon:</label>
                <p><?= $detail_anggota->no_telp ?></p>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <p><?= $detail_anggota->email ?></p>
            </div>
            <a href="<?= base_url('anggota') ?>" class="btn btn-primary">Kembali Ke Daftar Anggota</a>
        </div>
    </div>

</div>
