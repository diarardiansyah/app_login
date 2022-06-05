  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="<?= base_url('penerimaan/addNewData'); ?>" class="btn btn-primary mb-3">Add New Data Penerimaan</a>


<div class="row mt-3">
    <div class="col-lg">

    <?= $this->session->flashdata('flash'); ?>

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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $penerimaan as $p ) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $p['jenis_zakat']; ?></td>
                <td><?= $p['nama_petugas']; ?></td>
                <td><?= $p['nama_muzakki']; ?></td>
                <td><?= $p['zakat_beras'] . " Liter"; ?></td>
                <td><?= "Rp. ".number_format($p['zakat_mal']) ." ,-"; ?></td>
                <td><?= "Rp. ".number_format($p['infaq']) ." ,-"; ?></td>
                <td><?= $p['tanggal_pembayaran']; ?></td>
                <td>
                    <?php
                        if ( $p['status'] == 0) {
                            echo "<div class='badge badge-success'>Lunas</div>";
                        } else if ( $p['status'] == 1) {
                            echo "<div class='badge badge-danger'>Belum Lunas</div>";
                        }
                    ?>
                </td>
                <td>
                    <a href="<?= base_url('penerimaan/changeData/') . $p['id_penerimaan']; ?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url('penerimaan/invoice/') . $p['id_penerimaan']; ?>" class="badge badge-warning" >Invoice</a>
                    <a href="<?= base_url('penerimaan/deleteData/') . $p['id_penerimaan']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this data ?');">Delete</a>
                </td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
        </table>
                        
    </div>
</div>                
</div>
