@extends('layouts.main')

@section('container')   

    @if (session()->has('faileddownload'))
        <?= session('faileddownload') ?>
    @elseif(session()->has('success'))
        <?= session('success') ?>    
    @elseif(session()->has('danger'))
        {{ session('danger') }}
    @else

    @endif

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="information">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h3 class="mt-4 text-center">Download Form Pengunduran Diri </h3>                   
                    <div class="card p-1">
                        <form action="/pages/resignpdf" method="POST">
                        @csrf
                        <div class="mb-3 text-start text-center mt-2" style="padding-left:10px; padding-right:10px;">
                            <label for="nik" class="form-label">NIK (Nomor Induk Karyawan) / Nomor ID CARD</label>
                            <input type="text" class="form-control" name="number_of_employees" id="number_of_employees" value="" placeholder="22050xxxxx" required>
                        </div>
                        <div class="mb-3 text-center" style="padding-left:10px; padding-right:10px;">
                            <button class="btn btn-success" ><i class="fas fa-download"></i> Download Form Pengunduran diri</button> 
                        </div>
                        <a href="#formonline">
                            <p style="text-align:center;">Jika belum mengajukan Silahkan isi form di bawah ini.</p>
                        </a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="formonline">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h5 class="page-section-heading text-center text-uppercase text-secondary mb-0">FORM RESIGN ONLINE</h5>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->

                        1. Peringatan Form Pelayanan Pengajuan Resign ini hanya di peruntukkan untuk karyawan HWI yang
                        ingin berhenti bekerja dengan PT HWI <br>
                        2. Jika anda mengajukan resign maka sistem akan memproses pengajuan resign anda. <br>
                        3. Setelah anda mengajukan resign maka surat kerangan resign anda akan di layani satu bulan dari
                        anda mengajukan resign <br>
                        3. Jika anda ingin membatalkan pengajuan resign yang telah dikirim maka anda harus konfirmasi ke
                        HRD sebelum Surat Keterangan resign anda si proses<br>

                        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="mt-4">FORM PENGUNDURAN DIRI  
                    </h3>                   
                    <div class="card p-1">

                        <div class="mb-3 text-start">
                            <label for="nik" class="form-label">NIK (Nomor Induk Karyawan / Nomor ID CARD) </label>
                            <input type="number" class="form-control" id="resignnik" value="" onkeyup="Checkkeynik();" onkeydown="Checkkeynik();" placeholder="22050xxxxx : WAJIB DI ISI" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="noktp">No KTP</label>
                            <input type="number" class="form-control" id="resignktp" value="" onkeyup="Checkkeyktp();" onkeydown="Checkkeyktp();" maxlength="20" placeholder="333453xxxxxx : WAJIB DI ISI" required>
                        </div>                        
                        <div class="mb-3 text-start" >
                            <span>Isi NIK dan Nomer KTP lalu tekan tombol cek untuk check data karyawan !!!</span>
                            <br>
                            <button class="btn btn-primary" id="checkemployee" onClick="ResignCheck();" ><i class="fas fa-spinner"></i> Cek</button> 
                            <div class="spinner-border" id="spinner" role="status" style="display:none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <form action="/pages/resign" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="nik" class="form-control d-none" id="valuenik" value="" required>
                        <input type="number" name="ktp" class="form-control d-none" id="valuektp" value="" required>
                 
                        <div class="mb-3 text-start " id="checkname" style="display:none;">
                            <label for="name" class="form-label">NAMA </label>
                            <input type="text" class="form-control" name="name" id="name" value="" required readonly>
                        </div>
                        <div class="mb-3 text-start" id="job_levelxl" style="display:none;">
                            <label for="noktp">Jabatan Terakhir</label>
                            <input type="text" class="form-control" id="job_levelx"  readonly />
                            <input type="hidden" class="form-control" name="jabatan" id="job_level" value="" required />
                        </div>
                        <div class="mb-3 text-start" id="departmentxl" style="display:none;">
                            <label for="noktp">Department Terakhir</label>
                            <input type="text" class="form-control" id="departmentx"  readonly />
                            <input type="hidden" class="form-control" name="department" id="department" value="" required />
                        </div>
                        <div class="mb-3 text-start" id="checkdisplay" style="display:none;">
                            <label for="nik" class="form-label">Tanggal Permohonan Resign</label>
                            <input type="text" name="status" style="display:none;" id="status_employee" value="" required />
                            <input type="date" name="dateresign" class="form-control" id="dateresign" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" required />
                        </div> 

                        <div class="mb-3 text-start">
                            <label for="noktp">Gedung</label>
                            <select class="form-select" aria-label="Default select example" name="gedung" required>
                                <?php 
                                    $building = [                                        
                                            "GEDUNG A", "GEDUNG B", "GEDUNG C", "GEDUNG D", "GEDUNG E", "GEDUNG F", "GEDUNG G", "GEDUNG H", "LAMINATING", "GUDANG SETTING", "WAREHOUSE (MATERIAL)", "SABLON", "EMBOSS", "TRAINING CENTER", "MAIN OFFICE", "EPTE (BEACUKAI)", "POS SECURITY", "KANTOR SERIKAT", "MESS / DRIVER"
                                    ];
                                ?>
                                <?php foreach ($building as $build) { ?>
                                    <option value="<?= $build ?>"><?= $build ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="noktp">Alasan Pengunduran Diri</label>
                            <select class="form-select" name="alasanresign" aria-label="Default select example" id="alasanresign" required>
                                <option value="Beban Kerja">Beban Kerja</option>
                                <option value="Pimpinan">Pimpinan</option>
                                <option value="Rekan Kerja">Rekan Kerja</option>
                                <option value="Gaji">Gaji</option>
                                <option value="Jarak">Jarak</option>
                                <option value="Kesehatan/hamil/promil">Kesehatan/hamil/promil</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Pekerjaan baru/wirausaha">Pekerjaan baru/wirausaha</option>
                                <option value="Keluarga/menikah">Keluarga/menikah</option>
                            </select>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nik" class="form-label">Detail Alasan Resign</label>
                            <textarea class="form-control" name="alasantambahan" id="alasantambahan" placeholder="Alasan tambahan anda ingin resign " required></textarea>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nik" class="form-label">Saran untuk perusahaan</label>
                            <textarea class="form-control" name="saran" id="saran" placeholder="Saran anda kepada perusahaan" required></textarea>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nik" class="form-label">Alamat</label>
                            <textarea class="form-control" name="address" id="address" placeholder="Alamat Tinggal Karyawan" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="mt-4">FORM EXIT KUESIONER</h3>
                    <?php $kuesioners = [
                        1 => 'Saya terampil menyelesaikan target pekerjaan',
                        2 => 'Atasan menggunakan kata-kata/sikap yang wajar dalam bekerja',
                        3 => 'Rekan kerja saya membantu kesulitan saya dalam menyelesaikan pekerjaan',
                        4 => 'Jarak perusahaan dengan tempat tinggal tidak menjadi masalah bagi saya',
                        5 => 'Jam kerja (termasuk shift malam) tidak masalah bagi saya',
                        6 => 'Saya berkeinginan kembali ke perusahaan (PT HWI) suatu saat nanti',
                        7 => 'Keluarga (termasuk menikah, mengurus keluarga) bukanlah alasan bagi saya untuk meninggalkan perusahaan ini',
                    ]; ?>

                    <?php
                    $no = 1;
                    foreach ($kuesioners as $key => $kuesioner) { ?>
                    <div class="card p-1 mb-3">
                        <table>
                            <tr>
                                <td valign="top"><?= $key ?></td>
                                <td><?= $kuesioner ?> </td>
                            </tr>
                        </table>
                        <table class="mb-3">
                            <tr >
                                <td></td>
                                <td>&nbsp;&nbsp;1</td>
                                <td>&nbsp;&nbsp;2</td>
                                <td>&nbsp;&nbsp;3</td>
                                <td>&nbsp;&nbsp;4</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;Sangat Tidak Sesuai</td>
                                <td>
                                    <label class="containerkuesioner">
                                        <input type="radio" name="kuesioner<?= $key ?>" value="1" required="required">
                                        <span class="checkmarkkuesioner"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="containerkuesioner">
                                        <input type="radio" name="kuesioner<?= $key ?>" value="2" required="required">
                                        <span class="checkmarkkuesioner"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="containerkuesioner">
                                        <input type="radio" name="kuesioner<?= $key ?>" value="3" required="required">
                                        <span class="checkmarkkuesioner"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="containerkuesioner">
                                        <input type="radio" name="kuesioner<?= $key ?>" value="4" required="required">
                                        <span class="checkmarkkuesioner"></span>
                                    </label>
                                </td>
                                <td>Sangat sesuai</td>
                            </tr>
                        </table>
                    </div>
                    <?php }
                    ?>
                </div>
                <button class="btn btn-primary mt-4" type="submit" >AJUKAN PROSES RESIGN</button>
                </form>

                <div class="col-md-12 mt-3">
                    <div class="d-grid gap-2 col-6 mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection