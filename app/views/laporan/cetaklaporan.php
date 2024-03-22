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
    </style>
</head>
<body onload="window.print();">
    <table class="judul">
        <tr>
            <td>Uang Kas</td>
            <td>:</td>
            <td></td>
            <td width="20%"></td>
            <td>Laporan Harian</td>
            <td width="20%"></td>
            <td>Operator</td>
            <td>:</td>
            <td><?=$data['operatorById']['name_operator'];?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?php if($data['awal']==$data['akhir']){
                echo $data['awal']; 
            }else{
                echo $data['awal'] .' s/d '. $data['akhir'];
            }
            ?>
            </td>
            <td width="20%"></td>
            <td>ISCO GAME XT</td>
            <td width="20%"></td>
            <td>Sift</td>
            <td>:</td>
            <td><?=$data['siftById']['name_sift'];?></td>
            
        </tr>
    </table>
    <br>



    <table width="100%" class="table">
        <tr class="table">
            <td width="75%">
                <table width="100%" class="table border">
                    <tr>
                        <th class="border"rowspan="2">No</th>
                        
                        <th class="border"rowspan="2">TV</th>
                        <th class="border"rowspan="2">Paket</th>
                        <th class="border"colspan="5">Device</th>
                        <th class="border"colspan="3">Minuman</th>
                        <th class="border"rowspan="2">Total</th>
                        <th class="border"rowspan="2">Bayar</th>
                        <th class="border"rowspan="2">Keterangan</th>
                    </tr>
                    <tr class="table border">
                        <th class="border">Jenis</th>
                        <th class="border">Mulai</th>
                        <th class="border">Selesai</th>
                        <th class="border">Tambah</th>
                        <th class="border">Harga</th>
                        
                        <th class="border">3K</th>
                        <th class="border">4K</th>
                        <th class="border">Harga</th>
                        
                    </tr>
                    <?php
                    $i=1;
                    $minumCash = 0;
                    $deviceCash = 0;
                    $minumQris = 0;
                    $deviceQris = 0;
                    $total=0;
                    foreach($data['transaksi'] as $data):
                    ?>
                    <tr>
                        <td  class="align-middle border center"><?= $i++; ?></td>
                        
                        <td class="align-middle border center"><?= $data['no_tv']; ?></td>
                        <td class="align-middle border center"><?= $data['paket']; ?></td>
                        <td class="align-middle border center"><?= $data['name_device']; ?></td>
                        <td class="align-middle border center"><?= $data['jam_mulai']; ?></td>
                        <td class="align-middle border center"><?= $data['jam_selesai']; ?></td>
                        <td class="align-middle border center"><?= $data['tambah_waktu']; ?></td>
                        <td class="align-middle border center"><?= $data['harga_device']; ?></td>
                        <td class="align-middle border center"><?= $data['minuman_3k']; ?></td>
                        <td class="align-middle border center"><?= $data['minuman_4k']; ?></td>
                        <td class="align-middle border center"><?= $data['harga_minum']; ?></td>
                        <td class="align-middle border center"><?= $data['total']; ?></td>
                        <td class="align-middle border center"><?= $data['bayar']; ?></td>
                        <td class="align-middle border center"><?= $data['keterangan']; ?></td>
                    </tr>
                    <?php
                    $total += $data['total']; 
                    if($data['bayar']=='cash'){
                        $minumCash += $data['harga_minum']; 
                        $deviceCash += $data['harga_device']; 
                    }else{
                        $minumQris += $data['harga_minum']; 
                        $deviceQris += $data['harga_device']; 
                    }
                    endforeach;
                    ?>
                </table>
            </td>
            <td width="3%"></td>
            <td width="22%">
                <table width="100%" class="table">
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
                    <tr >
                        <td ></td>
                        <td ></td>
                    </tr>
                    <tr>
                        <td><br><br></td>
                        <td></td>
                    </tr>
                    <tr>
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
                    <tr>
                        <td><br><br></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="border" width="60%">Total Pendapatan</td>
                        <td class="border" width="40%" >Rp. <?=$total;?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
</body>
</html>