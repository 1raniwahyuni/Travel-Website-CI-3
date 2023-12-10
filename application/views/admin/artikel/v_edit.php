<div class="col-lg-12" >
    <div class="panel panel-primary">
        <div class="panel-heading"> Edit Artikel </div>
        <div class="panel-body">
            <?php

            // misal eror saat edit
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
                if(isset($error_upload)){
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
                }
               
                echo form_open_multipart('artikel/edit/'.$artikel->id_artikel);
                ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Artikel</label>
                            <input class="form-control" value="<?=$artikel->judul_artikel?>" type="text" name="judul_artikel"required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diposting Oleh</label>
                            <select name="id_user" class="form-control">
                                <option value="<?= $artikel->id_user ?>"><?= $artikel->username ?></option>
                                <?php foreach ($user as $key => $value) { ?>
                                    <option value="<?= $value->id_user ?>"><?= $value->username ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <!-- gambar artikel -->
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Gambar Artikel</label><br>
                                <img src="<?=base_url('foto/gambar_artikel/'.$artikel->gambar_artikel)?>" width="350px">
                            </div>
                    </div>

                    <!-- ini misal kalo ga ganti foto, jadi required nya dihapus -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ganti Gambar Artikel</label>
                            <input type="file"class="form-control" type="text" name="gambar_artikel">
                        </div>
                    </div>
        
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Isi Artikel</label>
                            <textarea name="isi_artikel" id="editor" required><?= $artikel->isi_artikel ?></textarea>
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
