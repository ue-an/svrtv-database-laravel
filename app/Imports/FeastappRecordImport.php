<?php

namespace App\Imports;

use App\Models\FeastappRecord;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class FeastappRecordImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = intval($row['download_date']);
        return new FeastappRecord([
            'feastapp_id'=> "fstapp-".Str::random(13),
            'user_id' => $row['user_id'],
            'date_downloaded'=>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y/m/d'),
        ]);
    }
}
