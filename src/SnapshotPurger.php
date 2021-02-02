<?php

namespace LTW;

use Aws\Lightsail\LightsailClient;
use \Throwable;

class SnapshotPurger {

    private LightsailClient $lightsailClient;

    public function __construct($region, $version)
    {

        $this->lightsailClient = new LightsailClient([
            'region'  => $region, //'us-east-1',
            'version' => $version //'2016-11-28',
        ]);

    }

    /**
     * @param     $resourceName
     * @param int $numberOfDaysToKeep
     *
     * @return bool
     */
    public function purgeAutosnapshots($resourceName, $numberOfDaysToKeep = 1)
    {

        try {

            $autoSnapshots = $this->lightsailClient->getAutoSnapshots(['resourceName' => $resourceName]);
            $threshold     = time() - ($numberOfDaysToKeep * 86400);

            foreach ($autoSnapshots->get('autoSnapshots') as $snapshot) {

                if ($snapshot['createdAt']->getTimestamp() <= $threshold) {
                    printf("  - Delete {$snapshot['date']}\n");
                    $this->lightsailClient->deleteAutoSnapshot([
                        'resourceName' => $resourceName,
                        'date'         => $snapshot['date'],
                    ]);
                }

            }

        } catch (Throwable $e) {
            return FALSE;
        }

        return TRUE;

    }

}