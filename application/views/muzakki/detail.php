<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <span><?= $title; ?></span>
                </div>
                <div class="card-body">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nama Muzakki : <br> <strong><?= $muzakki['nama_muzakki']; ?></strong></li>
                        <li class="list-group-item">Nama Anggota keluarga : <br> <strong><?= $muzakki['nama_anggota_keluarga'] ?></strong></li>
                        <li class="list-group-item">Alamat : <br> <strong><?= $muzakki['alamat']; ?></strong></li>
                    </ul>
                </div><br>
                    <a href="<?= base_url('muzakki'); ?>" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>