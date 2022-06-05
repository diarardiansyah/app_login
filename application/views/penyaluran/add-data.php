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
                         <label for="">Nama Mustahik</label>
                            <select class="form-control" id="id_mustahik" name="id_mustahik">
                                <option value="">-Nama Mustahik-</option>
                                <?php foreach ( $mustahik as $m ) : ?>
                                    <option value="<?= $m['id_mustahik'] ?>"><?= $m['nama_mustahik']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Penyaluran</label>
                            <input type="date" class="form-control" id="tanggal_penyaluran" name="tanggal_penyaluran" value=<?= date('Y-m-d'); ?>>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_beras">Jumlah Beras</label>
                            <input type="text" class="form-control" id="jumlah_beras" name="jumlah_beras">
                            <small class="form-text text-danger"><?= form_error('jumlah_beras'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_uang">Jumlah Uang</label>
                            <input type="text" class="form-control" id="jumlah_uang" name="jumlah_uang">
                            <small class="form-text text-danger"><?= form_error('jumlah_uang'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="status_penyaluran">Status Penyaluran</label>
                            <input type="text" class="form-control" id="status_penyaluran" name="status_penyaluran">
                            <small><strong>Status 0 = Belum Disalurkan, Status 1 = Sudah Disalurkan</strong></small>
                            <small class="form-text text-danger"><?= form_error('status_penyaluran'); ?></small>
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