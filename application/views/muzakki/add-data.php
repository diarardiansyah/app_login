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
                            <label for="nama_muzakki">Nama Muzakki</label>
                            <input type="text" class="form-control" id="nama_muzakki" name="nama_muzakki">
                            <small class="form-text text-danger"><?= form_error('nama_muzakki'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_jiwa">Jumlah Jiwa</label>
                            <input type="number" class="form-control" id="jumlah_jiwa" name="jumlah_jiwa">
                            <small class="form-text text-danger"><?= form_error('jumlah_jiwa'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama_anggota_keluarga">Nama Anggota Keluarga</label>
                            <input type="text" class="form-control" id="nama_anggota_keluarga" name="nama_anggota_keluarga">
                            <small class="form-text text-danger"><?= form_error('nama_anggota_keluarga'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor Hp</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp">
                            <small class="form-text text-danger"><?= form_error('nomor_hp'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
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