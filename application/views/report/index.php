<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row mt-3">
    <div class="col-lg-7">
        <form action="<?= base_url('report'); ?>" method="get">
            <table>
                <tr>
                    <th>Laporan Dari Tanggal</th>
                    <th>Sampai Dengan Tanggal</th>
                    <th width="1%"></th>
                </tr>
                <tr>
                    <td>
                        <input type="date" name="tgl_dari" class="form-control">
                    </td>
                    <td>
                        <br/>
                        <input type="date" name="sampai_tgl" class="form-control">
                        <br>
                    </td>
                    <td>
                        <input type="submit" class="btn btn-primary" value="Searh">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if ( isset($_GET['tgl_dari']) && isset($_GET['sampai_tgl'])) {

        base_url('report');

?>
<table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Zakat</th>
                <th>Nama Petugas</th>
                <th>Nama Muzakki</th>
                <th>Jumlah Zakat Beras</th>
                <th>Zakat Mal</th>
                <th>Infaq</th>
                <th>Tanggal Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $report as $r ) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $r['jenis_zakat']; ?></td>
                <td><?= $r['nama_petugas']; ?></td>
                <td><?= $r['nama_muzakki']; ?></td>
                <td><?= $r['zakat_beras'] . " Liter"; ?></td>
                <td><?= "Rp. ".number_format($r['zakat_mal']) ." ,-"; ?></td>
                <td><?= "Rp. ".number_format($r['infaq']) ." ,-"; ?></td>
                <td><?= $r['tanggal_pembayaran']; ?></td>
                <td>
                    <?php
                        if ( $r['status'] == 0) {
                            echo "<div class='badge badge-success'>Lunas</div>";
                        } else if ( $r['status'] == 1) {
                            echo "<div class='badge badge-danger'>Belum Lunas</div>";
                        }
                    ?>
                </td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
        <?php } ?>
        </table>

    
</div>
<!-- /.container-fluid -->

        
<!-- End of Main Content -->

        