<?php

function hitungKeliling($panjang, $lebar) {
    return 2 * ($panjang + $lebar);
}

function isGenap($angka) {
    return $angka % 2 === 0;
}

function validasiUmur($umur) {
    if ($umur < 12) {
        return "Anak-anak";
    } elseif ($umur <= 18) {
        return "Remaja";
    } else {
        return "Dewasa";
    }
}


// Parameter adalah variabel yang didefinisikan di dalam deklarasi fungsi sebagai wadah penampung data,
// sedangkan argumen adalah nilai nyata yang dikirimkan saat fungsi tersebut dipanggil.
// Singkatnya, parameter bersifat teoretis pada cetak biru fungsi, sementara argumen adalah data aktual yang dieksekusi.