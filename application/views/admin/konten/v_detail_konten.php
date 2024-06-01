<div class="col-lg-10 mx-auto" justify-content-center>
    <style>
        .col-lg-10 {
            margin: 0 auto;
            float: none;
        }
    </style>

<div class="panel panel-primary " class="text-nowrap">
        <div class="panel-heading ">
            <h4 style="text-align: center">Detail Isi Konten</h4>
        </div>
        <div class="form-group">
            <br><br>
            <img src="<?= base_url('foto/gambar_konten/' . $detail_konten->gambar_konten) ?>" 
                 style="display: block; width: 650px; height: 300; margin: 0 auto;">
        </div>
        <div class="panel-body text-center">
            <div class="form-group ">
                <h3><?= $detail_konten->judul_konten ?></h3>
            </div>

            <div class="form-group">
                <label>Oleh <?= $detail_konten->nama_penulis ?></label>
            </div>

            <div class="form-group ">
                <h3><?= $detail_konten->sub_judul ?></h3>
            </div>

            <div class="form-group text-justify">
                <?= $detail_konten->isi_konten ?>
            </div>
            
            <style>
                .form-group.text-justify {
                    line-height: 1.5;     
                    letter-spacing: 1px;   
                    word-spacing: 2px;    
                    text-align: justify;   
                    text-align-last: left; 
                    font-size: 15px;      

                }
            </style>

            <a href="<?= base_url('konten') ?>" class="btn btn-primary">Kembali Ke Daftar Konten</a>
        </div>
    </div>
</div>
