<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Exports\DoctorsExport;
use App\Imports\DoctorsImport;
use App\Models\Doctor;
use App\Models\FileData;
use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    // public function importExportView()
    // {
    //    return view('import');
    // }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        // dd('export');
        return Excel::download(new DoctorsExport, 'doctors.csv');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        // dd('in');
        Excel::import(new DoctorsImport,request()->file('file'));
           
        return back();
    }
    public function getFiles(){

        try{

        
        $developerToken = 'xEh9CfrrWln2Yw3FAcx1MraQrqZGetiD';
        $urlFolder = 'https://api.box.com/2.0/folders/142493145323';
        $urlFile = 'https://api.box.com/2.0/files/';
        // dd($baseUrl);
        $client = new Client(); //GuzzleHttp\Client
        $headers = ['Authorization' => 'Bearer ' . $developerToken, 'Accept' => 'application/json',];

        $response = $client->get(
            $urlFolder,
            [
                'headers' => $headers
            ]
        );
        $data = json_decode($response->getBody());
        // dd($data->item_collection->entries);
        foreach($data->item_collection->entries as $d){

            $response = $client->get(
                $urlFile.$d->id,
                [
                    'headers' => $headers
                ]
            );  
            $data = json_decode($response->getBody());
            // dd(isset($data->shared_link->download_url));
            $publicLink = null;
            if(isset($data->shared_link->download_url)){
                $publicLink = $data->shared_link->download_url;
            }
            FileData::create([

                'file_id' => $data->id,
                'filename' => $data->name,
                'public_link' => $publicLink

            ]);
        }
        }
        catch(\Exception $e){

            dd($e);
        }
    }
    public function setUrls(){


        //testing start

        // $count = FileData::where('filename', 'Isha_Shah_Warwick.jpg')->exists();
        // // dd($count);
        // if($count>0){
        //     $a = 'a';
        // }
        // else{
        //     $a = 'b';
        // }
        // dd($a);
        //testing end
        $filesData = FileData::get();
        // dd($filesData);
        foreach($filesData as $file){

            if(isset($file->filename)){
                $fileArray = explode('_',$file->filename);
                $firstName = $fileArray[0];
                $lastName = $fileArray[1];
                $locationArray = explode('.', $fileArray[2]);
                $location = $locationArray[0];
                // dd($fileArray[0]. ' '. $fileArray[1]. ' '. $location);

                Doctor::where('doctor_name', $firstName.' '.$lastName)->where('locationname', 'like', '%' .$location. '%')->update(['doc_image' => $file->public_link]);
                // dd($doctor);
                
            }
            else{
                $fileArray = [];
            }

            
        }
    }
}
