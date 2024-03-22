<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        .judul{
            width: 80%;
            margin: 30px 0 0 2%;
        }
        .table{
            border-collapse: collapse;
            vertical-align: top;
            
        }
        .border{
            border: 1px solid #000000;
        }
        .center{
            text-align: center;
        }
        .middle{
            vertical-align: middle;
        }
    </style>
</head>
<body onload="window.print();">

    <h3 class="center">Laporan ISCO GAME XT</h3>
    
    <table width="100%" class="table border">
        <tr>
            <th class="border" rowspan="2">No</th>
            <th class="border" rowspan="2">Tanggal</th>
            
            <th class="border" rowspan="2">TV</th>
            <th class="border" rowspan="2">Paket</th>
            <th class="border" colspan="5">Device</th>
            <th class="border" colspan="3">Minuman</th>
            <th class="border" rowspan="2">Total</th>
            <th class="border" rowspan="2">Bayar</th>
            <th class="border" rowspan="2">Keterangan</th>
            <th rowspan="2" class="border">Operator</th>
            <th rowspan="2" class="border">Sift</th>    
        </tr>
        <tr class="table border">
            <th class="border" >Jenis</th>
            <th class="border" >Mulai</th>
            <th class="border" >Selesai</th>
            <th class="border" >Tambah</th>
            <th class="border" >Harga</th>
            <th class="border" >3K</th>
            <th class="border" >4K</th>
            <th class="border" >Harga</th>
        </tr>
        <?php
        $i=1;
        $minum = 0;
        $device = 0;
        $total=0;
        $minumCash = 0;
        $deviceCash = 0;
        $minumQris = 0;
        $deviceQris = 0;
        foreach($data['transaksi'] as $transaksi):
        ?>
        <tr>
            <td  class="align-middle border center"><?= $i++; ?></td>
            
            <td class="align-middle border center"><?= $transaksi['tanggal']; ?></td>
            <td class="align-middle border center"><?= $transaksi['no_tv']; ?></td>
            <td class="align-middle border center"><?= $transaksi['paket']; ?></td>
            <td class="align-middle border center"><?= $transaksi['name_device']; ?></td>
            <td class="align-middle border center"><?= $transaksi['jam_mulai']; ?></td>
            <td class="align-middle border center"><?= $transaksi['jam_selesai']; ?></td>
            <td class="align-middle border center"><?= $transaksi['tambah_waktu']; ?></td>
            <td class="align-middle border center"><?= $transaksi['harga_device']; ?></td>
            <td class="align-middle border center"><?= $transaksi['minuman_3k']; ?></td>
            <td class="align-middle border center"><?= $transaksi['minuman_4k']; ?></td>
            <td class="align-middle border center"><?= $transaksi['harga_minum']; ?></td>
            <td class="align-middle border center"><?= $transaksi['total']; ?></td>
            <td class="align-middle border center"><?= $transaksi['bayar']; ?></td>
            <td class="align-middle border center"><?= $transaksi['keterangan']; ?></td>

            <td class="align-middle border center">
                <?php 
                    foreach($data['operator'] as $operator):
                        if($operator['id_operator']==$transaksi['id_operator']){
                            echo $operator['name_operator'];
                        }
                    endforeach;
                ?>
            </td>

            <td class="align-middle border center"><?php 
                    foreach($data['sift'] as $sift):
                        if($sift['id_sift']==$transaksi['id_sift']){
                            echo $sift['name_sift'];
                        }
                    endforeach;
                ?></td>
        </tr>
        <?php
        $device += $transaksi['harga_device'];
        $minum += $transaksi['harga_minum'];
        $total += $transaksi['total'];
        if($transaksi['bayar']=='cash'){
            $minumCash += $transaksi['harga_minum']; 
            $deviceCash += $transaksi['harga_device']; 
        }else{
            $minumQris += $transaksi['harga_minum']; 
            $deviceQris += $transaksi['harga_device']; 
        }
        endforeach;
        ?>
        <tr>
            <td class="border" colspan="8">Total</td>
            <td >Rp. <?=$device;?></td>
            <td class="border" colspan="2"></td>
            <td class="border"> Rp. <?=$minum;?></td>
            <td class="border"> Rp. <?=$total;?></td>
            <td class="border" colspan="4"></td>
        </tr>
    </table>
    <br>
    <table width="70%">
        <tr>
            <td width="33%">
                <table class="table border" width="100%">
                    <tr class="table border">
                        <td class="border" width="60%">Pendapatan Cash</td>
                        <td class="border" width="40%" >Jumlah</td>
                    </tr>
                    <tr class="table border">
                        <td class="border">PS & PC</td>
                        <td class="border">Rp. <?=$deviceCash;?></td>
                    </tr>
                    <tr class="table border">
                        <td class="border">Minum</td>
                        <td class="border">Rp. <?=$minumCash;?></td>
                    </tr>
                    <tr class="table border">
                        <td class="border">Total</td>
                        <td class="border">Rp. <?=$deviceCash+ $minumCash;?></td>
                    </tr>
                </table>
            </td>
            <td width="2%"></td>
            <td width="33%">
            <table class="table border" width="100%">
                    <tr class="table border">
                        <td class="border" width="60%">Pendapatan Qris</td>
                        <td class="border" width="40%" >Jumlah</td>
                    </tr>
                    <tr class="table border">
                        <td class="border">PS & PC</td>
                        <td class="border">Rp. <?=$deviceQris;?></td>
                    </tr>
                    <tr class="table border">
                        <td class="border">Minum</td>
                        <td class="border">Rp. <?=$minumQris;?></td>
                    </tr>
                    <tr class="table border">
                        <td class="border">Total</td>
                        <td class="border">Rp. <?=$deviceQris+ $minumQris;?></td>
                    </tr>
                </table>
            </td>
            <td width="2%"></td>
            <td width="30%" class="middle">
            <table class="table border middle" width="100%">
                    <tr class="table border middle">
                        <td class="border middle" width="60%">Total Pendapatan</td>
                        <td class="border middle" width="40%"><?=$total;?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
              
</body>
</html>