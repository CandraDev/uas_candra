<?php

trait GajiKaryawan
{
    protected $gaji, $tglGaji, $bonus, $bpjs, $pinjaman, $cicilan, $infaq, $gajiBersih;

    public function hasGaji($bpjs, $tglGaji, $pinjaman, $cicilan, $infaq)
    {
        $this->gaji = $this->hitungGaji();
        $this->tglGaji = new DateTime($tglGaji);
        $this->bpjs = $bpjs;
        $this->pinjaman = $pinjaman;
        $this->cicilan = $cicilan;
        $this->infaq = $infaq;
        $this->bonus = $this->hitungBonus();
        $this->gajiBersih = $this->hitungBersih();
    }

    protected function hitungGaji()
    {
        switch ($this->jabatan) {
            case 'Kepala Sekolah':
                return $this->gaji = 10000000;
                break;
            case 'Wakasek':
                return $this->gaji = 7000000;
                break;
            case 'Guru':
                return $this->gaji = 5000000;
                break;
            case 'Karyawan':
                return $this->gaji = 2500000;
                break;
        }
    }

    protected function hitungBonus()
    {
        switch ($this->statusKerja) {
            case 'Tetap':
                return $this->bonus = 1000000;
                break;

            default:
                return $this->bonus = 0;
                break;
        }
    }

    public function hitungBersih()
    {

        $gajiKotor = $this->gaji + $this->bonus;
        $potongan = $this->bpjs + $this->pinjaman + $this->cicilan + $this->infaq;

        $gajiBersih = $gajiKotor - $potongan;

        return $gajiBersih;
    }
}
