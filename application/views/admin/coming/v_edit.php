<div class="col-lg-10 align-items-center" >
    <div class="panel panel-primary">
        <div class="panel-heading"> Edit Data Coming Soon </div>
        <div class="panel-body">
            <?php

            // misal eror saat edit
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
                if(isset($error_upload)){
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
                }
               
                echo form_open_multipart('coming/edit/'.$coming2->id_coming);
                ?>
                
                <div class="form-group">
                        <label>Judul Konten</label>
                        <input class="form-control" value="<?=$coming2->judul_coming?>" type="text" name="judul_coming" placeholder="Masukkan Judul Konten" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Konten</label>
                        <input class="form-control" value="<?=$coming2->deskripsi?>" type="text" name="deskripsi" placeholder="Masukkan Deskripsi Singkat" required>
                    </div>
                    <div class="form-group">
                        <label>Jadwal Upload</label>
                        <input class="form-control" value="<?=$coming2->jadwal_upload?>" type="text" name="jadwal_upload" id="tanggal" placeholder="Masukkan Jadwal Upload Konten" required>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input class="form-control" value="<?=$coming2->penulis?>" type="text" name="penulis" placeholder="Masukkan Nama Penulis" required>
                    </div>
                    
                    <!-- foto -->
                    <div class="form-group">
                        <img src="<?=base_url('gambar_coming/'.$coming2->gambar_coming)?>" width="250px">
                    </div>

                    <!-- kalo ga ganti jadi required nya dihapus -->
                    <div class="form-group">
                        <label>Ganti Foto Cover Coming Soon</label>
                        <input type="file"class="form-control" type="text" name="gambar_coming">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset"  class="btn btn-success">Reset</button>
                    </div>

                <?php echo form_close(); ?>
        </div>
    </div>
</div>
