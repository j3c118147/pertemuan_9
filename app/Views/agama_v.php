
    <section class="my-4">
        <div class="container">
            <h2>Agama</h2>
            
            <?php if (!empty($session)) { ?>

            <div class="alert alert-<?php echo $session['status'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                <?php echo $session['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php } ?>
            
            <p>
                <a href="<?php echo site_url('Agama/add'); ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </p>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th width="170">Aksi</th>
                        <th>Kode</th>
                        <th>Agama</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($dataAgama as $row) : ?>

                    <tr>
                        <th>
                            <a href="<?php echo site_url('Agama/edit/'.$row->kode_agama); ?>" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i> Ubah
                            </a>
                            <a href="<?php echo site_url('Agama/delete/'.$row->kode_agama); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data akan dihapus?');">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </th>
                        <td><?php echo $row->kode_agama; ?></td>
                        <td><?php echo $row->agama; ?></td>
                    </tr>

                    <?php
                        endforeach;

                        if (empty($dataAgama)) {
                    ?>

                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data</td>
                    </tr>

                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </section>
