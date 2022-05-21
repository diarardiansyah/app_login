<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row mt-3">
        <div class="col-lg-8">
            
            <?= form_open_multipart('user/editProfile'); ?>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email User : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                    <small class="form-text text-muted"></small>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Full Name : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                        <small class="form-text text-danger"><?= form_error('name'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Picture : </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/') . $user['image']; ?>" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

