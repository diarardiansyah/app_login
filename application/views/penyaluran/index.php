<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="<?= base_url('penyaluran/addNewData'); ?>" class="btn btn-primary mb-3">Add New Data Penyaluran</a>

<div class="row mt-3">
    <div class="col-lg">

    <?= $this->session->flashdata('flash'); ?>

    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Zakat</th>
                <th>Nama Mustahik</th>
                <th>Tanggal Penyaluran</th>
                <th>Jumlah Beras</th>
                <th>Jumlah Uang</th>
                <th>Status Penyaluran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $penyaluran as $p ) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $p['jenis_zakat']; ?></td>
                <td><?= $p['nama_mustahik']; ?></td>
                <td><?= $p['tanggal_penyaluran']; ?></td>
                <td><?= $p['jumlah_beras'] . " Liter"; ?></td>
                <td><?= "Rp. ".number_format($p['jumlah_uang']) ." ,-"; ?></td>
                <td>
                    <?php
                        if ( $p['status_penyaluran'] == 0) {
                            echo "<div class='badge badge-danger'>Belum Disalurkan</div>";
                        } else if ( $p['status_penyaluran'] == 1) {
                            echo "<div class='badge badge-success'>Sudah Disalurkan</div>";
                        }
                    ?>
                </td>
                <td>
                    <a href="<?= base_url('penyaluran/changeData/') . $p['id_penyaluran']; ?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url('penyaluran/deleteData/') . $p['id_penyaluran']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this data ?');">Delete</a>
                </td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
        </table>
                        
    </div>
</div>                
</div>
