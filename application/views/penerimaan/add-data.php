<div class="container">
    <div class="row mt-3">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <strong><?= $title; ?></strong>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Jenis Zakat</label>
                            <select class="form-control" id="id_jenis_zakat" name="id_jenis_zakat">
                                <option value="">-Pilih Jenis Zakat-</option>
                                <?php foreach ( $zakat as $zkt ) : ?>
                                    <option value="<?= $zkt['id_jenis_zakat'] ?>"><?= $zkt['jenis_zakat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                         <label for="">Nama Petugas</label>
                            <select class="form-control" id="id_petugas" name="id_petugas">
                                <option value="">-Nama Petugas-</option>
                                <?php foreach ( $petugas as $p ) : ?>
                                    <option value="<?= $p['id_petugas'] ?>"><?= $p['nama_petugas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="">Nama Muzakki</label>
                            <select class="form-control" id="id_muzakki" name="id_muzakki">
                                <option value="">-Nama Muzakki-</option>
                                <?php foreach ( $muzakki as $m ) : ?>
                                    <option value="<?= $m['id_muzakki'] ?>"><?= $m['nama_muzakki']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="zakat_beras">Jumlah Zakat Beras</label>
                            <input type="text" class="form-control" id="zakat_beras" name="zakat_beras">
                            <small class="form-text text-danger"><?= form_error('zakat_beras'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="zakat_mal">Jumlah Zakat Mal</label>
                            <input type="text" class="form-control" id="zakat_mal" name="zakat_mal">
                            <small class="form-text text-danger"><?= form_error('zakat_mal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="infaq">Infaq</label>
                            <input type="text" class="form-control" id="infaq" name="infaq">
                            <small class="form-text text-danger"><?= form_error('infaq'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pembayaran">Tanggal Pembayaran Zakat</label>
                            <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" value=<?= date('Y-m-d'); ?>>
                            <small class="form-text text-danger"><?= form_error('tanggal_pembayaran'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Pembayaran</label>
                            <input type="number" class="form-control" id="status" name="status">
                            <small><strong>Status 0 = Lunas, status 1 = Belum lunas</strong></small>
                            <small class="form-text text-danger"><?= form_error('status'); ?></small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add New Data</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>
</div>