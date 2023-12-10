<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"> Tambah Foto Gallery </div>
        <div class="panel-body">

            <?php
            if(isset($error_upload)){
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
            }

            //Form isi konten harus diisi 
            echo validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
        // setelah berhasil menginput
        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>';
                                        
            echo $this->session->flashdata('pesan');
            echo '</div>';
        }

            // multipart karena untuk insert foto/file jadi harus multipart
            echo form_open_multipart('gallery/add_foto/'.$gallery->id_gallery);
            ?>


            <div class="col-sm-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Keterangan Foto</label>
                        <input class="form-control" type="text" name="ket_foto" placeholder="Masukkan Keterangan Foto" required>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Foto </label>
                        <input type="file"class="form-control" name="foto_gallery" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?=base_url('gallery')?>"  class="btn btn-success">Back</a>
            </div>

            <?php echo form_close(); ?>
            <hr>

            <?php foreach ($foto as $key => $value) { ?>
                <div class="col-sm-3 text-center" style="padding-bottom: 20px;">
                <label><?= $value->ket_foto ?></label>
                    <img src="<?= base_url('foto/foto_gallery/' . $value->foto_gallery) ?>" width="200px" height="150px"><br>
                    <a href="<?= base_url('gallery/delete_foto/' . $value->id_gallery. '/' . $value->id_foto) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" 
                        class="btn btn-danger btn-xs" style=" transform: translate(-50%, 5px);"> <i class="fa fa-trash"></i>
                    </a>
                </div>

            <?php } ?> 
            </div>
        </div>
    </div>
</div>
