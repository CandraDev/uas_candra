<?php

class Utilities
{
    function getData($data)
    {
        if (property_exists($this, $data)) {
            return $this->$data;
        } else {
            return NULL; // Mengembalikan NULL jika properti tidak ditemukan
        }
    }

    public static function toRupiah($angka)
    {

        $hasil = "Rp " . number_format($angka, 0, '', '.');
        return $hasil;
    }
}
