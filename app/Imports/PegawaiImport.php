<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PegawaiImport implements ToModel, WithStartRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            //
            'pnsId'         => $row[1],
            'nipBaru'       => $row[2],
            'nama'          => $row[4],
            'gelarDepan'    => $row[5],
            'gelarBelakang' => $row[6],
            'jenisKelamin'  => $row[10],
            'agama'         => $row[12],
            'tempatLahir'   => $row[8],
            'tglLahir'      => $row[9],
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 9;
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'nipBaru';
    }
}
