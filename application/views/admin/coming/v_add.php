<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading"> Tambah Data </div>
        <div class="panel-body">
            <?php
            if(isset($error_upload)){
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>' .$error_upload.'</div>';
            }
            // multipart karena untuk insert foto/file jadi harus multipart
                echo form_open_multipart('coming/add');
            ?>
            <div class="form-group">
                    <label>Judul Konten</label>
                    <input class="form-control" type="text" name="judul_coming" placeholder="Masukkan Judul Konten" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi Konten</label>
                    <input class="form-control" type="text" name="deskripsi" placeholder="Masukkan Deskripsi Singkat" required>
                </div>
                <div class="form-group">
                    <label>Jadwal Upload</label>
                    <input class="form-control" type="text" name="jadwal_upload" id="tanggal" placeholder="Masukkan Jadwal Upload Konten" required>
                </div>
                <div class="form-group">
                    <label>Penulis</label>
                    <input class="form-control" type="text" name="penulis" placeholder="Masukkan Nama Penulis" required>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file"class="form-control" type="text" name="gambar_coming" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset"  class="btn btn-success">Reset</button>
                </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
