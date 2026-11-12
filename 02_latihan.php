<?php

function hitungTotalBelanja(array $items, float $diskon = 0): float
{
    $subtotal = array_sum($items);
    $potongan = $subtotal * ($diskon / 100);
    return $subtotal - $potongan;
}

$totalBelanja = hitungTotalBelanja(
    diskon: 15,
    items: [50000, 120000, 30000]
);

function cariSiswaTertinggi(array $data): ?string
{
    if (empty($data)) {
        return null;
    }

    $nilaiTertinggi = max($data);
    return array_search($nilaiTertinggi, $data, true);
}

function buatLaporanNilai(array $data): array
{
    if (empty($data)) {
        return [
            'rata_rata' => 0,
            'tertinggi' => null,
            'jumlah_di_atas_rata_rata' => 0,
        ];
    }

    $rataRata = array_sum($data) / count($data);
    $diAtasRataRata = count(array_filter($data, fn($nilai) => $nilai > $rataRata));

    return [
        'rata_rata' => $rataRata,
        'tertinggi' => cariSiswaTertinggi($data),
        'jumlah_di_atas_rata_rata' => $diAtasRataRata,
    ];
}

$dataNilai = [
    'Andi' => 80,
    'Budi' => 92,
    'Citra' => 75,
    'Dedi' => 88,
];

echo "Total Belanja: Rp " . number_format($totalBelanja, 0, ',', '.') . PHP_EOL;
echo "Siswa Tertinggi: " . cariSiswaTertinggi($dataNilai) . PHP_EOL;
print_r(buatLaporanNilai($dataNilai));