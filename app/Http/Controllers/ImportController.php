<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;
use App\CsvData;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Lead;
use Illuminate\Support\Facades\Session;

class ImportController extends Controller
{
    //

    public function getImport()
    {
        return view('import');
    }
    public function parseImport(CsvImportRequest $request)
{
    // $path = $request->file('csv_file')->getRealPath();
    $path = $request->csv_file->storeAs('csvfiles',$request->csv_file->getClientOriginalName());
    $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
    $complete_path = $storagePath.$path;
    // $data = array_map('str_getcsv', file($path));
    // $data = Excel::load($path, function($reader) {})->get()->toArray();
// dd($date);
$handle = fopen($complete_path, "r"); 
$header = true;

while ($csvLine = fgetcsv($handle, 1000, ",")) {

    if ($header) {
        $header = false;
    } else {
        Lead::create([
            'name'=> $csvLine[0],
            'status'=>$csvLine[1],
            'phone_number'=>$csvLine[2],
            'address'=>$csvLine[3],
            'description'=>$csvLine[4],
            'user_id'=>1,
            'last_date'=>$csvLine[6],
            
                        // 'job' => $csvLine[2],
        ]);
        Session::flash('success', 'CSV successfully parsed');
    }
}

// return redirect()->back();
return redirect()->route('leads.index')->withStatus(__('Csv successfully seeded .'));
    // $csv_data_file = CsvData::create([
    //     'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
    //     'csv_header' => $request->has('header'),
    //     'csv_data' => json_encode($data)
    // ]);

    // $csv_data = array_slice($data, 0, 2);
    // return view('import_fields', compact('csv_data', 'csv_data_file'));
    // To be continued...
}

public function processImport(Request $request)
{
    $data = CsvData::find($request->csv_data_file_id);
    $csv_data = json_decode($data->csv_data, true);
    foreach ($csv_data as $row) {
        $contact = new Contact();
        foreach (config('app.db_fields') as $index => $field) {
            $contact->$field = $row[$request->fields[$index]];
        }
        $contact->save();
    }

    return view('import_success');
}
}
