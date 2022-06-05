<div class="container">
    <div class="row mt-3">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <strong><?= $title; ?></strong>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_penyaluran" value=<?= $penyaluran['id_penyaluran']; ?>>
                        <div class="form-group">
                            <select class="form-control" id="id_jenis_zakat" name="id_jenis_zakat">
                                <option value="">-Pilih Jenis Zakat-</option>
                                <?php foreach ( $zakat as $zkt ) : ?>
                                    <option <?php if($zkt['id_jenis_zakat'] == $penyaluran['id_jenis_zakat']){echo "selected='selected'";} ?> value="<?= $zkt['id_jenis_zakat']; ?>"><?= $zkt['jenis_zakat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="id_mustahik" name="id_mustahik">
                                <option value="">-Nama Mustahik-</option>
                                <?php foreach ( $mustahik as $m ) : ?>
                                    <option <?php if($m['id_mustahik'] == $penyaluran['id_mustahik']){echo "selected='selected'";} ?> value="<?= $m['id_mustahik']; ?>"><?= $m['nama_mustahik']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_penyaluran">Tanggal Penyaluran</label>
                            <input type="date" class="form-control" id="tanggal_penyaluran" name="tanggal_penyaluran" value="<?= $penyaluran['tanggal_penyaluran']; ?>">
                            <small class="form-text text-danger"><?= form_error('tanggal_penyaluran'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_beras">Jumlah Beras</label>
                            <input type="text" class="form-control" id="jumlah_beras" name="jumlah_beras" value="<?= $penyaluran['jumlah_beras']; ?>">
                            <small class="form-text text-danger"><?= form_error('jumlah_beras'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_uang">Jumlah Uang</label>
                            <input type="text" class="form-control" id="jumlah_uang" name="jumlah_uang" value="<?= $penyaluran['jumlah_uang']; ?>">
                            <small class="form-text text-danger"><?= form_error('jumlah_uang'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status_penyaluran">Status Penyaluran</label>
                            <input type="text" class="form-control" id="status_penyaluran" name="status_penyaluran" value="<?= $penyaluran['status_penyaluran']; ?>">
                            <small><strong>Status 0 = Lunas, status 1 = Belum lunas</strong></small>
                            <small class="form-text text-danger"><?= form_error('status_penyaluran'); ?></small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Change Data</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>
</div>