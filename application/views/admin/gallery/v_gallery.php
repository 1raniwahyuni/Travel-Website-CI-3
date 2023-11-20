<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?=base_url('gallery/add'); ?>" class="btn btn-success btn-m">
                <i class="fa fa-plus"> </i> Tambah Data Foto</a>
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
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Gallery</th>
                        <th class="text-center" >Sampul Gallery</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php $no=1; foreach ($gallery as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $value->nama_gallery?></td>
                        <td class="text-center">
                        <img src="<?= base_url('sampul_gallery/'.$value->sampul_gallery) ?>" width="150px"><br>
                        <i class="fa fa-image"> <?= $value->jml_foto ?> Foto </i><br>
                        <!-- yang tadi di atas itu hanya sampulnya saja, dibawah ini untuk add tiap foto per album -->
                        <a href="<?= base_url('gallery/add_foto')?>" class="btn btn-success btn-xs">
                        <i class=" fa fa-plus"></i> Tambah Foto</a>
                        </td>
                        
                        <td style="text-align: center;">
                        <a class="btn btn-sm btn-primary" href="<?= base_url('gallery/detail/' . $value->id_gallery) ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>

                            <a href="<?= base_url('gallery/edit/' .$value->id_gallery) ?>"class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                
                            <a href="<?= base_url('gallery/delete/' .$value->id_gallery) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" 
                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

