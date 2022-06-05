<div class="container">
    <div class="row mt-3">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <strong><?= $title; ?></strong>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_petugas" value=<?= $petugas['id_petugas']; ?>>
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $petugas['nama_petugas']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama_petugas'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor Hp Petugas</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?= $petugas['nomor_hp']; ?>">
                            <small class="form-text text-danger"><?= form_error('nomor_hp'); ?></small>
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