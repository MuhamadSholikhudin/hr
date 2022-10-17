<?php 
/*
http://10.10.42.6:8080 => 23
http://10.10.40.190:8080 => 25
http://127.0.0.1:8000 => 22

*/
function oke()
{
    return  'oke';
}

// $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// $jumlah_karakter = strlen($actual_link);

// define("actual_link", $actual_link);
// define("jumlah_karakter", $jumlah_karakter);


// define("URL_WEB", $actual_link);
// define("SUM_URL_WEB", $jumlah_karakter);

define("URL_WEB", "http://10.10.42.6:8080");
// define("SUM_URL_WEB", 23);

// define("URL_WEB", "10.10.40.190:8080");
// define("SUM_URL_WEB", 25);

// define("URL_WEB", "http://127.0.0.1:8000");
define("SUM_URL_WEB", 22);

function number_of_employees($employee_id){
    $sel_employee = DB::table('employees')->find($employee_id);
    return $sel_employee->number_of_employees;
}

function name($employee_id){
  $sel_employee = DB::table('employees')->find($employee_id);
  return $sel_employee->name;
}

function jabatan($employee_id){
  $sel_employee = DB::table('employees')->find($employee_id);
  $job = DB::table('jobs')->find($sel_employee->job_id);
  return $job->job_level;
}

function department($employee_id){
  $sel_employee = DB::table('employees')->find($employee_id);
  $department = DB::table('departments')->find($sel_employee->department_id);
  return $department->department;
}

function tanggal_pelanggaran($tanggal_pelanggaran){

    $date_violation_sp = new \DateTime($tanggal_pelanggaran.' 00:00:00');
    $date_year_sp = date_format($date_violation_sp, "Y"); //for Display Year
    $date_month_sp =  date_format($date_violation_sp, "m"); //for Display Month
    $date_day_sp = date_format($date_violation_sp, "d"); //for Display Date

    $day_sp = gmdate("l", mktime(0,0,0, $date_month_sp, $date_day_sp, $date_year_sp));

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

    return $day_indo_sp. ", ". $date_day_sp. " ". $month_indo_sp ." ". $date_year_sp;
}

function hari_angka($hari_angka){

  $date_violation_sp = new \DateTime($hari_angka.' 00:00:00');
  $date_year_sp = date_format($date_violation_sp, "Y"); //for Display Year
  $date_month_sp =  date_format($date_violation_sp, "m"); //for Display Month
  $date_day_sp = date_format($date_violation_sp, "d"); //for Display Date

  $day_sp = gmdate("l", mktime(0,0,0, $date_month_sp, $date_day_sp,  $date_year_sp));

  // Hari Indonesia
  if($day_sp == 'Monday'){
    $day_indo_sp = 'Senin';
    $day_indo_number = 1;
  }elseif($day_sp == 'Tuesday'){
    $day_indo_sp = 'Selasa';  
    $day_indo_number = 2;              
  }elseif($day_sp == 'Wednesday'){
    $day_indo_sp = 'Rabu';    
    $day_indo_number = 3;
  }elseif($day_sp == 'Thursday'){
    $day_indo_sp = 'Kamis';        
    $day_indo_number = 4;        
  }elseif($day_sp == 'Friday'){
    $day_indo_sp = 'Jumat';     
    $day_indo_number = 5;           
  }elseif($day_sp == 'Saturday'){
    $day_indo_sp = 'Sabtu';   
    $day_indo_number = 6;             
  }elseif($day_sp == 'Sunday'){
    $day_indo_sp = 'Minggu';     
    $day_indo_number = 7;           
  }
  return $day_indo_number;
}

function hari_string($hari_string){

  $date_violation_sp = new \DateTime($hari_string.' 00:00:00');
  $date_year_sp = date_format($date_violation_sp, "Y"); //for Display Year
  $date_month_sp =  date_format($date_violation_sp, "m"); //for Display Month
  $date_day_sp = date_format($date_violation_sp, "d"); //for Display Date

  $day_sp = gmdate("l", mktime(0,0,0,$date_day_sp,$date_month_sp,$date_year_sp));

  // Hari Indonesia
  if($day_sp == 'Monday'){
    $day_indo_sp = 'Senin';
    $day_indo_number = 1;
  }elseif($day_sp == 'Tuesday'){
    $day_indo_sp = 'Selasa';  
    $day_indo_number = 2;              
  }elseif($day_sp == 'Wednesday'){
    $day_indo_sp = 'Rabu';    
    $day_indo_number = 3;
  }elseif($day_sp == 'Thursday'){
    $day_indo_sp = 'Kamis';        
    $day_indo_number = 4;        
  }elseif($day_sp == 'Friday'){
    $day_indo_sp = 'Jumat';     
    $day_indo_number = 5;           
  }elseif($day_sp == 'Saturday'){
    $day_indo_sp = 'Sabtu';   
    $day_indo_number = 6;             
  }elseif($day_sp == 'Sunday'){
    $day_indo_sp = 'Minggu';     
    $day_indo_number = 7;           
  }
  return $day_indo_sp;
}

function tahun($tahun){

  $date_violation_sp = new \DateTime($tahun.' 00:00:00');
  $date_year_sp = date_format($date_violation_sp, "Y"); //for Display Year
  
  return $date_year_sp;
}

function selang($date_end_violation){
      $awal_sp = time(); // Waktu sekarang
      $akhir_sp  = strtotime($date_end_violation);
      $diff_sp  = $akhir_sp - $awal_sp;
      if($diff_sp > 0){
        $selang =  floor($diff_sp / (60 * 60 * 24)) . ' hari';
      }else{
        $selang = '';
      }

  return $selang;
}

function format_date($format_date){
  $date = date_create($format_date);
  echo date_format($date,"m/d/Y");
}












