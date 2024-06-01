<div class="col-lg-10 mx-auto" justify-content-center>
    <style>
        .col-lg-10 {
            margin: 0 auto;
            float: none;
        }
    </style>

<div class="panel panel-primary " class="text-nowrap">
        <div class="panel-heading ">
            <h4 style="text-align: center">Detail Paket Wisata</h4>
        </div>
        
        <div class="form-group">
            <br><br>
            <img src="<?= base_url('foto/gambar_paket/' . $detail_paket->gambar_paket) ?>" 
                 style="display: block; width: 450px; height: 300; margin: 0 auto;">
        </div>
        
        <div class="panel-body text-center">
            <div class="form-group">
                <h3><?= $detail_paket->nama_paket ?></h3>
        </div>

        <div class="form-group">
                <label>Harga Paket Wisata :  <?= $detail_paket->harga_paket ?></label>
        </div>

        <div class="form-group text-justify">
           <?= $detail_paket->ket_paket ?>
        </div>
        <style>
                .form-group.text-justify {
                    line-height: 1.5;    
                    letter-spacing: 0.5px; 
                    word-spacing: 2px;   
                    text-align: justify;  
                    text-align-last: left; 
                    font-size: 15px;     

                }
            </style>
        <a href="<?= base_url('paket') ?>" class="btn btn-primary">Kembali Ke Daftar Paket Wisata</a>
        </div> 
    </div>
</div>
