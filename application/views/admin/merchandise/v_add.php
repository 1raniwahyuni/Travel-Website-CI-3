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
                echo form_open_multipart('merchandise/add');
               
            ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Merchandise</label>
                    <input class="form-control" type="text" name="nama_merchandise" placeholder="Masukkan Nama Merchandise" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Harga Merchandise</label>
                    <input class="form-control" type="text" name="harga_merchandise" placeholder="Masukkan Harga Merchandise" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Stok Merchandise</label>
                    <input class="form-control" type="text" name="stok" placeholder="Masukkan Stok Barang" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Gambar Merchandise</label>
                    <input type="file" class="form-control" name="gambar_merchandise" required>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Keterangan Merchandise</label>
                    <textarea name="ket_merchandise" id="editor" required></textarea>
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