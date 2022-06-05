<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

<div class="row">
    <div class="col-lg">

    <div class="col-md-4">
            <strong>Jenis Zakat : <?= $penerimaan['jenis_zakat']; ?></strong><br>
            <h6>Nama Petugas    : <?= $penerimaan['nama_petugas']; ?></h6>
            <h6>Nama Muzakki    : <?= $penerimaan['nama_muzakki']; ?></h6>
            <h6>Tanggal Pembayaran    : <?= $penerimaan['tanggal_pembayaran']; ?></h6><br>
    </div>

    <table class="table table-hover table-bordered" id="dataTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jumlah Zakat Beras</th>
                <th scope="col">Zakat Mal</th>
                <th scope="col">Infaq</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $penerimaan['zakat_beras']; ?></td>
                <td><?= "Rp. ".number_format($penerimaan['zakat_mal']) ." ,-"; ?></td>
                <td><?= "Rp. ".number_format($penerimaan['infaq']) ." ,-"; ?></td>
                <td>
                    <?php
                        if ( $penerimaan['status'] == 0) {
                            echo "<div class='badge badge-success'>Lunas</div>";
                        } else if ( $penerimaan['status'] == 1) {
                            echo "<div class='badge badge-danger'>Belum Lunas</div>";
                        }
                    ?>
                </td>
            </tr>
        </tbody>
        </table>
        
        <br><br>
        <strong>Zakat merupakan salah satu rukun Islam dan menjadi salah satu unsur pokok tiang penegakan syariat Islam. Oleh sebab itu, hukum menunaikan zakat adalah wajib bagi setiap muslim dam muslimah yang telah memenuhi syarat-syarat tertentu. Allah SWT berfirman, “Padahal mereka tidak disuruh kecuali supaya menyembah Allah dengan memurnikan ketaatan kepada-Nya dalam (menjalankan) agama yang lurus, dan supaya mereka mendirikan shalat dan menunaikan zakat. Dan yang demikian itulah agama yang lurus” (QS. Al-Bayyinah[98]:5).</strong>
    
    </div>

</div>                
</div>


<script type="text/javascript">
	window.print();
</script>