<div class="col-lg-10 mx-auto" justify-content-center>
    <style>
        .col-lg-10 {
            margin: 0 auto;
            float: none; 
        }
    </style>

<div class="panel panel-primary " class="text-nowrap">
        <div class="panel-heading ">
            <h4 style="text-align: center">Detail Produk Merchandise</h4>
        </div>
        <div class="panel-body text-center">
            <div class="form-group">
                <br><br>
                <img src="<?= base_url('foto/gambar_merchandise/' . $detail_merchandise->gambar_merchandise) ?>" 
                style="display: block; width: 350px; height: 300; margin: 0 auto;">
            </div>
            <div class="form-group text-center">
                <h3><?= $detail_merchandise->nama_merchandise ?></h3>
            </div>

            <div class="form-group text-center">
                <label>Stok Barang Tersedia :  </label>
                <?= $detail_merchandise->stok ?>
            </div>

            <div class="form-group text-center">
                <label>Harga Satuan :  Rp. <?= $detail_merchandise->harga_merchandise ?></label>
            </div>

            <div class="form-group text-justify">
            <?= $detail_merchandise->ket_merchandise ?>
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

            <a href="<?= base_url('merchandise') ?>" class="btn btn-primary">Kembali Ke Daftar Merchandise</a>
        </div>
    </div>
</div>
