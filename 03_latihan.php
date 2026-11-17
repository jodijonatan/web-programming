
<?php

// 1. Membuat class Buku
class Buku {
    public $judul;
    public $penulis;
    public $stok;

    // 2. Constructor
    public function __construct($judul, $penulis, $stok) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->stok = $stok;
    }

    // Method infoBuku()
    public function infoBuku() {
        return "Judul: " . $this->judul .
               " | Penulis: " . $this->penulis .
               " | Stok: " . $this->stok;
    }

    // 4. Method kurangiStok()
    public function kurangiStok($jumlah) {
        if ($jumlah > $this->stok) {
            return "Stok tidak cukup";
        } else {
            $this->stok -= $jumlah;
            return "Stok berhasil dikurangi. Sisa stok: " . $this->stok;
        }
    }
}

// 3. Membuat 3 object Buku
$buku1 = new Buku("Laskar Pelangi", "Andrea Hirata", 10);
$buku2 = new Buku("Bumi", "Tere Liye", 15);
$buku3 = new Buku("Negeri 5 Menara", "Ahmad Fuadi", 8);

// Menyimpan object ke dalam array
$daftarBuku = [$buku1, $buku2, $buku3];

// Menampilkan informasi buku menggunakan foreach
echo "<h2>Daftar Buku</h2>";

foreach ($daftarBuku as $buku) {
    echo $buku->infoBuku() . "<br>";
}

// Mengurangi stok buku
echo "<h2>Pengurangan Stok</h2>";

echo $buku1->kurangiStok(3) . "<br>";
echo $buku2->kurangiStok(20) . "<br>";

?>
