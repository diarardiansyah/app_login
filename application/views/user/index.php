<!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('flash'); ?>
        </div>
    </div>

        <div class="card" style="width: 14rem;">
                <img class="card-img-top" src="<?= base_url('assets/img/') . $user['image']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nama : <?= $user['name']; ?></h5>
                    <h6 class="card-title">Email : <?= $user['email']; ?></h6>
                    <p class="card-text">Date Created : <?= date('d F Y', $user['date_created']); ?></p>
                </div>
        </div>
</div>
<!-- /.container-fluid -->

            
<!-- End of Main Content -->

            