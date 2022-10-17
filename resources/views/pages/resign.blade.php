@extends('layouts.main')

@section('container')   
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
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

                    <h3 class="mt-4">FORM PENGUNDURAN DIRI  <button class="btn btn-primary" id="checkemployee" onClick="ResignCheck();" ><i class="fas fa-rotation"></i> Cek</button> 
                    
                    <div class="spinner-border" id="spinner" role="status" style="display:none;">
                        <span class="sr-only">Loading...</span>
                    </div>

                </h3>                   
                    <div class="card p-1">
                        <form action="/pages/resign" method="POST">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="nik" class="form-label">NIK (Nomor Induk Karyawan) </label>
                            <input type="number" class="form-control" name="nik" id="resignnik" value="2203051857" placeholder="22050xxxxx" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="noktp">No KTP</label>
                            <input type="number" class="form-control" name="ktp" id="resignktp" value="3319060201990005" maxlength="20" placeholder="333453xxxxxx" required>
                        </div>
                        
                        <div class="mb-3 text-start" id="checkname" style="display:none;">
                            <label for="name" class="form-label">NAMA </label>
                            <input type="text" class="form-control" name="name" id="name" value="" required readonly>
                        </div>
                        <div class="mb-3 text-start" id="checkdisplay" style="display:none;">
                            <label for="nik" class="form-label">Tanggal Permohonan Resign</label>
                            <input type="text" name="status" style="display:none;" id="status_employee" value="" required />
                            <input type="date" name="dateresign" class="form-control" id="dateresign" min="<?= date("Y-m-d") ?>" value="<?= date("Y-m-d") ?>" required />
                        </div> 
                        <div class="mb-3 text-start">
                            <label for="noktp">Jabatan Terakhir</label>
                            <select class="form-select" aria-label="Default select example" name="jabatan" required>
                                <?php 
                                    foreach($jobs as $job){ ?>
                                        <option value="<?= $job['job_level'] ?>"><?= $job['job_level'] ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="noktp">Department Terakhir</label>
                            <select class="form-select" aria-label="Default select example" name="department" required>
                                <?php 
                                    foreach($departments as $department){ ?>
                                        <option value="<?= $department['department'] ?>"><?= $department['department'] ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="noktp">Gedung</label>
                            <select class="form-select" aria-label="Default select example" name="gedung" required>
                                <?php 
                                foreach($buildings as $building){ ?>
                                    <option value="<?= $building ?>"><?= $building ?></option>
                                <?php
                                }
                                ?>
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
                            <textarea class="form-control" name="saran" id="saran" placeholder="Saran anda kepada perusahaan " required></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="mt-4">FORM EXIT KUESIONER</h3>

                    <?php 
                        $kuesioners = [
                           1 => "Saya terampil menyelesaikan target pekerjaan",
                           2 => "Atasan menggunakan kata-kata/sikap yang wajar dalam bekerja",
                           3 => "Rekan kerja saya membantu kesulitan saya dalam menyelesaikan pekerjaan",
                           4 => "Jarak perusahaan dengan tempat tinggal tidak menjadi masalah bagi saya",
                           5 => "Jam kerja (termasuk shift malam) tidak masalah bagi saya",
                           6 => "Saya berkeinginan kembali ke perusahaan (PT HWI) suatu saat nanti",
                           7 => "Keluarga (termasuk menikah, mengurus keluarga) bukanlah alasan bagi saya untuk meninggalkan perusahaan ini"
                        ];
                    ?>

                    <?php 
                    $no = 1;
                    foreach($kuesioners as $key => $kuesioner){
                    ?>
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
                    <?php
                    }
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
    <!-- About Section-->
    <section class="page-section text-white mb-0" id="about" style="background-color: rgb(50, 102, 199);">
        <div class="container" style="background-color: rgb(50, 102, 199);">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download
                        includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS
                        stylesheets for easy customization.</p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p class="lead">You can create your own custom avatar for the masthead, change the icon in the
                        dividers, and add your email address to the contact form to make it fully functional!</p>
                </div>
            </div>
            <!-- About Section Button-->
            <!-- <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                        <i class="fas fa-download me-2"></i>
                        Free Download!
                    </a>
                </div> -->
        </div>
    </section>
@endsection