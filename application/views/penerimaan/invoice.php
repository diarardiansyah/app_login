<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

<a href="<?= base_url('penerimaan/cetakInvoice/') . $penerimaan['id_penerimaan']; ?>" class="btn btn-primary mb-3" target="_blank">Cetak Invoice</a>

<div class="row">
    <div class="col-lg">

    <div class="col-md-4">
            <strong>Jenis Zakat : <?= $penerimaan['jenis_zakat']; ?></strong><br>
            <h6>Nama Petugas    : <?= $penerimaan['nama_petugas']; ?></h6>
            <h6>Nama Muzakki    : <?= $penerimaan['nama_muzakki']; ?></h6>
            <h6>Tanggal Pembayaran    : <?= $penerimaan['tanggal_pembayaran']; ?></h6><br>
    </div>

    <table class="table table-hover table-bordered" id="dataTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jumlah Zakat Beras</th>
                <th scope="col">Zakat Mal</th>
                <th scope="col">Infaq</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $penerimaan['zakat_beras']; ?></td>
                <td><?= "Rp. ".number_format($penerimaan['zakat_mal']) ." ,-"; ?></td>
                <td><?= "Rp. ".number_format($penerimaan['infaq']) ." ,-"; ?></td>
                <td>
                    <?php
                        if ( $penerimaan['status'] == 0) {
                            echo "<div class='badge badge-success'>Lunas</div>";
                        } else if ( $penerimaan['status'] == 1) {
                            echo "<div class='badge badge-danger'>Belum Lunas</div>";
                        }
                    ?>
                </td>
                <td>
                    <a href="" class="badge badge-success">Kirim ke WA</a>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</div>                
</div>