<?php
use Fedex\Service\TrackService;
$service = new TrackService();
$response = $service->setUserCredential('xx', 'xx', 'xx', 'xx')
    ->setSelectionDetails('TRACKING_NUMBER_OR_DOORTAG', '808052658881')->call();
var_dump($response);