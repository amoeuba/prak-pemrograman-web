<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Route Tugas Modul 2
Route::get('/latihan-php', function (Request $request) {
    $nama = 'Gelia Rahma Nur Minda';
    
    // Parameter pengujian mode: ?mode=perbaikan untuk kondisi tidak lulus
    $mode = $request->query('mode', 'lulus');

    if ($mode === 'perbaikan') {
        // Data Uji 2: 5 Nilai menghasilkan rata-rata < 75 (Perlu Perbaikan)
        // (60 + 70 + 65 + 75 + 68) / 5 = 338 / 5 = 67.60
        $nilai = [60, 70, 65, 75, 68];
    } else {
        // Data Uji 1: 5 Nilai menghasilkan rata-rata >= 75 (Lulus)
        // (85 + 80 + 90 + 78 + 88) / 5 = 421 / 5 = 84.20
        $nilai = [85, 80, 90, 78, 88];
    }

    // Anonymous function hitung rata-rata
    $hitungRataRata = function (array $data): float {
        $total = 0;
        foreach ($data as $angka) {
            $total += $angka;
        }
        return $total / count($data);
    };

    $rataRata = $hitungRataRata($nilai);

    if ($rataRata >= 75) {
        $status = 'Lulus';
    } else {
        $status = 'Perlu Perbaikan';
    }

    return view('latihan-php', compact(
        'nama', 'nilai', 'rataRata', 'status'
    ));
});