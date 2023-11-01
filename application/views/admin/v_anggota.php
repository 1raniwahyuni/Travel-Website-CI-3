<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <button class="btn btn-success btn-m"  data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"> </i>
            <span>Tambah Data</span></button>
        </div>
        <div class="panel-body">
            <!-- flashdata -->
            <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>';
                                                
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
            ?>
            
            <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <!-- var itu dr anggota controller-->
                <?php $no=1; foreach ($anggota as $key => $value) { ?>
                    <tr style="text-align: justify;">
                        <td><?= $no++; ?></td>
                        <td><?= $value->kode_anggota?></td>
                        <td><?= $value->nama_anggota?></td>
                        <td><?= $value->alamat?></td>
                        <td><?= $value->no_telp?></td>
                        <td><?= $value->email?></td>
                        <td style="text-align: center;">
                            <a class="btn btn-sm btn-primary" href="<?= base_url('anggota/detail/' . $value->id_anggota) ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>

                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit<?= $value->id_anggota ?>">
                            <i class="fa fa-pencil"></i></button>
                                
                            <a href="<?= base_url('anggota/delete/' .$value->id_anggota) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Model add -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Anggota</h4>
            </div>

            <div class="modal-body">
            <?php echo form_open('anggota/add'); ?>
                <div class="form-group">
                    <label>Kode Anggota</label>
                    <input class="form-control" type="text" name="kode_anggota" placeholder="Masukkan Kode Anggota" required>
                </div>
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <input class="form-control" type="text" name="nama_anggota" placeholder="Masukkan Nama Anggota" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input class="form-control" type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Masukkan Email" required>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
   </div>
</div>


<!-- Model edit -->
<?php foreach ($anggota as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_anggota ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit dan Perbarui Data Anggota</h4>
            </div>

            <div class="modal-body">
            <?php echo form_open('anggota/edit/' .$value->id_anggota); ?>
                <div class="form-group">
                    <label>Kode Anggota</label>
                    <input class="form-control" type="text" name="kode_anggota" value="<?= $value->kode_anggota?>" placeholder="Masukkan Kode Anggota" required>
                </div>
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <input class="form-control" type="text" name="nama_anggota" value="<?= $value->nama_anggota?>" placeholder="Masukkan Nama Anggota" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" type="text" name="alamat" value="<?= $value->alamat?>" placeholder="Masukkan Alamat" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input class="form-control" type="text" name="no_telp"  value="<?= $value->no_telp?>" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email"  value="<?= $value->email?>" placeholder="Masukkan Email" required>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
   </div>
</div>
<?php } ?>
