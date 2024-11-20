<?php

require 'GajiKaryawanTrait.php';

class Karyawan extends Utilities
{
    use GajiKaryawan;

    protected
        $no, $nama, $unitPendidikan, $jabatan, $lamaKerja, $statusKerja;


    public function __construct($no, $nama, $unitPendidikan, $jabatan,  $lamaKerja, $statusKerja)
    {
        $this->no = $no;
        $this->nama = $nama;
        $this->unitPendidikan = $unitPendidikan;
        $this->jabatan = $jabatan;
        $this->lamaKerja = $lamaKerja;
        $this->statusKerja = $statusKerja;
    }
}
