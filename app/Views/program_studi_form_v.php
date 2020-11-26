
    <section class="my-4">
        <div class="container">
            <h2>Program Studi</h2>
            <form method="post" action="<?php echo site_url('Program_Studi/save'); ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode" name="kode" required maxlength="1" value="<?php if (!empty($dataProdi)) echo $dataProdi->kode_prodi; ?>">
                        <input type="hidden" id="id" name="id" value="<?php if (!empty($dataProdi)) echo $dataProdi->kode_prodi; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?php if (!empty($dataProdi)) echo $dataProdi->nama_prodi; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ketua</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ketua" name="ketua" required value="<?php if (!empty($dataProdi)) echo $dataProdi->ketua_prodi; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
            </form>
        </div>
    </section>
