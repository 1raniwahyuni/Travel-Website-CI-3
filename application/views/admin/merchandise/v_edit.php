<div class="col-lg-12" >
    <div class="panel panel-primary">
        <div class="panel-heading"> Edit Merchandise </div>
        <div class="panel-body">
            <?php

            // misal eror saat edit
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
                if(isset($error_upload)){
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
                }
               
                echo form_open_multipart('merchandise/edit/'.$merchandise->id_merchandise);
                ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Merchandise</label>
                            <input class="form-control" value="<?=$merchandise->nama_merchandise?>" type="text" name="nama_merchandise"required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Merchandise</label>
                            <input class="form-control" value="<?=$merchandise->harga_merchandise?>" type="text" name="harga_merchandise"required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ubah Stok Merchandise</label>
                            <input class="form-control" value="<?=$merchandise->stok?>" type="text" name="stok"required>
                        </div>
                    </div>

                    <!-- ini misal kalo ga ganti foto, jadi required nya dihapus -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ganti Gambar Merchandise</label>
                            <input type="file"class="form-control" type="text" name="gambar_merchandise">
                        </div>
                    </div>

                    <!-- gambar merchandise -->
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Gambar Merchandise</label><br>
                                <img src="<?=base_url('foto/gambar_merchandise/'.$merchandise->gambar_merchandise)?>" width="300px">
                            </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Keterangan Merchandise</label>
                            <textarea name="ket_merchandise" id="editor"><?= $merchandise->ket_merchandise ?></textarea>
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
