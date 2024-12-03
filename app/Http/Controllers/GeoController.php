<?php

namespace App\Http\Controllers;

use Geotools\Convert\ConvertInterface;
use Illuminate\Http\Request;
use Geotools\Coordinate\Coordinate;
use Geotools\Distance\Distance;
use Geotools\Geotools;

class GeoController extends Controller
{
    static function getDistance($lat1 = 0, $lon1 = 0, $lat2 = 0, $lon2 = 0)
    {
        $coord1 = new Coordinate([$lat1, $lon1]);
        $coord2 = new Coordinate([$lat2, $lon2]);

        $distance = new Distance();

        return $distance->setFrom($coord1)->setTo($coord2)->haversine();
    }

    static function dmsToDm($dmsCoordinate = null)
    {
//        $dsm = '27 15 11.8 S, 49 41 31.8 W';
        $cordinate = new Coordinate($dmsCoordinate);
        $geotools = new Geotools();
        $convert = $geotools->convert($cordinate);

        return $convert->toDM();
    }

    static function dmsParaDecimal($coordenada) {
        preg_match('/(\d+)°(\d+\'?)(\d+\.\d+"?)([NSWE])/', $coordenada, $matches);

        $graus = (int) $matches[1];
        $minutos = (int) $matches[2];
        $segundos = (float) $matches[3];
        $direcao = $matches[4];

        $decimal = $graus + ($minutos / 60) + ($segundos / 3600);

        if ($direcao == 'S' || $direcao == 'W') {
            $decimal = -$decimal;
        }

        return number_format($decimal, 6, '.', '');
    }
}
