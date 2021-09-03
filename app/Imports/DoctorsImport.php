<?php

namespace App\Imports;

use App\Models\Doctor;
use Maatwebsite\Excel\Concerns\ToModel;

class DoctorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Doctor([
            //
            'hs_id'=>$row[0],
            'hs_path'=>$row[1],
            'hs_created_at'=>$row[2],
            'hs_name'=>$row[3],
            'hs_child_table_id'=>$row[4],
            'hs_updated_at'=>$row[5],
            'specialization'=>$row[6],
            'locationname'=>$row[7],
            'provider'=>$row[8],
            'group'=>$row[9],
            'condition'=>$row[10],
            'zip'=>$row[11],
            'gender'=>$row[12],
            'language'=>$row[13],
            'availability'=>$row[14],
            'accepting'=>$row[15],
            'location'=>$row[16],
            'doc_image'=>$row[17],
            'doctor_name'=>$row[18],
            'designation'=>$row[19],
            'hospital'=>$row[20],
            'button_two_text'=>$row[21],
            'button_two_url'=>$row[22],
            'contact_title'=>$row[23],
            'address'=>$row[24],
            'telephone'=>$row[25],
            'about_physician'=>$row[26],
            'video'=>$row[27],
            'location_title'=>$row[28],
            'monday_timing'=>$row[29],
            'tuesday_timing'=>$row[30],
            'wednesday_timing'=>$row[31],
            'thursday_timing'=>$row[32],
            'friday_timing'=>$row[33],
            'cne_doctor'=>$row[34],
            'integral_doctor'=>$row[35],
            'office_location'=>$row[36],
            'delete_record'=>$row[37]
        ]);
    }
}
