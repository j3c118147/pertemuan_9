
    <section class="my-4">
        <div class="container">
            <h2>Mahasiswa</h2>
            <form method="post" action="<?php echo site_url('Mahasiswa/save'); ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" name="nim" required value="<?php if (!empty($dataMahasiswa)) echo $dataMahasiswa->nim; ?>">
                        <input type="hidden" id="id" name="id" value="<?php if (!empty($dataMahasiswa)) echo $dataMahasiswa->nim; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?php if (!empty($dataMahasiswa)) echo $dataMahasiswa->nama; ?>">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="Pria"<?php if (empty($dataMahasiswa) || !empty($dataMahasiswa) && $dataMahasiswa->jenis_kelamin == 'Pria') echo ' checked'; ?>>
                                <label class="form-check-label">
                                    Pria
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="wanita" value="Wanita"<?php if (!empty($dataMahasiswa) && $dataMahasiswa->jenis_kelamin == 'Wanita') echo ' checked'; ?>>
                                <label class="form-check-label">
                                    Wanita
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select id="kode_agama" name="kode_agama" class="form-control" required>
                            <?php foreach ($dataAgama as $row) : ?>
                            <option value="<?php echo $row->kode_agama; ?>"<?php if (!empty($dataMahasiswa) && $dataMahasiswa->kode_agama == $row->kode_agama) echo ' selected'; ?>><?php echo $row->agama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamat" name="alamat"><?php if (!empty($dataMahasiswa)) echo $dataMahasiswa->alamat; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required value="<?php if (!empty($dataMahasiswa)) echo $dataMahasiswa->tempat_lahir; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required value="<?php if (!empty($dataMahasiswa)) echo $dataMahasiswa->tanggal_lahir; ?>">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Hobi</legend>
                        <div class="col-sm-10">
                            <?php foreach ($dataHobi as $row) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobi[]" value="<?php echo $row->kode_hobi; ?>"<?php if (!empty($dataHobiMahasiswa) && in_array($row->kode_hobi, $dataHobiMahasiswa)) echo ' checked'; ?>>
                                <label class="form-check-label">
                                    <?php echo $row->hobi; ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="button" class="btn btn-secondary btn-sm" id="cancel">Batal</button>
            </form>
        </div>
    </section>
