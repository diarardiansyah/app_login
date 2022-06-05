<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Infaq</div>
                        <?php foreach ( $jumlah_zakat as $j): ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= "Rp. ".number_format($j['total_infaq']) ." ,-"; ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="col-auto">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Zakat Mal</div>
                        <?php foreach ( $jumlah_zakat as $j): ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= "Rp. ".number_format($j['total_zakat_mal']) ." ,-"; ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="col-auto">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Zakat Beras
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                            <?php foreach ( $jumlah_zakat as $j ) : ?>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?= $j['jumlah_zakat_beras'] . " Liter"; ?>
                                </div>  
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Mustahik</div>
                        <?php foreach ( $jumlah_mustahik as $jml): ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= number_format($jml['total_mustahik']) . " Orang"; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-auto">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

 <!-- Jumbotron -->
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg">
             <div class="jumbotron">
                <h1 class="display-4">Hello, <?= $user['name']; ?></h1>
                <span> Selamat datang di aplikasi pengelolaan data zakat musholla al ikhwan.</span>
                <hr class="my-4">
                <p>Semoga dengan adanya aplikasi ini dapat mempermudah pendataan zakat di lingkungan musholla al-ikhwan.</p>
                <hr class="my-4">
                <strong><p>Doa menerima zakat Arab: آجَرَكَ اللهُ فِيْمَا اَعْطَيْتَ، وَبَارَكَ فِيْمَا اَبْقَيْتَ وَجَعَلَهُ لَكَ طَهُوْرًا
                <br>
                Doa menerima zakat latin: AAJAROKALLAAHU FIIMAA A’THOITA WABAAROKA FIIMAA ABQOITA WAJA’ALAHU LAKA THOHUURON
                <br>
                Artinya: "Semoga Allah memberikan pahala kepadamu pada barang yang engkau berikan (zakatkan) dan semoga Allah memberkahimu dalam harta-harta yang masih engkau sisakan dan semoga pula menjadikannya sebagai pembersih (dosa) bagimu."</p></strong>
            </div>
         </div>
    </div>
</div>