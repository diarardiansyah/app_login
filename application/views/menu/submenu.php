  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Add New Sub Menu</a>

<div class="row">
    <div class="col-lg">

    <?php if ( validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?= $this->session->flashdata('flash'); ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Menu</th>
                <th scope="col">URL</th>
                <th scope="col">Icon</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach( $submenu as $sm ) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $sm['title']; ?></td>
                <td><?= $sm['menu']; ?></td>
                <td><?= $sm['url']; ?></td>
                <td><?= $sm['icon']; ?></td>
                <td><?= $sm['is_active']; ?></td>
                <td>
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
    <h5 class="modal-title" id="exampleModalLongTitle">Add New Sub Menu</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="<?= base_url('menu/submenu'); ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Input Title">
        </div>
        <div class="form-group">
             <select class="form-control" id="menu_id" name="menu_id">
                 <option value="">-Pilih Menu-</option>
                 <?php foreach ( $menu as $m ) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Input url">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Input icon">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                <label class="form-check-label" for="is_active">
                    Active ?
                </label>
            </div>
        </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add Submenu</button>
  </div>
  </form>
</div>
</div>
</div>

