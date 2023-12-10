<div class="col-lg-12 align-items-center" >
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
               
                echo form_open_multipart('coming/edit/'.$coming->id_coming);
                ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Konten</label>
                            <input class="form-control" value="<?=$coming->judul_coming?>" type="text" name="judul_coming" placeholder="Masukkan Judul Konten" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Konten</label>
                            <select name="jenis_konten" class="form-control" >
                                <option value="<?=$coming->jenis_konten?>"><?=$coming->jenis_konten?></option>
                                <option value="Nusantara">Nusantara</option>
                                <option value="Mancanegara">Mancanegara</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jadwal Upload</label>
                            <input class="form-control" value="<?=$coming->jadwal_upload?>" type="date" name="jadwal_upload" id="tanggal" placeholder="Masukkan Jadwal Upload Konten" required>
                        </div>
                    </div>

                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Penulis</label>
                            <select name="id_penulis" class="form-control">
                                <option value="<?=$coming->id_penulis?>"> <?=$coming->nama_penulis?> </option>
                                <?php foreach ($penulis as $key => $value) { ?>
                                    <option value="<?= $value->id_penulis ?>"><?= $value->nama_penulis ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto Cover</label><br>
                            <img src="<?=base_url('foto/gambar_coming/'.$coming->gambar_coming)?>" width="200px">
                        </div>
                    </div>
                    

                    <!-- kalo ga ganti jadi required nya dihapus -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ganti Foto Cover Coming Soon</label>
                            <input type="file"class="form-control" type="text" name="gambar_coming">
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
