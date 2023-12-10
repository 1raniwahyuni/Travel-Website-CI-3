<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?=base_url('konten/add'); ?>" class="btn btn-success btn-m">
                <i class="fa fa-plus"> </i> Tambah Data</a>
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
                        <th>Nama Penulis</th>
                        <th>Ketegori Konten</th>
                        <th>Gambar Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php $no=1; foreach ($konten as $key => $value) { ?>
                    <tr style="text-align: justify;">
                        <td><?= $no++; ?></td>
                        <td><?= $value->judul_konten?></td> 
                        <td><?= $value->nama_penulis?></td>
                        <td><?= $value->jenis_konten?></td>
                        <td><img src="<?= base_url('foto/gambar_konten/' . $value->gambar_konten) ?>" width="150px"></td>
                        
                        <!-- aksi -->
                        <td style="text-align: center;">
                            <a class="btn btn-sm btn-primary" href="<?= base_url('konten/detail/' . $value->id_konten) ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>

                            <a class="btn btn-sm btn-success" href="<?= base_url('konten/edit/' . $value->id_konten) ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                                
                            <a href="<?= base_url('konten/delete/' .$value->id_konten) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
