<?php
// 认证用户
$auth = new \Fedex\Structures\Base\WebAuthenticationDetail();
$auth->setUserCredential('mU2Zo7b1d7IxSYnh', '3vmHGKAWOYRzbyPbNkbYXZIV1');

$client = new \Fedex\Structures\Base\ClientDetail();
$client->setAccountNumber('510087240')->setMeterNumber('118780790');

// wsdl 版本
$version = new \Fedex\Structures\Base\Version();
$version->setServiceId('crs')->setMajor('20')->setMinor('0')->setIntermediate('0');

// 责任方信息
$responsibleParty = (new \Fedex\Structures\ResponsibleParty())
    ->setAddress((new \Fedex\Structures\Base\Address())->setCountryCode('US'))
    ->setAccountNumber('xxx');

// 付款人
$payor = new \Fedex\Structures\Payor();
$payor->setResponsibleParty($responsibleParty);

// 付款相关信息
$shippingChargesPayment = new \Fedex\Structures\ShippingChargePayment();
$shippingChargesPayment->setPaymentType('SENDER');
$shippingChargesPayment->setPayor($payor);

//$requestPackageLineItems = new \Fedex\Structures\RequestedPackageLineItems();
//$requestPackageLineItems->setDimensions()
// 请求运输时需要的信息
$requestShipment = new \Fedex\Structures\RequestedShipment();
$requestShipment->setDropoffType('REGULAR_PICKUP')
    ->setShipTimestamp()                                    // 运输发起时间
    ->setServiceType('INTERNATIONAL_PRIORITY')              // 服务类型
    ->setPackagingType('FEDEX_BOX')                         // 包裹类型
    ->setShipper(                                           // 承运人
        (new \Fedex\Structures\Base\Contact())
            ->setPersonName('Sender Name')
            ->setCompanyName('Sender company name')
            ->setPhoneNumber('123456789'),
        (new \Fedex\Structures\Base\Address())
            ->setStreetLines(['Addres \r  s Line 1'])
            ->setCity('Collierville')
            ->setStateOrProvinceCode('TN')
            ->setPostalCode('38017')
            ->setCountryCode('US')
            ->setResidential(1)
    )
    ->setRecipient(                                         // 接收人
        (new \Fedex\Structures\Base\Contact())
            ->setPersonName('Recipient Name')
            ->setCompanyName('Recipient Company Name')
            ->setPhoneNumber('1234567890'),
        (new \Fedex\Structures\Base\Address())
            ->setStreetLines(['Address Line 1'])
            ->setCity('Herndon')
            ->setStateOrProvinceCode('VA')
            ->setPostalCode('20171')
            ->setCountryCode('US')
            ->setResidential(1)
    )
    ->setShippingChargesPayment($shippingChargesPayment)    // 付款人
    ->setPackageCount(1);                                   // 包裹数
//    ->setRequestedPackageLineItems();

$service = new \Fedex\Service\Rate();                       // 服务调用
$response = $service->set($auth)
    ->set($client)
    ->set($version)
    ->set($requestShipment)
    ->getRates();