
    <section class="my-4">
        <div class="container">
            <h2>Mahasiswa</h2>
            
            <?php if (!empty($session)) { ?>

            <div class="alert alert-<?php echo $session['status'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                <?php echo $session['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php } ?>
            
            <p>
                <a href="<?php echo site_url('Mahasiswa/add'); ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </p>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th width="170">Aksi</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($dataMahasiswa as $row) : ?>

                    <tr>
                        <th>
                            <a href="<?php echo site_url('Mahasiswa/edit/'.$row->nim); ?>" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i> Ubah
                            </a>
                            <a href="<?php echo site_url('Mahasiswa/delete/'.$row->nim); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data akan dihapus?');">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </th>
                        <td><?php echo $row->nim; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->jenis_kelamin; ?></td>
                        <td><?php echo $row->agama; ?></td>
                    </tr>

                    <?php
                        endforeach;

                        if (empty($dataMahasiswa)) {
                    ?>

                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>

                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </section>
