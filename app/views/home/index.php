<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">HARI INI</h1>
</div>

<!-- Content Row -->
<div class="row">

<?php
$totalToday = 0;
$deviceToday = 0;
$minumToday = 0;
    foreach($data['transaksiToday'] as $transaksi):
        $totalToday += $transaksi['total'] ;
        $deviceToday += $transaksi['harga_device'];
        $minumToday += $transaksi['harga_minum'];
    endforeach;
?>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Pendapatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?=$totalToday?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pendapatan Device</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?=$deviceToday;?></div>
                </div>
                <div class="col-auto">
                    <i class="text-gray-300 fas fa-gamepad fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Pendapatan Minum</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?=$minumToday;?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-glass-martini-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">SEMUA</h1>
</div>


<!-- Content Row -->
<div class="row">

<?php
$total = 0;
$device = 0;
$minum = 0;
    foreach($data['transaksi'] as $transaksi):
        $total += $transaksi['total'] ;
        $device += $transaksi['harga_device'];
        $minum += $transaksi['harga_minum'];
    endforeach;
?>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Pendapatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?=$total;?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pendapatan Device</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?=$device;?></div>
                </div>
                <div class="col-auto">
                    <i class="text-gray-300 fas fa-gamepad fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Pendapatan Minum</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?=$minum;?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-glass-martini-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>