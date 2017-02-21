<?php
use Fedex\Service\ValidationAvailabilityAndCommitmentService;

$service = new ValidationAvailabilityAndCommitmentService();
$service->setUserCredential('xx', 'xx', 'xx', 'xx')
    ->setOrigin('77511', 'US')
    ->setDestination('38017', 'US')
    ->setCarrierCode('FDXE')
    ->setService('PRIORITY_OVERNIGHT')
    ->setPacking('FEDEX_BOX')
    ->call();