<?php
use Fedex\Structures\Base;

// 认证用户
$auth = new \Fedex\Structures\Base\WebAuthenticationDetail();
$auth->setUserCredential('xxx', 'xxx');

$client = new \Fedex\Structures\Base\ClientDetail();
$client->setAccountNumber('xxx')->setMeterNumber('xxx');
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

$requestPackageLineItems = new \Fedex\Structures\RequestedPackageLineItems();
$requestPackageLineItems->setSequenceNumber(1)
    ->setDimensions(
        (new \Fedex\Structures\Base\Dimensions())
            ->setHeight(5)
            ->setWidth(5)
            ->setUnits('IN')
            ->setLength(108))
    ->setWeight((new \Fedex\Structures\Base\Weight())->setUnits('LB')->setValue(50.0))
    ->setGroupPackageCount(1);
// 请求运输时需要的信息
$requestShipment = new \Fedex\Structures\RequestedShipment();
$requestShipment->setDropoffType('REGULAR_PICKUP')
    ->setShipTimestamp()// 运输发起时间
    ->setServiceType('INTERNATIONAL_PRIORITY')// 服务类型
    ->setPackagingType('YOUR_PACKAGING')// 包裹类型
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
            ->setResidential(1))
    ->setRecipient(                                         // 接收人
        (new \Fedex\Structures\Base\Contact())
            ->setPersonName('Recipient Name')
            ->setCompanyName('Recipient Company Name')
            ->setPhoneNumber('9012637906'),
        (new \Fedex\Structures\Base\Address())
            ->setStreetLines(['Address Line 1'])
            ->setCity('Richmond')
            ->setStateOrProvinceCode('BC')
            ->setPostalCode('V7C4V4')
            ->setCountryCode('CA')
            ->setResidential(false))
    ->setShippingChargesPayment($shippingChargesPayment)// 付款人
    ->setPackageCount('10')// 包裹数
    ->setRequestedPackageLineItems($requestPackageLineItems);
$service = new \Fedex\Service\Rate();                       // 服务调用
$response = $service->addStruct($auth)
    ->addStruct($client)
    ->addStruct($version)
    ->addStruct($requestShipment)
    ->getRates();
