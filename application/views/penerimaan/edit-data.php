<div class="container">
    <div class="row mt-3">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <strong><?= $title; ?></strong>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_penerimaan" value=<?= $penerimaan['id_penerimaan']; ?>>
                        <div class="form-group">
                            <select class="form-control" id="id_jenis_zakat" name="id_jenis_zakat">
                                <option value="">-Pilih Jenis Zakat-</option>
                                <?php foreach ( $zakat as $zkt ) : ?>
                                    <option <?php if($zkt['id_jenis_zakat'] == $penerimaan['id_jenis_zakat']){echo "selected='selected'";} ?> value="<?= $zkt['id_jenis_zakat']; ?>"><?= $zkt['jenis_zakat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="id_petugas" name="id_petugas">
                                <option value="">-Nama Petugas-</option>
                                <?php foreach ( $petugas as $p ) : ?>
                                    <option <?php if($p['id_petugas'] == $penerimaan['id_petugas']){echo "selected='selected'";} ?> value="<?= $p['id_petugas']; ?>"><?= $p['nama_petugas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="id_muzakki" name="id_muzakki">
                                <option value="">-Nama Muzakki-</option>
                                <?php foreach ( $muzakki as $m ) : ?>
                                    <option <?php if($m['id_muzakki'] == $penerimaan['id_muzakki']){echo "selected='selected'";} ?> value="<?= $m['id_muzakki']; ?>"><?= $m['nama_muzakki']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="zakat_beras">Jumlah Zakat Beras</label>
                            <input type="text" class="form-control" id="zakat_beras" name="zakat_beras" value="<?= $penerimaan['zakat_beras']; ?>">
                            <small class="form-text text-danger"><?= form_error('zakat_beras'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="zakat_mal">Jumlah Zakat Mal</label>
                            <input type="text" class="form-control" id="zakat_mal" name="zakat_mal" value="<?= $penerimaan['zakat_mal']; ?>">
                            <small class="form-text text-danger"><?= form_error('zakat_mal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="infaq">Infaq</label>
                            <input type="text" class="form-control" id="infaq" name="infaq" value="<?= $penerimaan['infaq']; ?>">
                            <small class="form-text text-danger"><?= form_error('infaq'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" value="<?= $penerimaan['tanggal_pembayaran']; ?>">
                            <small class="form-text text-danger"><?= form_error('tanggal_pembayaran'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Pembayaran</label>
                            <input type="text" class="form-control" id="status" name="status" value="<?= $penerimaan['status']; ?>">
                            <small><strong>Status 0 = Lunas, status 1 = Belum lunas</strong></small>
                            <small class="form-text text-danger"><?= form_error('status'); ?></small>
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