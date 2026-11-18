<?php

class Siswa {
    private string $nama;
    private string $nis;
    private array $nilai;

    public function __construct(string $nama, string $nis, array $nilai) {
        $this->nama = $nama;
        $this->nis = $nis;
        $this->nilai = $nilai;
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function getNis(): string {
        return $this->nis;
    }

    public function hitungRataRata(): float {
        if (empty($this->nilai)) {
            return 0.0;
        }
        return array_sum($this->nilai) / count($this->nilai);
    }

    public function getPredikat(): string {
        $rataRata = $this->hitungRataRata();
        
        if ($rataRata >= 85) {
            return "A";
        } elseif ($rataRata >= 75) {
            return "B";
        } elseif ($rataRata >= 60) {
            return "C";
        } else {
            return "D";
        }
    }
}

function cariSiswaTerbaik(array $daftarSiswa): ?Siswa {
    if (empty($daftarSiswa)) {
        return null;
    }

    $siswaTerbaik = $daftarSiswa[0];
    $rataTertinggi = $siswaTerbaik->hitungRataRata();

    foreach ($daftarSiswa as $siswa) {
        $rataRata = $siswa->hitungRataRata();
        if ($rataRata > $rataTertinggi) {
            $rataTertinggi = $rataRata;
            $siswaTerbaik = $siswa;
        }
    }

    return $siswaTerbaik;
}

// Inisialisasi 5 object Siswa
$daftarSiswa = [
    new Siswa("Ahmad Fauzi", "101", [85, 90, 88]),
    new Siswa("Siti Aminah", "102", [75, 80, 78]),
    new Siswa("Budi Santoso", "103", [92, 95, 90]),
    new Siswa("Dewi Lestari", "104", [65, 70, 68]),
    new Siswa("Eko Prasetyo", "105", [80, 82, 85])
];

// Menampilkan seluruh data siswa beserta predikatnya
echo "=== DAFTAR NILAI SISWA ===\n";
foreach ($daftarSiswa as $index => $siswa) {
    echo ($index + 1) . ". NIS: " . $siswa->getNis() . 
         " | Nama: " . str_pad($siswa->getNama(), 15) . 
         " | Rata-rata: " . number_format($siswa->hitungRataRata(), 2) . 
         " | Predikat: " . $siswa->getPredikat() . "\n";
}

// Menampilkan siswa terbaik
$terbaik = cariSiswaTerbaik($daftarSiswa);
if ($terbaik) {
    echo "\n=== SISWA TERBAIK ===\n";
    echo "Nama      : " . $terbaik->getNama() . "\n";
    echo "NIS       : " . $terbaik->getNis() . "\n";
    echo "Rata-rata : " . number_format($terbaik->hitungRataRata(), 2) . "\n";
    echo "Predikat  : " . $terbaik->getPredikat() . "\n";
}

?>
