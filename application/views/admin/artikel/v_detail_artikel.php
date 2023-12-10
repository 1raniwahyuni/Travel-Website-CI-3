<div class="col-lg-10 mx-auto" justify-content-center>
    <style>
        .col-lg-10 {
            margin: 0 auto;
            float: none; /* Clear the float */
        }
    </style>

<div class="panel panel-primary " class="text-nowrap">
        <div class="panel-heading ">
            <h4 style="text-align: center">Detail Isi Artikel</h4>
        </div>
        <div class="form-group">
            <br><br>
            <img src="<?= base_url('foto/gambar_artikel/' . $detail_artikel->gambar_artikel) ?>" 
                 style="display: block; width: 650px; height: 300; margin: 0 auto;">
        </div>
        <div class="panel-body text-center">
            <div class="form-group ">
                <h3><?= $detail_artikel->judul_artikel ?></h3>
            </div>

            <div class="form-group">
                <label>Artikel Ini Diposting Oleh <?= $detail_artikel->username ?></label>
            </div>

            <div class="form-group text-justify">
                <?= $detail_artikel->isi_artikel ?>
            </div>
            <style>
                .form-group.text-justify {
                    line-height: 1.5;      /* Tinggi baris */
                    letter-spacing: 1px;   /* Jarak antarhuruf */
                    word-spacing: 2px;     /* Jarak antarkata */
                    text-align: justify;   /* Perataan teks */
                    text-align-last: left; 
                    font-size: 15px;       /* Ukuran font */

                }
            </style>

            <a href="<?= base_url('artikel') ?>" class="btn btn-primary">Kembali Ke Daftar Artikel</a>
        </div>
    </div>
</div>
