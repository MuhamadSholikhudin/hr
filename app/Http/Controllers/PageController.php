<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

// use App\Http\Controllers\Http;

use PDF;

use Illuminate\Support\Facades\Http;

require "Function.php";

class PageController extends Controller
{
    //
    public $url_api = "http://10.10.42.6:8880";
    public $url = "http://10.10.42.6:8080";

    public function index(){

        return view('pages.index',[
            'base_url' => $this->url,
            'url_p' => Url_website()
        ]);
    }

    public function resign(){

        $jobs = [["job_level" => "NONE" ]];
        $departments = [["department" => "NONE"]];
        $buildings = ["NONE"];

        if(Curl($this->url_api) == "false"){
            return view('pages.resign',[
                'base_url' => $this->url,       
                'jobs' => $jobs,
                'departments' => $departments,
                'buildings' => $buildings
            ]);
        }

        $url_jobs = $this->url_api."/resignjobs";
        $jobs = json_decode(file_get_contents($url_jobs), true);

        $url_departments = $this->url_api."/resigndepartments";
        $departments = json_decode(file_get_contents($url_departments), true);

        $url_buildings = $this->url_api."/resignbuildings";
        $buildings = json_decode(file_get_contents($url_buildings), true);
        
        return view('pages.resign', [
            'jobs' => $jobs,
            'departments' => $departments,
            'buildings' => $buildings
        ]);

    }


    public function getemployee(Request $request){

        $data = [400];

        if(Curl($this->url_api) == "false"){
            return json_encode($data);
        }

        $json = json_decode(file_get_contents($this->url_api."/resign/".$request->number_of_employees."/".$request->national_id.""), true);

        if($json['status'] == "200"){
            $data = [200];
        }

        return json_encode($data);
    }

    public function apigetresign(Request $request){

        $status_resign = "";
        $date_resign = date('Y-m-d');
        $status = 400;
        $name = "";
        $informasi = "";

        //Conncetion API
        if(Curl($this->url_api) == "false"){
            $data = [$status, $status_resign, $date_resign, $name, $informasi];
            return json_encode($data);
        }

        //get data employee yes or no 
        $json = json_decode(file_get_contents($this->url_api."/resign/".$request->number_of_employees."/".$request->national_id.""), true);
 
        // tampilkan data hire_date, date_out, status_employee
        $dateresign = json_decode(file_get_contents($this->url_api."/resigndate/".$request->number_of_employees."/".$request->national_id.""), true);
        
        //jika data employee ada maka
        if($json['status'] == "200"){

            switch ($dateresign['status']){
                case 405: 
                    $status = 405;
                    $status_resign = $dateresign['employee']['status_employee'];
                    $date_resign = $dateresign['employee']['date_out'];
                    $name = $dateresign['employee']['name'];
                    $informasi = $dateresign['information'];
                    break;
                case 202:
                    $status = 202;
                    $status_resign = $dateresign['employee']['status_employee'];
                    $date_resign = date('Y-m-d');
                    $name = $dateresign['employee']['name'];
                    $informasi = $dateresign['information'];
                    break;
                case 200:
                    $status = 200;
                    $status_resign = $dateresign['employee']['status_employee'];
                    $date_resign = date('Y-m-d');
                    $name = $dateresign['employee']['name'];
                    $informasi = $dateresign['information'];
                    break;
                default:
                    $status = 400;
                    $status_resign = $dateresign['employee']['status_employee'];
                    $date_resign = $dateresign['employee']['date_out'];
                    $name = $dateresign['name'];
                    $informasi = "";
            }
        }
                
        $data = [$status, $status_resign, $date_resign, $name, $informasi];

        return json_encode($data);
    }

