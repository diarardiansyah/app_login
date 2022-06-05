  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Add New Data Mustahik</a>

<div class="row">
    <div class="col-lg-9">

    <?php if ( validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?= $this->session->flashdata('flash'); ?>

    <table class="table table-hover table-bordered" id="dataTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mustahik</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $mustahik as $ms ) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $ms['nama_mustahik']; ?></td>
                <td><?= $ms['alamat_mustahik']; ?></td>
                <td>
                    <a href="<?= base_url('zakat/changeData/') . $ms['id_mustahik']; ?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url('zakat/deleteData/') . $ms['id_mustahik']; ?>" class="badge badge-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
        </table>
    </div>
</div>                
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Add New Data Muzakki</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="<?= base_url('mustahik'); ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="nama_mustahik" name="nama_mustahik" placeholder="Add Nama Mustahik">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="alamat_mustahik" name="alamat_mustahik" placeholder="Add Alamat">
        </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add Data Mustahik</button>
  </div>
  </form>
</div>
</div>
</div>

