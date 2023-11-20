<div class="col-lg-10 " justify-content-center>
<td style="align-item-center" class="text-nowrap">
<div class="panel panel-primary " style="text-align: center;" class="text-nowrap">
        <div class="panel-heading ">
            <h4 style="text-align: center">Detail Konten Coming Soon</h4>
        </div>
        <div class="form-group">
            <br><br>
            <img src="<?= base_url('gambar_coming/' . $detail_coming->gambar_coming) ?>" 
                 style="display: block; width: 500px; height: 300; margin: 0 auto;">
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label>Judul Konten:</label>
                <p><?= $detail_coming->id_coming ?></p>
            </div>
            <div class="form-group">
                <label>Deskripsi:</label>
                <p><?= $detail_coming->deskripsi ?></p>
            </div>
            <div class="form-group">
                <label>Jadwal Upload:</label>
                <p><?= $detail_coming->jadwal_upload ?></p>
            </div>
            <div class="form-group">
                <label>Penulis</label>
                <p><?= $detail_coming->penulis ?></p>
            </div>

            <a href="<?= base_url('coming') ?>" class="btn btn-primary">Kembali Ke Daftar coming</a>
        </div>
    </div>
</div>
