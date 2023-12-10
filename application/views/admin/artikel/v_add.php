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
                echo form_open_multipart('artikel/add');
               
            ?>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Judul Artikel</label>
                    <input class="form-control" type="text" name="judul_artikel" placeholder="Masukkan Judul Artikel" required>
                </div>
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label>Diposting Oleh</label>
                        <select name="id_user" class="form-control">
                            <option value=""> -- Pilih Username Admin -- </option>
                            <?php foreach ($user as $key => $value) { ?>
                                <option value="<?= $value->id_user ?>"><?= $value->username ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gambar Artikel</label>
                        <input type="file" class="form-control" name="gambar_artikel" required>
                    </div>
                </div>
            
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea name="isi_artikel" id="editor" required></textarea>
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