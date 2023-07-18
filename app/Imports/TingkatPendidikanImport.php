<?php

namespace App\Imports;

use App\Models\TingkatPendidikan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class TingkatPendidikanImport implements ToModel, WithStartRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TingkatPendidikan([
            //
            'kode'                  => $row[1],
            'nama'                  => $row[2],
            'kode_golongan_awal'    => $row[3],
            'kode_golongan_akhir'   => $row[4],
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
