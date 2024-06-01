<div class="col-lg-5 mx-auto" justify-content-center>
    <style>
        .col-lg-5 {
            margin: 0 auto;
            float: none;
        }
    </style>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 style="text-align: center">Detail Penulis</h4>
        </div>

            <div class="panel-body text-center">
                <div class="form-group text-center">
                    <label>Nama Penulis:</label>
                    <?= $detail_penulis->nama_penulis ?>
                </div>
                <div class="form-group text-center">
                    <label>Alamat:</label>
                <?= $detail_penulis->alamat ?>
                </div>
                <div class="form-group text-center">
                    <label>Nomor Telepon:</label>
                <?= $detail_penulis->no_telp ?>
                </div>
                <div class="form-group text-center">
                    <label>Email:</label>
                    <?= $detail_penulis->email ?>
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
                <a href="<?= base_url('penulis') ?>" class="btn btn-primary">Kembali Ke Daftar Penulis</a>
            </div>
        </div>
    </div>
</div>
