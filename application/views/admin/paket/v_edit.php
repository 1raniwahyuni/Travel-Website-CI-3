<div class="col-lg-12" >
    <div class="panel panel-primary">
        <div class="panel-heading"> Edit Paket Wisata</div>
        <div class="panel-body">
            <?php

            // misal eror saat edit
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
                if(isset($error_upload)){
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
                }
               
                echo form_open_multipart('paket/edit/'.$paket->id_paket);
                ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input class="form-control" value="<?=$paket->nama_paket?>" type="text" name="nama_paket"required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Paket</label>
                            <input class="form-control" value="<?=$paket->harga_paket?>" type="text" name="harga_paket"required>
                        </div>
                    </div>

                    <!-- gambar paket -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gambar Paket</label><br>
                            <img src="<?=base_url('foto/gambar_paket/'.$paket->gambar_paket)?>" width="300px">
                        </div>
                    </div>

                    <!-- ini misal kalo ga ganti foto, jadi required nya dihapus -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ganti Gambar Paket</label>
                            <input type="file"class="form-control" type="text" name="gambar_paket">
                        </div>
                    </div>

                     <div class="col-md-12">
                        <div class="form-group">
                            <label>Keterangan Paket Wisata</label>
                            <textarea name="ket_paket" id="editor"><?= $paket->ket_paket ?></textarea>
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