    public function Post(Request $request){

        $status_resign = "";
        $date_resign = date('Y-m-d');
        $status = 400;
        $date_now = date("Y-m-d H:i:s");

        $url = Curl($this->url_api."/resign/".$request->nik."/".$request->ktp."");
        if($url !== "true"){ //jika koneksi api json gagal 
            return redirect('/pages')->with('resignfailed', '<script>swal("Pengajuan Resign Gagal");</script>');
        }

        //get data employee yes or no 
        $json_employee = json_decode(file_get_contents($this->url_api."/resign/".$request->nik."/".$request->ktp.""), true);
        //jika data employee tidak ada maka
        if($json_employee['status'] == "405"){ 
            return redirect('/pages')->with('resignfailed', '<script>swal("Pengajuan Resign Gagal Karena Data Karyawan Tidak di Temukan !");</script>');
        }
        
        //filter resign submission there or noting
        $count_submission = DB::table('resignation_submissions')
            ->where('number_of_employees', $request->nik)
            ->count();
        if($count_submission > 0){ // Jika data pengajuan resign sudah ada
            return redirect('/pages')->with('resignfailed', '<script>swal("Pengajuan Resign Gagal Karena Karyawan dengan nik ini sudah mengajukan resign!");</script>');
        }

        // tampilkan data hire_date, date_out, status_employee
        $dateresign = json_decode(file_get_contents($this->url_api."/resigndate/".$request->nik."/".$request->ktp.""), true);

        if($dateresign['status'] ==  405){
            return redirect('/pages')->with('resignfailed', '<script>swal("Pengajuan Resign Gagal Karena Data Pengajuan anda sudah berada di HRD untuk lebih lanjutnya silahkan hubungi hrd atau datang langsung ke HRD !");</script>');
        }

 

        if($dateresign['employee']['status_employee'] == "active"){ // jika status employee masih active maka tanggal resign min hari ini
        
            $status = 200;
            $name = $dateresign['employee']['name'];
            $date_out = $dateresign['employee']['date_out'];
            if($date_out == "0000-00-00"){
                $date_out = NULL;
            }

            $type = "true";
            $date_of_birth = $dateresign['employee']['date_of_birth'];

            //================
            $hire_date1 = strtotime($dateresign['employee']['hire_date']); 
            $date_resign2 = strtotime($date_out); 
            $distance = $date_resign2 - $hire_date1;
            $day = $distance / 60 / 60 / 24;
            $periode_of_service = $day;
            //=================
            
            //================
            function Hitung_umur($tanggal_lahir){
                $birthDate = new \DateTime($tanggal_lahir);
                $today = new \DateTime("today");
                if ($birthDate > $today) { 
                    exit("0 tahun 0 bulan 0 hari");
                }
                $y = $today->diff($birthDate)->y;
                $m = $today->diff($birthDate)->m;
                $d = $today->diff($birthDate)->d;

                return $y;
            }
            $age = Hitung_umur($date_of_birth);
            //================

            $status_reignsubmisssion = "wait";

            $classification = "Mengajukan permohonan Resign sebelum resign";
        }

        else{ // jika status employee masih tidak active maka tanggal resign adalah tanggak dia sudah resign
            
            $status = 202;
            $name = $dateresign['employee']['name'];
            $status_resign = $dateresign['employee']['status_employee'];
            $date_out = $dateresign['employee']['date_out'];
    
            if($date_out == "0000-00-00"){
                $date_out = NULL;
            }

            $type = "true";

            //================
            $hire_date1 = strtotime($dateresign['employee']['hire_date']); 
            $date_resign2 = strtotime($date_out); 
            $distance = $date_resign2 - $hire_date1;
            $day = $distance / 60 / 60 / 24;
            $periode_of_service = $day;
            //=================
            
            //================
            function Hitung_umur($tanggal_lahir){
                $birthDate = new \DateTime($tanggal_lahir);
                $today = new \DateTime("today");
                if ($birthDate > $today) { 
                    exit("0 tahun 0 bulan 0 hari");
                }
                $y = $today->diff($birthDate)->y;
                $m = $today->diff($birthDate)->m;
                $d = $today->diff($birthDate)->d;
                // return $y." tahun ".$m." bulan ".$d." hari";
                return $y;
            }
            
            $age = Hitung_umur($dateresign['employee']['date_of_birth']);
            //================

            $status_reignsubmisssion = "wait";

            $classification = "Mengajukan permohonan Resign setelah karyawan resign";
        }


        if($status == 200 OR $status == 202){

            $dataresign = [
                'number_of_employees' => $request->nik,
                'name' => $name,
                'position' => $request->jabatan,
                'department' => $request->department,
                'building' => $request->gedung,
                'hire_date' => $dateresign['employee']['hire_date'],
                'date_out' => $date_out,
                'date_resignation_submissions' => $request->dateresign,
                'type' => $type,
                'reason' => $request->alasanresign,
                'detail_reason' => $request->alasantambahan,
                'periode_of_service' => $periode_of_service,
                'age' => $age,
                'suggestion' => $request->saran,
                'status_resignsubmisssion' => $status_reignsubmisssion,
                'using_media' => 'local',
                'classification' => $classification,
                'print' => 0,
                'created_at' => $date_now,
                'updated_at' => $date_now                
            ];

            $datakuesioner = [
                'number_of_employees' => $request->nik,
                "k1" => $request->kuesioner1,
                "k2" => $request->kuesioner2,
                "k3" => $request->kuesioner3,
                "k4" => $request->kuesioner4,
                "k5" => $request->kuesioner5,
                "k6" => $request->kuesioner6,
                "k7" => $request->kuesioner7
            ];

            $data = [
                $dataresign,
                $datakuesioner
            ];

            DB::table('resignation_submissions')->insert($dataresign);
            DB::table('kuesioners')->insert($datakuesioner);
        }

        // return redirect('/pages/resignpdf')->with('resignpdf', '<script>swal("Pengajuan Resign Karyawan Berhasil");</script>');
        return redirect('/pages/resignpdf')->with('resignpdf', '<script>swal("Pengajuan Resign Karyawan Berhasil");</script>');

    }

