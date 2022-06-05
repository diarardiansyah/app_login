  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Add New Jenis Zakat</a>

<div class="row">
    <div class="col-lg-7">

    <?php if ( validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?= $this->session->flashdata('flash'); ?>

    <table class="table table-hover" id="dataTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Zakat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $zakat as $zkt ) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $zkt['jenis_zakat']; ?></td>
                <td>
                    <a href="<?= base_url('zakat/change_type/') . $zkt['id_jenis_zakat']; ?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url('zakat/delete_type/') . $zkt['id_jenis_zakat']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this data ?');">Delete</a>
                </td>
            </tr>
        </tbody>
            <?php endforeach ; ?>
        </table>
    </div>
</div>                
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Add New Data Jenis Zakat</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="<?= base_url('zakat'); ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="jenis_zakat" name="jenis_zakat" placeholder="Add Data Zakat">
        </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add Data Jenis Zakat</button>
  </div>
  </form>
</div>
</div>
</div>

