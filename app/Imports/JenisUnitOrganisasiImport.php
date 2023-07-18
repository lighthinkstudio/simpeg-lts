<?php

namespace App\Imports;

use App\Models\JenisUnitOrganisasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class JenisUnitOrganisasiImport implements ToModel, WithStartRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JenisUnitOrganisasi([
            //
            'kode'      => $row[0],
            'nama'      => $row[1],
            'jenis'     => $row[2],
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
