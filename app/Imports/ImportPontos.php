<?php

namespace App\Imports;

use App\Models\Ponto;
use Hoa\Exception\Error;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Http\Controllers\GeoController;

class ImportPontos implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0] != "Linha (Prefixo)") {
              return new Ponto([
                  'prefixo' => $row[0],
                  'linha' => $row[1],
                  'sentido' => $row[2],
                  'local' => $row[3],
                  'latitude' => GeoController::dmsParaDecimal($row[4]),
                  'longitude' => GeoController::dmsParaDecimal($row[5]),
              ]);
        }
        return null;
    }
}
