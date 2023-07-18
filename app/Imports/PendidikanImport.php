<?php

namespace App\Imports;

use App\Models\Pendidikan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PendidikanImport implements ToModel, WithStartRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pendidikan([
            //
            'kode'                      => $row[0],
            'nama'                      => $row[2],
            'kode_cepat'                => $row[3],
            'kode_tingkat_pendidikan'   => $row[1],
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'kode';
    }
}
