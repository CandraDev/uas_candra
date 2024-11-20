<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian - Candra Setiawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto">


        <div class="d-flex align-items-center justify-content-center">
            <img src="img/yayasan.png" alt="Yayasan Assalaam Bandung">
        </div>

        <div class="text-center mb-5">
            <h1 class="h2">PENGGAJIHAN <br> GURU KARYAWAN YAYASAN ASSALAAM</h1>
        </div>

        <section class="container my-5">
            <form action="" method="post">
                <div class="card mx-auto w-75">
                    <div class="card-header">
                        Data Penggajihan
                    </div>
                    <div class="card-body">
                        <div class="m-1 mb-3">
                            <label for="no" class="form-label ">No</label>
                            <input type="number" id="no" name="no" class="form-control" placeholder="No">
                        </div>
                        <div class="m-1 mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="m-1 mb-3">
                            <label for="unit_pendidikan" class="form-label">Unit Pendidikan</label>
                            <select class="form-select" name="unit_pendidikan">
                                <option disabled selected>Pilih Unit Pendidikan</option>
                                <option value="TK">TK</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                                <option value="PPTQ">PPTQ</option>
                            </select>
                        </div>
                        <div class="m-1 mb-3">
                            <label for="tgl_gaji" class="form-label">Tanggal Gaji</label>
                            <input type="date" name="tgl_gaji" id="tgl_gaji" class="form-control">
                        </div>

                        <div class="row mx-auto">
                            <div class="col-md-6 my-4">
                                <h3 class="text-center mb-3">Gaji</h3>
                                <div class="m-1 mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <select class="form-select" name="jabatan">
                                        <option disabled selected>Pilih Jabatan</option>
                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                        <option value="Wakasek">Wakasek</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Karyawan">Karyawan</option>
                                    </select>
                                </div>
                                <div class="m-1 mb-3">
                                    <label for="lama_kerja" class="form-label">Lama Kerja</label>
                                    <input type="number" name="lama_kerja" id="lama_kerja" class="form-control"
                                        placeholder="Lama Kerja">
                                </div>
                                <div class="m-1 mb-3">
                                    <label for="status_kerja" class="form-label">Status Kerja</label>
                                    <select class="form-select" name="status_kerja">
                                        <option disabled selected>Pilih Status</option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Tetap">Tetap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 my-4">
                                <h3 class="text-center mb-3">Potongan</h3>
                                <div class="m-1 mb-3">
                                    <label for="bpjs" class="form-label ">BPJS</label>
                                    <input type="number" id="bpjs" name="bpjs" class="form-control" placeholder="BPJS"
                                        min="0">
                                </div>
                                <div class="m-1 mb-3">
                                    <label for="pinjaman" class="form-label ">Pinjaman</label>
                                    <input type="number" id="pinjaman" name="pinjaman" class="form-control"
                                        placeholder="Pinjaman" min="0">
                                </div>
                                <div class="m-1 mb-3">
                                    <label for="tabungan" class="form-label ">Cicilan</label>
                                    <input type="number" id="tabungan" name="cicilan" class="form-control"
                                        placeholder="Cicilan" min="0">
                                </div>
                                <div class="m-1 mb-3">
                                    <label for="infaq" class="form-label ">Infaq</label>
                                    <input type="number" id="infaq" name="infaq" class="form-control"
                                        placeholder="Lainnya" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" name="submit" class="btn btn-primary">Proses</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <?php

        require 'class/loadClass.php';

        if (isset($_POST['submit'])) :
            $karyawan = new Karyawan($_POST['no'], $_POST['nama'], $_POST['unit_pendidikan'], $_POST['jabatan'], $_POST['lama_kerja'], $_POST['status_kerja']);
            $karyawan->hasGaji($_POST['bpjs'], $_POST['tgl_gaji'], $_POST['pinjaman'], $_POST['cicilan'], $_POST['infaq']);
        ?>

        <section class="container my-5">
            <div class="card w-50 mx-auto border border-primary border-2">
                <div class="card-header h5 fw-bold text-center">
                    <?= $karyawan->getData('nama'); ?>
                </div>
                <div class="card-body mx-5 text-primary">
                    <h5 class="text-center fw-semibold">STRUK GAJI</h5>
                    <table class="w-75 mx-auto">
                        <tr>
                            <td>No</td>
                            <td>: <?= $karyawan->getData('no'); ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: <?= $karyawan->getData('nama'); ?></td>
                        </tr>
                        <tr>
                            <td>Unit Pendidikan</td>
                            <td>: <?= $karyawan->getData('unitPendidikan'); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Gaji</td>
                            <td>: <?= date_format($karyawan->getData('tglGaji'), "j F Y") ?></td>
                        </tr>
                        <tr>
                            <td>Lama Kerja</td>
                            <td>: <?= $karyawan->getData('lamaKerja'); ?></td>
                        </tr>
                        <tr>
                            <td>Status Kerja</td>
                            <td>: <?= $karyawan->getData('statusKerja'); ?></td>
                        </tr>
                        <tr>
                            <td>Bonus</td>
                            <td>: <?= Utilities::toRupiah($karyawan->getData('bonus')); ?></td>
                        </tr>
                        <tr>
                            <td>BPJS</td>
                            <td>: <?= Utilities::toRupiah($karyawan->getData('bpjs')); ?></td>
                        </tr>
                        <tr>
                            <td>Pinjaman</td>
                            <td>: <?= Utilities::toRupiah($karyawan->getData('pinjaman')); ?></td>
                        </tr>
                        <tr>
                            <td>Cicilan</td>
                            <td>: <?= Utilities::toRupiah($karyawan->getData('cicilan')); ?></td>
                        </tr>
                        <tr>
                            <td>Infaq</td>
                            <td>: <?= Utilities::toRupiah($karyawan->getData('infaq')); ?></td>
                        </tr>
                        <tr>
                            <td>Gaji Bersih</td>
                            <td>: <?= Utilities::toRupiah($karyawan->getData('gajiBersih')); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <?php endif; ?>
    </div>
</body>

</html>