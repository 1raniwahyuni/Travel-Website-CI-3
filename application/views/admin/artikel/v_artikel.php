<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?=base_url('artikel/add'); ?>" class="btn btn-success btn-m"><i class="fa fa-plus"> </i>
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
                        <th>Gambar Artikel</th>
                        <th>Judul Artikel</th>
                        <th>Diposting Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <!-- var itu dr artikel controller-->
                <?php $no=1; foreach ($artikel as $key => $value) { ?>
                    <tr style="text-align: justify;">
                        <td><?= $no++; ?></td>
                        <td class="text-center"><img src="<?= base_url('foto/gambar_artikel/' .$value->gambar_artikel) ?>" width="150px"></td>
                        <td><?= $value->judul_artikel?></td>
                        <td><?= $value->username?></td>
                       
                        <td style="text-align: center;">
                            <a class="btn btn-sm btn-primary" href="<?= base_url('artikel/detail/' . $value->id_artikel) ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>

                            <a href="<?= base_url('artikel/edit/' .$value->id_artikel) ?>"class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                
                            <a href="<?= base_url('artikel/delete/' .$value->id_artikel) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
