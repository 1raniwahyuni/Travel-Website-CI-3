<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"> Edit Data Gallery </div>
        <div class="panel-body">

            <?php
            if(isset($error_upload)){
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
            }

            //Form isi konten harus diisi 
            echo validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
            // multipart karena untuk insert foto/file jadi harus multipart (edit berdasarkan id gallery)
            echo form_open_multipart('gallery/edit/'.$gallery->id_gallery);
            ?>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama Gallery</label>
                    <input class="form-control" value="<?= $gallery->nama_gallery?>" type="text" name="nama_gallery" placeholder="Masukkan Nama Gallery" required>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Foto Sampul</label><br>
                    <img src="<?=base_url('foto/sampul_gallery/'.$gallery->sampul_gallery) ?>" width="300px">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Ganti Sampul </label>
                    <input type="file"class="form-control" name="sampul_gallery">
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
