<?php

namespace common\components;

use Yii;
use common\models\ActivityLog;
use ipinfo\ipinfo\IPinfo;

class ActivityLogger
{
    public static function log($activityType, $description = null, $additionalData = [])
    {
        $log = new ActivityLog();

        $log->user_id = Yii::$app->user->id ?? null;
        $log->app = Yii::$app->id;
        $log->activity_type = $activityType;
        $log->description = $description;
        $log->ip_address = Yii::$app->request->userIP;
        $log->device = Yii::$app->request->userAgent;
        $log->browser = self::getBrowser();
        $log->location = json_encode(self::getLocation());
        $log->additional_data = json_encode($additionalData);

        $log->save();
    }

    private static function getBrowser()
    {
        return Yii::$app->request->userAgent;
    }

    private static function getLocation()
    {
        $access_token = '2d5dd8b759e8f0';
        $client = new IPinfo($access_token);
        $ip_address = Yii::$app->request->userIP;
    
        // Usa una IP de prueba en localhost
        if ($ip_address == "127.0.0.1") {
            $ip_address = "181.58.39.117";
        }
    
        try {
            // Intenta obtener los detalles de la ubicación
            $details = $client->getDetails($ip_address);
    
            // Verifica si los detalles de la ubicación son válidos
            if ($details && isset($details->city, $details->loc)) {
                $locationData = [
                    "Ciudad" => $details->city,
                    "Geo" => $details->loc,
                ];
                
                return $locationData;
            }
        } catch (\Exception $e) {
            // Maneja el error: puedes hacer un log si es necesario
            Yii::error("Error obteniendo ubicación: " . $e->getMessage());
        }
    
        // Retorna 'Unknown' si hay un fallo en la solicitud o datos no válidos
        return 'Unknown';
    }
}