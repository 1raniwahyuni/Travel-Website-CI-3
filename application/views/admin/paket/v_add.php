<div class="col-lg-12">
<div class="panel panel-primary">

        <div class="panel-heading"> Tambah Data </div>
        <div class="panel-body">
            <?php
            // error
            if(isset($error_upload)){
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
            }
            // multipart karena untuk insert foto/file jadi harus multipart
                echo form_open_multipart('paket/add');
               
            ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Paket</label>
                    <input class="form-control" type="text" name="nama_paket" placeholder="Masukkan Nama Paket" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Harga Paket</label>
                    <input class="form-control" type="text" name="harga_paket" placeholder="Masukkan Harga Paket" required>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Gambar Paket</label>
                    <input type="file" class="form-control" name="gambar_paket" required>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Keterangan Paket Wisata</label>
                    <textarea name="ket_paket" id="editor" required></textarea>
                </div>
            </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset"  class="btn btn-success">Reset</button>
                    </div>
                </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>