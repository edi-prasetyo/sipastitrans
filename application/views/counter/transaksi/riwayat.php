<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>
<div class="container my-3 pb-5">

    <?php foreach ($transaksi as $transaksi) : ?>
        <a class="text-decoration-none text-muted" href="<?php echo base_url('counter/transaksi/detail/' . $transaksi->id); ?>">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <?php echo date('d/m/Y', strtotime($transaksi->date_created)); ?> - <?php echo date('H:i', strtotime($transaksi->date_created)); ?><br>
                            <?php echo $transaksi->order_id; ?>

                        </div>
                        <div class="col-5 text-right">
                            Rp. <?php echo number_format($transaksi->total_price, 0, ",", "."); ?><br>
                            <?php if ($transaksi->stage == 1) : ?>
                                <div class="badge badge-warning">Belum dikirim ke Driver</div>
                            <?php elseif ($transaksi->stage == 2) : ?>
                                <div class="badge badge-info">Di terima driver</div>
                            <?php elseif ($transaksi->stage == 3) : ?>
                                <div class="badge badge-primary">Dalam Pengantaran</div>
                            <?php elseif ($transaksi->stage == 4) : ?>
                                <div class="badge badge-success">Selesai</div>
                            <?php elseif ($transaksi->stage == 5) : ?>
                                <div class="badge badge-danger">Ditolak Driver</div>
                            <?php else : ?>
                                <div class="badge badge-danger"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    <?php endforeach; ?>

    <!-- /.card-body -->

    <div class="mt-4">
        <?php if (isset($pagination)) {
            echo $pagination;
        } ?>
    </div>

</div>