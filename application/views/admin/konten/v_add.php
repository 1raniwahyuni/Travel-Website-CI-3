<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"> Tambah Data </div>
        <div class="panel-body">

            <?php
            //Form isi konten harus diisi 
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>','</div>');
            
            // multipart karena untuk insert foto/file jadi harus multipart
            echo form_open_multipart('konten/add');
            ?>           
            <div class="col-md-6">
                <div class="form-group">
                    <label>Judul Konten</label>
                    <input class="form-control" type="text" name="judul_konten" placeholder="Masukkan Judul Konten" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Penulis</label>
                    <select name="id_penulis" class="form-control">
                        <option value="">--- Pilih Nama Penulis ---</option>
                        <?php foreach ($penulis as $key => $value) { ?>
                            <option value="<?= $value->id_penulis ?>"><?= $value->nama_penulis ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Kategori Konten</label>
                    <select class="form-control" name="jenis_konten">
                        <option value="">--- Pilih Kategori ---</option>
                        <option value="Nusantara">Nusantara</option>
                        <option value="Mancanegara">Mancanegara</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Gambar Konten</label>
                    <input type="file"class="form-control" name="gambar_konten" required>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Sub Judul Konten</label>
                    <input class="form-control" type="text" name="sub_judul" placeholder="Masukkan Sub Judul Konten" required>
                </div>
            </div>

			<div class="form-group">
				<label>Isi Konten</label>
				<textarea name="isi_konten" id="editor" required></textarea>
			</div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset"  class="btn btn-success">Reset</button>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
