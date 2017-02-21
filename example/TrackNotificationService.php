<?php
$service = new \Fedex\Service\TrackNotificationService();

$response = $service->setUserCredential('xx', 'xx', 'xx', 'xx')
    ->setSenderInfo('xxx@sender.com', 'asdf')
    ->setReceiverInfo('xxxx@receiver.com', 'asdf')
    ->setTrackingNumber('80093876173674')
    ->call();
var_dump($response);