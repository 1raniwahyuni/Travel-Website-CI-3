<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"> Tambah Data </div>
        <div class="panel-body">

            <?php
            if(isset($error_upload)){
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
            }

            //Form isi konten harus diisi 
            echo validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
            // multipart karena untuk insert foto/file jadi harus multipart
            echo form_open_multipart('gallery/add');
            ?>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama Gallery</label>
                    <input class="form-control" type="text" name="nama_gallery" placeholder="Masukkan Nama Gallery" required>
                </div>
            </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Foto Sampul </label>
                        <input type="file"class="form-control" name="sampul_gallery" required>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset"  class="btn btn-success">Reset</button>
                </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
