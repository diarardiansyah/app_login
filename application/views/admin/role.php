  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Add New Role</a>

<div class="row">
    <div class="col-lg-6">
    
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
    <?= $this->session->flashdata('flash'); ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $role as $r ) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $r['role']; ?></td>
                <td>
                    <a href="<?= base_url('admin/accessMenu/') . $r['id']; ?>" class="badge badge-warning">Access</a>
                    <a href="" class="badge badge-success">Edit</a>
                    <a href="" class="badge badge-danger">Delete</a>
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
    <h5 class="modal-title" id="exampleModalLongTitle">Add New Role</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="<?= base_url('menu/submenu'); ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Input Menu Title">
        </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
  </form>
</div>
</div>
</div>

