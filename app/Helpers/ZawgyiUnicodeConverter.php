<?php

namespace App\Helpers;

use Rabbit;
use Googlei18n\MyanmarTools\ZawgyiDetector;

class ZawgyiUnicodeConverter 
{
    public static function convertLocations(array $locations)
    {
        $detector = new ZawgyiDetector();
        return collect($locations)->map(function ($location) use ($detector) {
            if ($detector->getZawgyiProbability($location['name']) >= 0.95) {
                $location['name'] = Rabbit::zg2uni($location['name']);
            }
            return $location;
        });
    }

    public static function convertRemoteAreas(array $remoteAreas)
    {
        $detector = new ZawgyiDetector();
        return collect($remoteAreas)->map(function ($remoteArea) use ($detector) {
            if ($detector->getZawgyiProbability($remoteArea['Name']) >= 0.95) {
                $remoteArea['Name'] = Rabbit::zg2uni($remoteArea['Name']);
            }
            return $remoteArea;
        });
    }

    public static function convertPickups(array $pickups)
    {
        $detector = new ZawgyiDetector();
        return collect($pickups)->map(function ($pickup) use ($detector) {
            if ($detector->getZawgyiProbability($pickup['locationFrom']) >= 0.95) {
                $pickup['locationFrom'] = Rabbit::zg2uni($pickup['locationFrom']);
            }
            if ($detector->getZawgyiProbability($pickup['locationTo']) >= 0.95) {
                $pickup['locationTo'] = Rabbit::zg2uni($pickup['locationTo']);
            }
            return $pickup;
        });
    }
}