    // public function Resignpdf($number_of_employees){
        
    //     $resignation_submissions = DB::table('resignation_submissions')
    //         ->where('number_of_employees', '=', $number_of_employees)
    //         ->first();

    //     $kuesioners = DB::table('kuesioners')
    //         ->where('number_of_employees', '=', $number_of_employees)
    //         ->first();

    //     $data = [
    //         'resignation_submission' => $resignation_submissions,
    //         'kuesioner' =>  $kuesioners
    //     ];

    //     $pdf = PDF::loadView('pages.pdfresign');
     
    //     return $pdf->download('Formulir_pengunduran_diri.pdf', $data);

    // }
    public function Resignpdf(Request $request){

        $data = DB::table("resignation_submisssions")
            ->where("number_of_employees", $request->number_of_employees)
            ->first();

        $pdf = PDF::loadView('pages.pdfresign');
        return $pdf->download('Formulir_pengunduran_diri.pdf');
        // sleep for 10 seconds
        sleep(60);
        // return redirect('/pages/')->with('resignpdf', '<script>swal("Pengajuan Resign Karyawan Berhasil");</script>');
    }

    public function example(){

        // $url = "http://10.10.42.6:8880/resign/2203051857/3319060201990005";
        // $employee = json_decode(file_get_contents($url), true);

        // $url_jobs = "http://10.10.42.6:8880/resignjobs";
        // $jobs = json_decode(file_get_contents($url_jobs), true);

        // $url_departments = "http://10.10.42.6:8880/resigndepartments";
        // $departments = json_decode(file_get_contents($url_departments), true);

        // $url_buildings = "http://10.10.42.6:8880/resignbuildings";
        // $buildings = json_decode(file_get_contents($url_buildings), true);

        // $url_dateresign = "http://10.10.42.6:8880/resigndate/2203051857/3319060201990005";
        // $dateresign = json_decode(file_get_contents($url_dateresign), true);

        // return view('pages.example',[
        //     'employee' => $employee,
        //     'jobs' => $jobs,
        //     'departments' => $departments,
        //     'buildings' => $buildings,
        //     'dateresign' => $dateresign
        // ]);

        // $response = Http::get('http://10.10.42.6:8880/resigndate/2203051857/3319060201990005');

        // $response->body('http://10.10.42.6:8880/resigndate/2203051857/3319060201990005');

        // print("<pre>".print_r($response,true)."</pre>");

        // $ch = curl_init("http://10.10.42.6:8880/resigndate/2203051857/3319060201990005");    // initialize curl handle

        // // $ch = curl_init("http://google.com"); 
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // $data = curl_exec($ch);

        // var_dump($data);

        // if($data == true){
        //     echo "benar";
        // }else{
        //     echo "salah";
        // }
        // // print($data);

        
        // function Curl($url){
        //     $ch = curl_init($url);    // initialize curl handle
        //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        //     $data = curl_exec($ch);    
        //     if($data == true){
        //         $val = true;
        //     }else{
        //         $val = false;
        //     }
        //     return $val;
        // }

        // $val = Curl("http://10.10.42.6:8880/resigndate/2203051857/3319060201990005");
        // // echo $val;
        // if( $val == true){
        //     echo "berhasil";
        // }else{
        //     echo "gagal";
        // }
        // Create a curl handle to a non-existing location


        // $tgl1 = strtotime("2022-03-01"); 
        // $tgl2 = strtotime("2022-09-01"); 

        // $jarak = $tgl2 - $tgl1;

        // $hari = $jarak / 60 / 60 / 24 / 12;
        // echo $hari;

        // function hitung_umur($tanggal_lahir){
        //     $birthDate = new \DateTime($tanggal_lahir);
        //     $today = new \DateTime("today");
        //     if ($birthDate > $today) { 
        //         exit("0 tahun 0 bulan 0 hari");
        //     }
        //     $y = $today->diff($birthDate)->y;
        //     $m = $today->diff($birthDate)->m;
        //     $d = $today->diff($birthDate)->d;
        //     return $y;
        // }        
        // echo hitung_umur("1999-01-02");

        // $response = json_decode(file_get_contents("http://10.10.42.6:8880/resignsubmissions"), true);
        // print("<pre>".print_r($response,true)."</pre>");        
        
        // $list = json_decode(file_get_contents("http://localhost:8080/list"), true);
        // print("<pre>".print_r($list,true)."</pre>");    
            
        // $awal  = date_create('2017-01-10');
        // $akhir = date_create('2022-01-10'); // waktu sekarang
        // $diff  = date_diff( $awal, $akhir );

        // echo 'Selisih waktu: ';
        // echo $diff->y . ' tahun, ';
        // echo $diff->m . ' bulan, ';
        // echo $diff->d . ' hari, ';
        // echo $diff->h . ' jam, ';
        // echo $diff->i . ' menit, ';
        // echo $diff->s . ' detik, ';
        // // Output: Selisih waktu: 28 tahun, 5 bulan, 9 hari, 13 jam, 7 menit, 7 detik

        // echo 'Total selisih hari : ' . $diff->days;

        // echo " Tahun selisih :". ($diff->days) / (365);
        // // Output: Total selisih hari: 10398
        // return Http::dd()->get('http://10.10.42.6:8880');

        // dd($response);
        // return Http::get('http://example.com/users/1')['name'];


        // API URL
        $url = 'http://10.10.42.6:8880/resign';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $data = array(
            'number_of_employees' => '2203051857',
            'national_id' => '3319060201990005'
        );
        // $payload = json_encode(array("user" => $data));
        $payload = json_encode($data);

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        // //Output response
        // echo "<pre>$result</pre>";

        //get response
        // $data = json_decode(file_get_contents('php://input'), true);
        $decode = json_decode($result);

        echo $decode->number_of_employees;
        echo "<br>";
        echo $decode->national_id;

        //output response
        // echo '<pre>'.$data.'</pre>';

    }

}
