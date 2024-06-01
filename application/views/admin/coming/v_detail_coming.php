<div class="col-lg-8 mx-auto" justify-content-center>
    <style>
        .col-lg-8 {
            margin: 0 auto;
            float: none;
        }
    </style>
<div class="panel panel-primary " class="text-nowrap">
        <div class="panel-heading ">
            <h4 style="text-align: center">Detail Konten Coming Soon</h4>
        </div>
        <div class="panel-body text-center">
            <div class="form-group">
                <br><br>
                <img src="<?= base_url('foto/gambar_coming/' . $detail_coming->gambar_coming) ?>" 
                style="display: block; width: 400px; height: 300; margin: 0 auto;">
            </div>
            <div class="form-group text-center">
                <label>Judul Konten :</label>
                <?= $detail_coming->judul_coming ?>
            </div>
            <div class="form-group text-center">
                <label>Jenis Konten :</label>
                <?= $detail_coming->jenis_konten ?>
            </div>
            <div class="form-group text-center">
                <label>Jadwal Upload :</label>
                <?= $detail_coming->jadwal_upload ?>
            </div>
            <div class="form-group text-center">
                <label>Penulis :</label>
                <?= $detail_coming->nama_penulis ?>
            </div>
            <style>
                    .form-group.text-center {
                        line-height: 1.5;    
                        letter-spacing: 0.5px;  
                        word-spacing: 2px;   
                        text-align: center; 
                        font-size: 15px;     

                    }
                </style>
            <a href="<?= base_url('coming') ?>" class="btn btn-primary">Kembali Ke Daftar coming</a>
        </div>
    </div>
</div>
