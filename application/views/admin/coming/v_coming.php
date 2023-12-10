<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?=base_url('coming/add'); ?>" class="btn btn-success btn-m"><i class="fa fa-plus"> </i>
            <span>Tambah Data</span></a>
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
                        <th>Judul Konten</th>
                        <th>Jenis Konten</th>
                        <th>Jadwal Upload</th>
                        <th>Nama Penulis</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <!-- var itu dr coming controller-->
                <?php $no=1; foreach ($coming as $key => $value) { ?>
                    <tr style="text-align: justify;">
                        <td><?= $no++; ?></td>
                        <td><?= $value->judul_coming?></td>
                        <td><?= $value->jenis_konten?></td>
                        <td><?= $value->jadwal_upload?></td>
                        <td><?= $value->nama_penulis?></td>
                        <td class="text-center"><img src="<?= base_url('foto/gambar_coming/' .$value->gambar_coming) ?>" width="120px"></td>
                        
                        <td style="text-align: center;">
                            <a class="btn btn-sm btn-primary" href="<?= base_url('coming/detail/' . $value->id_coming) ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>

                            <a href="<?= base_url('coming/edit/' .$value->id_coming) ?>"class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                
                            <a href="<?= base_url('coming/delete/' .$value->id_coming) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
