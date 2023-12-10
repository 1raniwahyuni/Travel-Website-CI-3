<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?=base_url('paket/add'); ?>" class="btn btn-success btn-m"><i class="fa fa-plus"> </i>
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
                        <th>Nama Paket</th>
                        <th>Harga Paket</th>
                        <th>Gambar Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <!-- var itu dr paket controller-->
                <?php $no=1; foreach ($paket as $key => $value) { ?>
                    <tr style="text-align: justify;">
                        <td><?= $no++; ?></td>
                        <td><?= $value->nama_paket?></td>
                        <td><?= $value->harga_paket?></td>
                        <td class="text-center"><img src="<?= base_url('foto/gambar_paket/' .$value->gambar_paket) ?>" width="150px"></td>
                       
                       
                        <td style="text-align: center;">
                            <a class="btn btn-sm btn-primary" href="<?= base_url('paket/detail/' . $value->id_paket) ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>

                            <a href="<?= base_url('paket/edit/' .$value->id_paket) ?>"class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                
                            <a href="<?= base_url('paket/delete/' .$value->id_paket) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
