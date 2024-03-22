    <?php

    class Transaksi_model{
        private $table = 'transaksi';
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // melihat semua data transaksi hari ini
        public function getAllTransaksiToday(){
            $today = date('Y-m-d');
            $this->db->query('SELECT ' . $this->table . '.*, operator.*, sift.*, device.* FROM ' . $this->table . ',operator,sift,device WHERE ' . $this->table . '.id_operator = operator.id_operator AND ' . $this->table . '.id_sift = sift.id_sift AND ' . $this->table . '.id_device = device.id_device AND DATE(' . $this->table . '.tanggal) = :today  AND '.$this->table.'.id_operator=:operator AND '.$this->table.'.id_sift=:sift ORDER BY id_' . $this->table.' DESC');
            $this->db->bind('today',$today);
            $this->db->bind('operator',$_SESSION['operator']);
            $this->db->bind('sift',$_SESSION['sift']);
            return $this->db->resultSet();
        }

        // melihat semua data transaksi
        public function getAllTransaksi(){

            $this->db->query('SELECT ' . $this->table . '.*, operator.*, sift.*, device.* FROM ' . $this->table . ',operator,sift,device WHERE ' . $this->table . '.id_operator = operator.id_operator AND ' . $this->table . '.id_sift = sift.id_sift AND ' . $this->table . '.id_device = device.id_device ORDER BY id_' . $this->table);
            return $this->db->resultSet();
        }

         //melihat detail data transaksi
        public function getTransaksi($id){
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_transaksi=:id');
            $this->db->bind('id', $id);
            return $this->db->single();
        }

        //mendapatkan data device
        private function getDevice($data){
            $this->db->query('SELECT * FROM device WHERE id_device=:id_device');
            $this->db->bind('id_device',$data);
            $this->db->execute();
            return $this->db->single();
        }

        //menghitung jam dan menit
        private function hitungJam($mulai,$selesai){

            // Konversi waktu ke dalam format yang bisa dihitung
            $timestampMulai = strtotime($mulai);
            $timestampSelesai = strtotime($selesai);

            if ($timestampSelesai < $timestampMulai) {
                // Tambah 24 jam ke waktu selesai
                $timestampSelesai += 24 * 60 * 60; // 24 jam dalam detik
            }

            // Hitung selisih waktu dalam detik
            $selisihDetik = $timestampSelesai - $timestampMulai;

            // Konversi selisih waktu ke dalam jam dan menit
            $selisihJam = floor($selisihDetik / (60 * 60)); // Mengonversi detik ke jam
            $selisihMenit = floor(($selisihDetik - ($selisihJam * 60 * 60)) / 60); // Sisa waktu dalam menit
            if($selisihMenit>=50){
                return $selisihJam+1;
            }elseif($selisihMenit>=20){
                return $selisihJam+0.5;
            }else{
                return $selisihJam;
            }
        }
        //menambahkan data transaksi
        public function createDataTransaksi($data){

            //tanggal
            $today = date('Y-m-d');

            // menentukan harga sewa device
            $sewaDevice = $this->getDevice($data['device']);

            //menentukan jam
            $jam = $this->hitungJam($data['mulai'],$data['selesai']);
        

            // jumlah harga device
            $hargaDevice = $sewaDevice['harga_perjam'] * $jam;

            //menghitung harga minuman
            $hargaMinum = ($data['tiga']*3000)+($data['empat']*4000);

            // total semua
            $total = $hargaDevice + $hargaMinum;

            // operator
            $operator = $_SESSION['operator'];

            //sift
            $sift = $_SESSION['sift'];

            //tambah waktu =0
            $tambahWaktu = 0;
            $tambah_harga = 0;

            $query = "INSERT INTO " . $this->table . " VALUES ('', :tanggal, :no_tv, :paket, :id_device, :jam_mulai, :jam_selesai, :tambah_waktu, :harga_device, :minuman_3k, :minuman_4k, :harga_minum, :total, :bayar, :keterangan, :id_sift, :id_operator, :tambah_harga)";
            $this->db->query($query);
            $this->db->bind('tanggal', $today);
            $this->db->bind('no_tv', $data['tv']);
            $this->db->bind('paket', $data['paket']);
            $this->db->bind('id_device', $data['device']);
            $this->db->bind('jam_mulai', $data['mulai']);
            $this->db->bind('jam_selesai', $data['selesai']);
            $this->db->bind('tambah_waktu', $tambahWaktu);
            $this->db->bind('harga_device', $hargaDevice);
            $this->db->bind('minuman_3k', $data['tiga']);
            $this->db->bind('minuman_4k', $data['empat']);
            $this->db->bind('harga_minum', $hargaMinum);
            $this->db->bind('total', $total);
            $this->db->bind('bayar', $data['bayar']);
            $this->db->bind('keterangan',$data['keterangan']);
            $this->db->bind('id_sift', $sift);
            $this->db->bind('id_operator', $operator);
            $this->db->bind('tambah_harga', $tambah_harga);

            $this->db->execute();
            return $this->db->rowCount();
        }

        // tambah jam dan minuman
        public function tambahJam($data){


            $dataTransaksi = $this->getTransaksi($data['id_transaksi']);
            $tambahJam = $dataTransaksi['tambah_waktu'] + $data['menit'];
            $minumTiga = $dataTransaksi['minuman_3k'] + $data['tiga'];
            $minumEmpat = $dataTransaksi['minuman_4k'] + $data['empat'];
            $hargaDevice = $dataTransaksi['harga_device'] + $data['harga'];



            $hargaMinum = ($minumTiga*3000)+($minumEmpat*4000);
            $total = $hargaDevice + $hargaMinum;
            $query = "UPDATE " . $this->table . " SET tambah_waktu=:tambah_waktu, harga_device=:harga_device, minuman_3k=:minuman_3k, minuman_4k=:minuman_4k, harga_minum=:harga_minum, total=:total,tambah_harga=:tambah_harga  WHERE id_transaksi=:id_transaksi";
            $this->db->query($query);
            $this->db->bind('id_transaksi', $data['id_transaksi']);
            $this->db->bind('tambah_waktu', $tambahJam);
            $this->db->bind('harga_device', $hargaDevice);
            $this->db->bind('harga_minum', $hargaMinum);
            $this->db->bind('minuman_3k', $minumTiga);
            $this->db->bind('minuman_4k', $minumEmpat);
            $this->db->bind('total', $total);
            $this->db->bind('tambah_harga', $data['tambah_harga']);

            $this->db->execute();
            return $this->db->rowCount();
        }

        // update data transaksi
        public function updateDataTransaksi($data){

            // menentukan harga sewa device
            $sewaDevice = $this->getDevice($data['device']);

            //menentukan jam
            $jam = $this->hitungJam($data['mulai'],$data['selesai']);


            // jumlah harga device
            $hargaDevice = ($sewaDevice['harga_perjam'] * $jam) + $data['tambah_harga'];

            //menghitung harga minuman
            $hargaMinum = ($data['tiga']*3000)+($data['empat']*4000);

            // total semua
            $total = $hargaDevice + $hargaMinum;

            
            $query = "UPDATE " . $this->table . " SET no_tv=:no_tv, paket=:paket, id_device=:id_device, jam_mulai=:jam_mulai, jam_selesai=:jam_selesai, tambah_waktu=:tambah_waktu, harga_device=:harga_device, minuman_3k=:minuman_3k, minuman_4k=:minuman_4k, harga_minum=:harga_minum, total=:total, bayar=:bayar, keterangan=:keterangan, id_operator=:id_operator, id_sift=:id_sift, tambah_harga=:tambah_harga WHERE transaksi.id_transaksi=:id_transaksi";
            $this->db->query($query);
            $this->db->bind('id_transaksi', $data['id_transaksi']);
            $this->db->bind('no_tv', $data['tv']);
            $this->db->bind('paket', $data['paket']);
            $this->db->bind('id_device', $data['device']);
            $this->db->bind('jam_mulai', $data['mulai']);
            $this->db->bind('jam_selesai', $data['selesai']);
            $this->db->bind('tambah_waktu', $data['menit']);
            $this->db->bind('harga_device', $hargaDevice);
            $this->db->bind('harga_minum', $hargaMinum);
            $this->db->bind('minuman_3k', $data['tiga']);
            $this->db->bind('minuman_4k', $data['empat']);
            $this->db->bind('total', $total);
            $this->db->bind('bayar', $data['bayar']);
            $this->db->bind('keterangan', $data['keterangan']);
            $this->db->bind('id_operator', $data['operator']);
            $this->db->bind('id_sift', $data['sift']);
            $this->db->bind('tambah_harga', $data['tambah_harga']);

            $this->db->execute();
            return $this->db->rowCount();
        }

        // mencari transaksi
        public function cariTransaksi($data){
            $this->db->query('SELECT ' . $this->table . '.*, operator.*, sift.*, device.* FROM ' . $this->table . ',operator,sift,device WHERE ' . $this->table . '.id_operator = operator.id_operator AND ' . $this->table . '.id_sift = sift.id_sift AND ' . $this->table . '.id_device = device.id_device AND '.$this->table.'.id_operator=:operator AND '.$this->table.'.id_sift=:sift AND '.$this->table.'.tanggal BETWEEN :awal AND :akhir ORDER BY id_' . $this->table.' DESC');
            $this->db->bind('operator',$data['operator']);
            $this->db->bind('sift',$data['sift']);
            $this->db->bind('awal',$data['awal']);
            $this->db->bind('akhir',$data['akhir']);
            return $this->db->resultSet();
        }

        //menghapus data transaksi
        public function deleteDataTransaksi($id){
            $query = "DELETE FROM " . $this->table . " WHERE id_transaksi=:id";
            $this->db->query($query);
            $this->db->bind('id',$id);

            $this->db->execute();
            return $this->db->rowCount();
        }

    }

    ?>