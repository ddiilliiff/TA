<?php

namespace App\Helpers;

class MyHelper
{
    public static function formatTanggalIndonesia($tanggal)
    {
        $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember',
        ];

        // Memisahkan tanggal, bulan, dan tahun
        $pecahTanggal = explode('-', $tanggal);
        $tahun = $pecahTanggal[0];
        $bulanAngka = (int) $pecahTanggal[1];
        $hariAngka = (int) $pecahTanggal[2];

        $namaHari = $hari[date('w', strtotime($tanggal))]; // Mengambil nama hari
        $namaBulan = $bulan[$bulanAngka]; // Mengambil nama bulan

        // Menggabungkan hasil menjadi format tanggal Indonesia
        $tanggalIndonesia = $namaHari.', '.$hariAngka.' '.$namaBulan.' '.$tahun;

        return $tanggalIndonesia;
    }

    // public static function formatWit($time)
    // {
    //     $datetime = \DateTime::createFromFormat('H:i', $time);

    //     return $datetime->format('H.i');
    // }

    public static function formatWit($time)
    {
        $datetime = new \DateTime($time);

        return $datetime->format('H:i').' WIT';
    }

    public static function splitIdNameEmail($input)
    {
        $result = [];

        $parts = explode('-', $input);

        if (count($parts) === 3) {
            $result['id'] = trim($parts[0]);
            $result['name'] = trim($parts[1]);
            $email = trim($parts[2]);

            // Cek apakah email valid
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $result['email'] = $email;
            } else {
                $result['email'] = '';
            }
        } else {
            $result['id'] = $input;
            $result['name'] = '';
            $result['email'] = '';
        }

        return $result;
    }

    public static function splitIdAndName($input)
    {
        $result = [];

        $parts = explode('-', $input);

        if (count($parts) === 2) {
            $result['id'] = trim($parts[0]);
            $result['nama'] = trim($parts[1]);
        } else {
            $result['id'] = $input;
            $result['nama'] = '';
        }

        return $result;
    }

    public static function formatTanggal($date)
    {
        $timestamp = strtotime($date);

        return date('d M Y', $timestamp);
    }
}
