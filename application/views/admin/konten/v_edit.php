<div class="col-lg-12" >
    <div class="panel panel-primary">
        <div class="panel-heading"> Edit Isi Konten </div>
        <div class="panel-body">
            <?php

            // misal eror saat edit
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
                if(isset($error_upload)){
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
                }
               
                echo form_open_multipart('konten/edit/'.$konten->id_konten);
                ?>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Judul konten</label>
                            <input class="form-control" value="<?=$konten->judul_konten?>" type="text" name="judul_konten"required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Penulis</label>
                            <select name="id_penulis" class="form-control">
                                <option value="<?= $konten->id_penulis ?>"><?= $konten->nama_penulis ?></option>
                                <?php foreach ($penulis as $key => $value) { ?>
                                    <option value="<?= $value->id_penulis ?>"><?= $value->nama_penulis ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Konten</label>
                            <select name="jenis_konten" class="form-control" >
                                <option value="<?=$konten->jenis_konten?>"><?=$konten->jenis_konten?></option>
                                <option value="Nusantara">Nusantara</option>
                                <option value="Mancanegara">Mancanegara</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gambar konten</label><br>
                            <img src="<?=base_url('foto/gambar_konten/'.$konten->gambar_konten)?>" width="250px">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ganti Gambar konten</label>
                            <input type="file"class="form-control" type="text" name="gambar_konten">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Sub Judul konten</label>
                            <input class="form-control" value="<?=$konten->sub_judul?>" type="text" name="sub_judul"required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Isi Konten</label>
                            <textarea name="isi_konten" id="editor" required><?= $konten->isi_konten ?></textarea>
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
