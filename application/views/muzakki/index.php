  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="<?= base_url('muzakki/addDataMuzakki'); ?>" class="btn btn-primary mb-3">Add New Data Muzakki</a>

<div class="row">
    <div class="col-lg-9">

    <?= $this->session->flashdata('flash'); ?>

    <table class="table table-hover" id="dataTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Muzakki</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col">Jumlah Jiwa</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $muzakki as $m ) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $m['nama_muzakki']; ?></td>
                <td><?= $m['nomor_hp']; ?></td>
                <td><?= $m['jumlah_jiwa'] . " Orang"; ?></td>
                <td><?= $m['alamat']; ?></td>
                <td>
                    <a href="<?= base_url('muzakki/changeData/') . $m['id_muzakki']; ?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url('muzakki/deleteData/') . $m['id_muzakki']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this data ?');">Delete</a>
                    <a href="<?= base_url('muzakki/detail/') . $m['id_muzakki']; ?>" class="badge badge-warning">Click to detail</a>
                </td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
        </table>
    </div>
</div>                
</div>


