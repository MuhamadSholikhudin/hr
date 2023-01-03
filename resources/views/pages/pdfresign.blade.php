<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $resignation_submissions->number_of_employees ?> Formulir Pengunduran Diri </title>
    <style>
        
        body{
            margin: 0%;
            padding: 0%;
        }
        .logotable,
        .logotd,
        .logoth {
            border: 1px solid;
            margin: 0%;
            padding: 0%;
        }

        .logotable {
            /* width: 100%; */
            border-collapse: collapse;
        }

        .main {
            display: flex;
            flex-direction: row;
            /* font-size: 30px; */
            /* color: green; */
            /* border: 4px solid black; */
            /* padding: 5px; */
            /* width: 400px; */
        }
  
        /* .main div {
            border: 2px solid red;
            margin: 10px 20px;
            width: 100px;
        } */

        .diagonalCross2 {
            background: linear-gradient(to bottom right, #fff calc(50% - 1px), black , #fff calc(50% + 1px) )
        }

        .signtop{
            border: 1px solid black;
            /* width: 80px; */
        }

        .signtopth {
            border: 1px solid black;
            width: 70px;
        }

        .signtoptd{
            height: 50px;
            margin:0%;
            border: 1px solid black;
        }
        .signtopthbtm{
            width: 100px;
            /* font-size:10px; */
            border: 1px solid black;
        }
        .signhrd{
            font-size: 100px;
        }
        .alignleft{
            text-align: left;
        }
        
    </style>
</head>

<?php
    function YmdHistoYmd($date, $format){
        $output = date($format, strtotime($date));
        return $output;
    }

    function Dateplus($date_plus, $plus, $format){
        $date = new \DateTime($date_plus);
        $plus_day = '+'.$plus.' day';
        $date->modify($plus_day);
        return $date->format($format);
    }

    function DateSign($date, $day_cek){
        $date_sign = new \DateTime($date.' 00:00:00');
        $date_year_sp = date_format($date_sign, "Y"); //for Display Year
        $date_month_sp =  date_format($date_sign, "m"); //for Display Month
        $date_day_sp = date_format($date_sign, "d"); //for Display Date
    
        $day_sp = gmdate("l", mktime(0,0,0, $date_month_sp, $date_day_sp, $date_year_sp));

            //Bulan Indonesia
        if($date_month_sp == '01'){
            $month_indo_sp = 'Januari';
        }elseif($date_month_sp == '02'){
            $month_indo_sp = 'Februari';            
        }elseif($date_month_sp == '03'){
            $month_indo_sp = 'Maret';            
        }elseif($date_month_sp == '04'){
            $month_indo_sp = 'April';            
        }elseif($date_month_sp == '05'){
            $month_indo_sp = 'Mei';            
        }elseif($date_month_sp == '06'){
            $month_indo_sp = 'Juni';            
        }elseif($date_month_sp == '07'){
            $month_indo_sp = 'Juli';            
        }elseif($date_month_sp == '08'){
            $month_indo_sp = 'Agustus';            
        }elseif($date_month_sp == '09'){
            $month_indo_sp = 'September';            
        }elseif($date_month_sp == '10'){
            $month_indo_sp = 'Oktober';            
        }elseif($date_month_sp == '11'){
            $month_indo_sp = 'November';            
        }elseif($date_month_sp == '12'){
            $month_indo_sp = 'Desember';            
        }

        // Hari Indonesia
        if($day_sp == 'Monday'){
            $day_indo_sp = 'Senin';
        }elseif($day_sp == 'Tuesday'){
            $day_indo_sp = 'Selasa';            
        }elseif($day_sp == 'Wednesday'){
            $day_indo_sp = 'Rabu';            
        }elseif($day_sp == 'Thursday'){
            $day_indo_sp = 'Kamis';            
        }elseif($day_sp == 'Friday'){
            $day_indo_sp = 'Jumat';            
        }elseif($day_sp == 'Saturday'){
            $day_indo_sp = 'Sabtu';            
        }elseif($day_sp == 'Sunday'){
            $day_indo_sp = 'Minggu';            
        }

        if($day_cek == true){
            $output = $day_indo_sp.", ". $date_day_sp. " ". $month_indo_sp ." ". $date_year_sp;
        }else{
            $output = $date_day_sp. " ". $month_indo_sp ." ". $date_year_sp;
        }

        return $output;
    }
?>

<body>
    <div style=" width: 770px; height:1020px; margin:0%;" id="formulir1lembar">
        <table class="logotable" style="border: 1px solid black"">
            <tr>
                <td class="logotd" rowspan="4" >
                    <img src="{{ public_path('assets/img/HWASEUNG.png') }}" alt="" style="width: 120px; padding: 5px;">
                </td>
                <td class="logotd" rowspan="2" style="text-align: center; width: 300px; font-size:13px;">
                    <b>
                        PT HWA SEUNG INDONESIA
                    </b>
                </td>

                <td class="logotd alignleft"  style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Nomor Dokumen</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:12px; padding-top:3px; padding-bottom:3px;">FM.IMS.HRD.015-03 &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Pengesahan &nbsp;&nbsp;</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
                <td class="logotd" rowspan="2" style="text-align: center; font-size:13px;">
                Formulir <br>
                    Departemen Human Resource Development
                </td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Efektif</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
            <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Revisi</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">0</td>
            </tr>
            <tr>
                 <td class="logotd" colspan="2" style="text-align: center; font-size:13px;">
                    Sistem Manajemen 
                    Ketenagakerjaan
                </td>
                 <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Halaman</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">1/1</td>
            </tr>
        </table>

        <u>
            <h3 style="text-align:center;">FORM PENGAMBILAN SURAT KETERANGAN KERJA</h3>
        </u>

        <div style="padding-left:20px; padding-right:20px;">
            <table style="text-align: left;">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $resignation_submissions->number_of_employees ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $resignation_submissions->name ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $resignation_submissions->position ?></td>
            </tr>
            <tr>
                <td>Department</td>
                <td>:</td>
                <td><?= $resignation_submissions->department ?></td>
            </tr>
            <tr>
                <td>Tanggal Masuk</td>
                <td>:</td>
                <td><?= YmdHistoYmd($resignation_submissions->hire_date, 'd/m/Y')?></td>
            </tr>
            <tr>
                <td>Tanggal Permohonan Keluar &nbsp;&nbsp;&nbsp;</td>
                <td>:</td>
                <td><?= YmdHistoYmd($resignation_submissions->date_resignation_submissions, 'd/m/Y') ?></td>
            </tr>
            <tr>
                <td>Tanggal Pengambilan Surat</td>
                <td>:</td>
                <td><?= Dateplus($resignation_submissions->created_at, 14, 'd/m/Y') ?></td>
            </tr>
            </table>
        </div>
        <p style="margin-left:20px; text-align: left;">Telah menyampaikan surat pengunduran diri ke HRD. </p>

        <table style="margin-bottom:0%;">
            <tr style="margin-top:0%;">
                <th  style="width: 420px;">
                    
                </th>
                <th >
                    <table>
                        <tr style="text-align: center; font-weight: normal;">
                            <td>
                                Jepara,<?= DateSign(YmdHistoYmd($resignation_submissions->date_resignation_submissions, 'Y-m-d'), false) ?>
                                <br>
                                Karyawan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                            </td>
                        </tr>
                        <tr style="text-align: center; font-weight: normal;">
                            <td>( <?= $resignation_submissions->name ?> )</td>
                        </tr>
                    </table>
                </th>
            </tr>
            <tr style="margin:0%;">
                <td>
                    <div style="font-size: 14px; margin-top: 0%; margin-left:20px;  margin-top:20px;">Catatan :</div>
                    <ul style="margin-top: 0%;">
                        <li style="font-size:14px;"> <b><i>Form diserahkan ke HRD</i></b> </li>
                    </ul>
                </td>
                <td></td>
            </tr>
        </table>
        
        <h5 style="margin: 0%;">
            ...........................................................................................
            potong disini
            ..................................................................................................
        </h5>

        <table class="logotable" style="border: 1px solid black"">
            <tr>
                <td class="logotd" rowspan="4" >
                    <img src="{{ public_path('assets/img/HWASEUNG.png') }}" alt="" style="width: 120px; padding: 5px;">
                </td>
                <td class="logotd" rowspan="2" style="text-align: center; width: 300px; font-size:13px;">
                    <b>
                        PT HWA SEUNG INDONESIA
                    </b>
                </td>
                <td class="logotd alignleft"  style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Nomor Dokumen</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:12px; padding-top:3px; padding-bottom:3px;">FM.IMS.HRD.015-03 &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Pengesahan &nbsp;&nbsp;</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
                <td class="logotd" rowspan="2" style="text-align: center; font-size:13px;">
                Formulir <br>
                    Departemen Human Resource Development
                </td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Efektif</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
            <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Revisi</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">0</td>
            </tr>
            <tr>
                 <td class="logotd" colspan="2" style="text-align: center; font-size:13px;">
                    Sistim Manajemen 
                    Ketenagakerjaan
                </td>
                 <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Halaman</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">1/1</td>
            </tr>
        </table>
        <u>
            <h3 style="text-align:center;">FORM PENGAMBILAN SURAT KETERANGAN KERJA</h3>
        </u>

        <div style="padding-left:20px; padding-right:20px;">
        <table style="text-align: left;">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $resignation_submissions->number_of_employees ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $resignation_submissions->name ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $resignation_submissions->position ?></td>
            </tr>
            <tr>
                <td>Department</td>
                <td>:</td>
                <td><?= $resignation_submissions->department ?></td>
            </tr>
            <tr>
                <td>Tanggal Masuk</td>
                <td>:</td>
                <td><?= YmdHistoYmd($resignation_submissions->hire_date, 'd/m/Y') ?></td>
            </tr>
            <tr>
                <td>Tanggal Permohonan Keluar &nbsp;&nbsp;&nbsp;</td>
                <td>:</td>
                <td><?= YmdHistoYmd($resignation_submissions->date_resignation_submissions, 'd/m/Y') ?></td>
            </tr>
            <tr>
                <td>Tanggal Pengambilan Surat</td>
                <td>:</td>
                <td><?= Dateplus($resignation_submissions->created_at, 14, 'd/m/Y')  ?></td>
            </tr>
            </table>
        </div>
        <div style="font-size: 14px; margin-left:20px;  margin-top:20px;"> <i>Catatan :</i> </div>

        <ul style="margin-top: 0%; margin-bottom: 0%;">
            <li style="font-size:14px;"> <b><i>Form diserahkan ke karayawan</i></b> </li>
            <li style="font-size:14px;"> <b><i> <u>WAJIB</u> dibawa ketika pengambilan surat keterangan kerja</i></b> </li>
        </ul>
       

    </div>

    <!-- SURAT PERMOHONAN PENGUNDURAN DIRI -->
    <div style=" width: 770px; height:1020px;  margin:0%; " id="formulir2lembar">

        <table class="logotable" style="border: 1px solid black"">
            <tr>
                <td class="logotd" rowspan="4" >
                    <img src="{{ public_path('assets/img/HWASEUNG.png') }}" alt="" style="width: 120px; padding: 5px;">
                </td>
                <td class="logotd" rowspan="2" style="text-align: center; width: 300px; font-size:13px;">
                    <b>
                        PT HWA SEUNG INDONESIA
                    </b>
                </td>
                <td class="logotd alignleft"  style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Nomor Dokumen</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:12px; padding-top:3px; padding-bottom:3px;">FM.IMS.HRD.015-01 &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Pengesahan &nbsp;&nbsp;</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
                <td class="logotd" rowspan="2" style="text-align: center; font-size:13px;">
                Formulir <br>
                    Departemen Human Resource Development
                </td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Efektif</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
            <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Revisi</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">0</td>
            </tr>
            <tr>
                 <td class="logotd" colspan="2" style="text-align: center; font-size:13px;">
                    Sistim Manajemen 
                    Ketenagakerjaan
                </td>
                 <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Halaman</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">1/1</td>
            </tr>
        </table>

        <div style="padding-left: 20px;">
            <u>
                <h3 style="text-align: center;">FORM PENGUNDURAN DIRI</h3>
            </u>    
            <table style="margin-top:0px;">
                <tr>
                    <td>Yang Bertanda tangnan dibawah ini :</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <div style="padding-left:20px;">
                <table style="text-align: left;">
                    <tr>
                        <td valign="top">Nama</td>
                        <td valign="top">:</td>
                        <td valign="top"><?= $resignation_submissions->name ?></td>
                    </tr>
                    <tr>
                        <td valign="top">NIK ID Card</td>
                        <td valign="top">:</td>
                        <td valign="top"><?= $resignation_submissions->number_of_employees ?></td>
                    </tr>
                    <tr>
                        <td valign="top">Jabatan</td>
                        <td valign="top">:</td>
                        <td valign="top"><?= $resignation_submissions->position ?></td>
                    </tr>
                    <tr>
                        <td valign="top">Departemen</td>
                        <td valign="top">:</td>
                        <td valign="top"><?= $resignation_submissions->department ?></td>
                    </tr>
                    <tr>
                        <td valign="top">Tanggal Masuk</td>
                        <td valign="top">:</td>
                        <td valign="top"><?= YmdHistoYmd($resignation_submissions->hire_date, 'd/m/Y')?></td>
                    </tr>
                    <tr>
                        <td valign="top">Tempat, Tanggal Lahir &nbsp;&nbsp;</td>
                        <td valign="top">:</td>
                        <td valign="top">
                            <?php 
                                echo $alamat["place_of_birth"]. ", ";
                                $date_of_birth = $alamat["date_of_birth"];
                                if($date_of_birth == ''){
                                    echo $date_of_birth;
                                }else{
                                    echo YmdHistoYmd($date_of_birth, 'd/m/Y');
                                } 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Alamat</td>
                        <td valign="top">:</td>
                        <td valign="top" style="width: 500px;">
                            <?php
                                $jalan = $alamat["address_jalan"];
                                $rt = $alamat["address_rt"];
                                if($alamat["address_rt"] != "" OR $alamat["address_rt"] == NULL){
                                    $rt = "Rt ".$alamat["address_rt"];
                                }
                                $rw =  $alamat["address_rw"];
                                if($alamat["address_rw"] != "" OR $alamat["address_rw"] == NULL){
                                    $rw = "Rw ".$alamat["address_rw"];
                                }
                                $village = $alamat["address_village"];
                                $district = $alamat["address_district"];
                                $city = $alamat["address_city"];
                                $province = $alamat["address_province"];

                                $output_alamat = $rt." ".$rw." ".$village." ".$district." ".$city." ".$province;

                                echo $output_alamat."</br>";
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

            <p style=" text-align: left;">Bermaksud mengajukan pengunduran diri (Resign) dari PT. Hwa Seung Indonesia, terhitung mulai: </p>

            <div style="padding-left:20px;">
                <table>
                    <tr>
                        <td valign="top">Hari, Tanggal</td>
                        <td valign="top">:</td>
                        <td valign="top"><?= DateSign(YmdHistoYmd($resignation_submissions->date_resignation_submissions, 'Y-m-d'), true) ?></td>
                    </tr>
                    <tr>
                        <td valign="top">Alasan (<img src="{{ public_path('assets/img/checklist.png') }}" style="width:10px;" alt="" srcset="">)</td>
                        <td valign="top">:</td>
                        <td>
                            <table style="margin:0%; padding:0%;">
                                <tr style="margin:0%;">
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Beban Kerja")  { echo 'checked="checked"'; } ?> ></td>
                                    <td style="margin:0%;">Beban Kerja</td>
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Kesehatan/hamil/promil")  { echo 'checked="checked"'; } ?> ></td>
                                    <td style="margin:0%;">Kesehatan/ hamil/ promil</td>
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Gaji")  { echo 'checked="checked"'; } ?>></td>
                                    <td style="margin:0%;">Gaji</td>
                                </tr>
                                <tr style="margin:0%;">
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Pimpinan")  { echo 'checked="checked"'; } ?>></td>
                                    <td style="margin:0%;">Pimpinan</td>
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Pekerjaan baru/wirausaha")  { echo 'checked="checked"'; } ?>></td>
                                    <td style="margin:0%;">Pekerjaan baru / Wiraswasta</td>
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Pendidikan")  { echo 'checked="checked"'; } ?>></td>
                                    <td style="margin:0%;">Pendidikan</td>
                                </tr>
                                <tr style="margin:0%;">
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Rekan Kerja")  { echo 'checked="checked"'; } ?>></td>
                                    <td style="margin:0%;">Rekan Kerja</td>
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Keluarga/menikah")  { echo 'checked="checked"'; } ?>></td>
                                    <td style="margin:0%;">Keluarga/ menikah</td>
                                    <td style="margin:0%;"><input style="margin:0%; padding:0%;" type="checkbox" name="" id="" <?php if($resignation_submissions->reason == "Jarak")  { echo 'checked="checked"'; } ?>></td>
                                    <td style="margin:0%;">Jarak</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Keterangan
                            <br>
                            <span style="font-size:12px;"><i>(Detail alasan Resign)</i></span>
                        </td>
                        <td valign="top">:</td>
                        <td valign="top" style="width: 510px;"><?= $resignation_submissions->detail_reason ?></td>
                    </tr>
                    <tr>
                        <td valign="top">
                            Saran Untuk Perusahaan
                        </td>
                        <td valign="top">:</td>
                        <td valign="top" style="width: 510px;"><?= $resignation_submissions->suggestion ?></td>
                    </tr>
                </table>
            </div>

            <p style="text-align: left; ">Pengunduran diri ini Saya ajukan dengan sebenarnya, terima kasih atas perhatiannya. </p>

            <div>Jepara, <?= DateSign(YmdHistoYmd($resignation_submissions->date_resignation_submissions, 'Y-m-d'), false) ?></div>
            <div style="margin-bottom:60px; width:100; text-align:center;">Hormat Saya,</div>
            <div style="margin-bottom:10px;">( <?= $resignation_submissions->name ?> )</div>

            
            <table class="" style="border-collapse: collapse;">
                <tr>
                    <td class="signtopthbtm" style="font-size:12px; text-align:center; margin: 0px; padding: 0px;">STAFF/ LEADER</td>
                    <td class="signtopthbtm" style="font-size:12px; text-align:center; margin: 0px; padding: 0px;">SPV/ <br> ASST. MGR</td>
                    <td class="signtopthbtm" style="font-size:12px; text-align:center; margin: 0px; padding: 0px;">MANAGER/<br> F. MGR</td>
                    <td class="signtopthbtm" style="font-size:12px; text-align:center; margin: 0px; padding: 0px;">ASST. MGR/<br> SR. MGR</td>
                    <td class="signtopthbtm" style="font-size:12px; text-align:center; margin: 0px; padding: 0px;"> DIRECTOR</td>
                    <td class="signtopthbtm" style="font-size:12px; text-align:center; margin: 0px; padding: 0px;">SR. <br> DIRECTOR</td>
                    <td class="signtopthbtm" style="font-size:12px; text-align:center; margin: 0px; padding: 0px;">PRESIDENT<br> DIRECTOR</td>
                </tr>
                <tr>

                    <td class="signtoptd" >
                        <img src="{{ public_path('assets/img/DIAGONAL.PNG') }}" alt="" style="width: 100%; height:50px;">
                    </td>
                    <td class="signtoptd">
                        <img src="{{ public_path('assets/img/DIAGONAL.PNG') }}" alt="" style="width: 100%; height:50px;">
                    </td>
                    <td class="signtoptd">
                        <img src="{{ public_path('assets/img/DIAGONAL.PNG') }}" alt="" style="width: 100%; height:50px;">
                    </td>
                    <td class="signtoptd">
                        <img src="{{ public_path('assets/img/DIAGONAL.PNG') }}" alt="" style="width: 100%; height:50px;">
                    </td>
                    <td class="signtoptd" style="margin:0%;">
                        
                    </td>
                    <td class="signtoptd"></td>
                    <td class="signtoptd"></td>
                </tr>
            </table>
            <br>
            <table style="border-collapse: collapse; margin-top:3px;" id="signhrd">
                <tr>
                    <td style="width: 290px;"></td>
                    <td class="signtopthbtm" colspan="2" style="text-align:center; font-size:12px; margin:0px; padding: 0px;">HRD</td>
                    <td class="signtopthbtm" rowspan="2" style="text-align:center; font-size:12px;">SR. MANAGER</td>
                    <td class="signtopthbtm" rowspan="2" style="text-align:center; font-size:12px;">DIRECTUR</td>
                </tr>
                <tr>
                    <td ></td>
                    <td class="signtopthbtm" style="text-align:center; font-size:12px;">STAFF</td>
                    <td class="signtopthbtm" style="text-align:center; font-size:12px;">MANAGER</td>
                    </tr>
                <tr>
                    <td></td>
                    <td class="signtoptd"></td>
                    <td class="signtoptd"></td>
                    <td class="signtoptd"></td>
                    <td class="signtoptd"></td>
                </tr>
            </table>

        </div>
    </div> <!-- Page 2   -->

    
    
    <!-- LEMBAR VERSIH PENGEMBALIAN INVENTARIS  PAGE 3-->
    <div style=" width: 770px; height:1020px; margin:0%; " id="formulir3lembar">
        <table class="logotable" style="border: 1px solid black"">
            <tr>
                <td class="logotd" rowspan="4" >
                    <img src="{{ public_path('assets/img/HWASEUNG.png') }}" alt="" style="width: 120px; padding: 5px;">
                </td>
                <td class="logotd" rowspan="2" style="text-align: center; width: 300px; font-size:13px;">
                    <b>
                        PT HWA SEUNG INDONESIA
                    </b>
                </td>
                <td class="logotd alignleft"  style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Nomor Dokumen</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:12px; padding-top:3px; padding-bottom:3px;">FM.IMS.HRD.015-04 &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Pengesahan &nbsp;&nbsp;</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
                <td class="logotd" rowspan="2" style="text-align: center; font-size:13px;">
                Formulir <br>
                    Departemen Human Resource Development
                </td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Efektif</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
            <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Revisi</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">0</td>
            </tr>
            <tr>
                 <td class="logotd" colspan="2" style="text-align: center; font-size:13px;">
                    Sistim Manajemen 
                    Ketenagakerjaan
                </td>
                 <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Halaman</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">1/1</td>
            </tr>
        </table>

        <u>
            <h3 style="text-align:center; padding-right:20px;">FORM PENGEMBALIAN INVENTARIS</h3>
        </u>

        <div style="padding-left:20px;">

            <table style="text-align: left;">
                <tr>
                    <td style="width: 120px;">&nbsp;&nbsp;NIK</td>
                    <td>:</td>
                    <td style="width: 270px;"><?= $resignation_submissions->number_of_employees ?></td>
                    <td></td>
                    <td style="width: 120px;">Department</td>
                    <td>:</td>
                    <td><?= $resignation_submissions->department ?></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;Nama</td>
                    <td>:</td>
                    <td><?= $resignation_submissions->name ?></td>
                    <td></td>
                    <td>Tanggal Masuk</td>
                    <td>:</td>
                    <td><?= YmdHistoYmd($resignation_submissions->hire_date, "d/m/Y") ?></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;Jabatan</td>
                    <td>:</td>
                    <td><?= $resignation_submissions->position ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>
            <br>
            <b>
                <u>
                    Petunjuk Pengisian : 
                </u>
            </b>
            <br>
            <table>
                <tr>
                    <td valign="top">1</td>
                    <td valign="top">
                        *)  &nbsp;&nbsp;&nbsp; : Berikan tanda (<img src="{{ public_path('assets/img/checklist.png') }}" style="width:10px;" alt="" srcset="">) pada kolom :
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                    <ul type="square" style="width:660px; margin:0%;">
                            <li>Terima : Karyawan menerima barang selama bekerja, jika tidak menerima dibiarkan (tidak di tambahkan tanda)</li>
                            <li>Dikembalikan - YA : Barang dikembalikan ke perusahaan </li>
                            <li>Dikembalikan - Tidak : Barang tidak dikembalikan ke perusahaan, dan tuliskan di kolom keterangan alasan tidak dikembalikan (apabila diperlukan) </li>
                        </ul>
                    </td>
                    <td></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td valign="top">2</td>
                    <td valign="top"> **) : Tuliskan jumlah barangnya</td>
                </tr>
                <tr>
                    <td valign="top">3</td>
                    <td valign="top"> Tuliskan nama barang apabila tidak ada didalah daftar</td>
                </tr>
            </table>
            <br>
   
            <table style=" border-collapse: collapse; border: 1px solid black;">
                <tr>
                    <th class="logotd" rowspan="2">NO</th>
                    <th class="logotd" rowspan="2" >NAMA BARANG <br> INVENTARIS</th>
                    <th class="logotd" rowspan="2" style="padding-left:5px; padding-right:5px;" >TERIMA *)</th>
                    <th class="logotd" colspan="3" style="padding-left:5px; padding-right:5px;" >DIKEMBALIKAN</th>
                    <th class="logotd" rowspan="2" style="padding-left:5px; padding-right:5px;" >KETERANGAN</th>
                </tr>
                <tr>
                    <th class="logotd" style="padding-left:5px; padding-right:5px;">YA *)</th>
                    <th class="logotd" style="padding-left:5px; padding-right:5px;">TDK *)</th>
                    <th class="logotd" style="padding-left:5px; padding-right:5px;">JUMLAH **)</th>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">1</td><td class="logotd" style="padding-left:5px; padding-right:5px;">SERAGAM</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">2</td><td class="logotd" style="padding-left:5px; padding-right:5px;">ID CARD</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">3</td><td class="logotd" style="padding-left:5px; padding-right:5px;">KUNCI LOKER</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">4</td><td class="logotd" style="padding-left:5px; padding-right:5px;">SLAYER</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">5</td><td class="logotd" style="padding-left:5px; padding-right:5px;">CELEMEK</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">6</td><td class="logotd" style="padding-left:5px; padding-right:5px;">LAPTOP</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">7</td><td class="logotd" style="padding-left:5px; padding-right:5px;">PENGGARIS POKA YOKE</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">8</td><td class="logotd" style="padding-left:5px; padding-right:5px;">SARUNG TANGAN</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">9</td><td class="logotd" style="padding-left:5px; padding-right:5px;">PENGGARIS 15 CM</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">10</td><td class="logotd" style="padding-left:5px; padding-right:5px;">FLASH DISK</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">11</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">12</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">13</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">14</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
                <tr>
                    <td class="logotd" style="text-align:center;">15</td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td><td class="logotd"></td>
                </tr>
            </table>
            <br>

            <table>
                <tr>
                    <td style="width:300px; text-align:center;">Yang menerima</td>
                    <td style="width:380px; text-align:center;">Yang menyerahkan</td>
                </tr>
                <tr>
                    <td style="width:300px; text-align:center; height:150px;">(......................................)</td>
                    <td style="width:380px; text-align:center; height:150px;">(<?= $resignation_submissions->name ?>)</td>
                </tr>
            </table> 
        </div>

     

    </div>

    <!-- LEMBAR EXIT KUESIONER PAGE 4 -->
    <div style=" width: 770px; height:1020px; margin:0%; " id="formulir3lembar">
        <table class="logotable" style="border: 1px solid black"">
            <tr>
                <td class="logotd" rowspan="4" >
                    <img src="{{ public_path('assets/img/HWASEUNG.png') }}" alt="" style="width: 120px; padding: 5px;">
                </td>
                <td class="logotd" rowspan="2" style="text-align: center; width: 300px; font-size:13px;">
                    <b>
                        PT HWA SEUNG INDONESIA
                    </b>
                </td>
                <td class="logotd alignleft"  style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Nomor Dokumen</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:12px; padding-top:3px; padding-bottom:3px;">FM.IMS.HRD.015-02 &nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Pengesahan &nbsp;&nbsp;</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
                <td class="logotd" rowspan="2" style="text-align: center; font-size:13px;">
                Formulir <br>
                    Departemen Human Resource Development
                </td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Tanggal Efektif</td>
                <td class="logotd alignleft" style=" font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">10 Oktober 2017</td>
            </tr>
            <tr>
            <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Revisi</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">0</td>
            </tr>
            <tr>
                 <td class="logotd" colspan="2" style="text-align: center; font-size:13px;">
                    Sistim Manajemen 
                    Ketenagakerjaan
                </td>
                 <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">Halaman</td>
                <td class="logotd alignleft" style="font-size:13px; padding-left:7px; padding-right:7px; padding-top:3px; padding-bottom:3px;">1/1</td>
            </tr>
        </table>

        <u>
            <h3 style="text-align:center; padding-right:20px;">FORM EXIT KUESIONER</h3>
        </u>

        <div style="padding-left:20px;">

            <table style="text-align: left;">
                <tr>
                    <td style="width: 120px;">&nbsp;&nbsp;Department</td>
                    <td>:</td>
                    <td style="width: 270px;"><?= $resignation_submissions->department ?></td>
                    <td></td>
                    <td style="width: 120px;">Tanggal Masuk</td>
                    <td>:</td>
                    <td><?= YmdHistoYmd($resignation_submissions->hire_date, "d/m/Y") ?></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;Jabatan</td>
                    <td>:</td>
                    <td><?= $resignation_submissions->position ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            
            <br>
            <b>
                <u>
                    Petunjuk Pengisian : 
                </u>
            </b>
            <div style="padding-left:15px;" >

                <li >
                    Pilih Pertanyaan berikut yang sesuai sengan diri Anda dan berikan tanda <img src="{{ public_path('assets/img/checklist.png') }}" style="width:10px;" alt="" srcset=""> pada kolom jawaban :
                </li>
            </div>
                
            <div>&nbsp; &nbsp;- 4 : sangat sesuai (SS)</div>
            <div>&nbsp; &nbsp;- 3 : sesuai (S)</div>
            <div>&nbsp; &nbsp;- 2 : tidak sesuai (TS)</div>
            <div>&nbsp; &nbsp;- 1 : sangat tidak sesuai (STS)</div>
            <br>
   
            <table style=" border-collapse: collapse; border: 1px solid black;">
                <tr>
                    <th class="logotd" rowspan="2" style="padding-left:5px; padding-right:5px;">NO</th>
                    <th class="logotd" rowspan="2" style="width:440px; padding-left:5px; padding-right:5px;">Pernyataan </th>
                    <th class="logotd" colspan="4" style="padding-left:5px; padding-right:5px;" >Jawaban</th>
                </tr>
                <tr>
                    <th class="logotd" style="width:40px; padding-left:5px; padding-right:5px;">4 <br> (SS) </th>
                    <th class="logotd" style="width:40px; padding-left:5px; padding-right:5px;">3 <br> (S)</th>
                    <th class="logotd" style="width:40px; padding-left:5px; padding-right:5px;">2 <br> (TS)</th>
                    <th class="logotd" style="width:40px; padding-left:5px; padding-right:5px;">1 <br> (STS)</th>
                </tr>

                <?php 
                        $kuesioneres = [
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
                $nopage4 = 1;
                foreach($kuesioneres as $key => $kuesioner){
                ?>
                <tr>
                    <td style="padding:5px; text-align:center; border: 1px solid black;"><?= $nopage4++ ?></td>
                    <td style="padding:5px; border: 1px solid black;"><?= $kuesioner?></td>
                    <?php $k = "k". ($nopage4-1) ?>                        

                    <td style="border: 1px solid black;">
                        <?php 
                            if($kuesioners->$k == 4){ ?>
                            <div style="padding:10; text-align:center;">
                                <img src="{{ public_path('assets/img/checklist.png') }}" style="width:10px;" alt="" srcset="">
                            </div>
                        <?php }
                        ?>
                    </td>

                    <td style="border: 1px solid black;">     
                        <?php 
                            if($kuesioners->$k == 3){ ?>
                            <div style="padding:10; text-align:center;">
                                <img src="{{ public_path('assets/img/checklist.png') }}" style="width:10px;" alt="" srcset="">
                            </div>
                        <?php }
                        ?>                   
                    </td>
                    <td style="border: 1px solid black;">
                        <?php 
                            if($kuesioners->$k == 2){ ?>
                            <div style="padding:10; text-align:center;">
                                <img src="{{ public_path('assets/img/checklist.png') }}" style="width:10px;" alt="" srcset="">
                            </div>
                        <?php }
                        ?> 
                    </td>
                    <td style="border: 1px solid black;">
                        <?php 
                            if($kuesioners->$k == 1){ ?>
                            <div style="padding:10; text-align:center;">
                                <img src="{{ public_path('assets/img/checklist.png') }}" style="width:10px;" alt="" srcset="">
                            </div>
                        <?php }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <br>

            <!-- <table>
                <tr>
                    <td style="width:300px; text-align:center;">Yang menerima</td>
                    <td style="width:380px; text-align:center;">Yang menyerahkan</td>
                </tr>
                <tr>
                    <td style="width:300px; text-align:center; height:150px;">(.......................)</td>
                    <td style="width:380px; text-align:center; height:150px;">(.......................)</td>
                </tr>
            </table>  -->
        </div>

     

    </div>

</body>

</html>