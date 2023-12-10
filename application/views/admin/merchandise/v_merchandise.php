<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?=base_url('merchandise/add'); ?>" class="btn btn-success btn-m"><i class="fa fa-plus"> </i>
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
                        <th>Gambar Merchandise</th>
                        <th>Nama Merchandise</th>
                        <th>Harga Merchandise</th>
                        <th>Stok Merchandise</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <!-- var itu dr merchandise controller-->
                <?php $no=1; foreach ($merchandise as $key => $value) { ?>
                    <tr style="text-align: center;">
                        <td><?= $no++; ?></td>
                        <td><img src="<?= base_url('foto/gambar_merchandise/' .$value->gambar_merchandise) ?>" width="150px"></td>
                        <td><?= $value->nama_merchandise?></td>
                        <td><?= $value->harga_merchandise?></td>
                        <td><?= $value->stok?></td>

                        <td style="text-align: center;">
                            <a class="btn btn-sm btn-primary" href="<?= base_url('merchandise/detail/' . $value->id_merchandise) ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>

                            <a href="<?= base_url('merchandise/edit/' .$value->id_merchandise) ?>"class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                
                            <a href="<?= base_url('merchandise/delete/' .$value->id_merchandise) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
