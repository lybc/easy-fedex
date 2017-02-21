<?php
namespace Fedex\Service;


class TrackNotificationService extends WebService
{

    private $_wsdlVersion = '12';
    private $_serviceId = 'trck';

    const EVENT_ON_DELIVERY = 'ON_DELIVERY';
    const EVENT_ON_ESTIMATED_DELIVERY = 'ON_ESTIMATED_DELIVERY';
    const EVENT_ON_EXCEPTION = 'ON_EXCEPTION';
    const EVENT_ON_SHIPMENT = 'ON_SHIPMENT';
    const EVENT_ON_TENDER = 'ON_TENDER';

    const TYPE_HTML = 'HTML';
    const TYPE_TEXT = 'TEXT';


    function __construct()
    {
        $this->setWsdl(dirname(__FILE__) . '/../wsdl/TrackService_v12.wsdl');
        $this->setVersionInfo($this->_serviceId, $this->_wsdlVersion, '0', '0');
    }

    /**
     * @param $tracingNum
     * @return $this
     */
    function setTrackingNumber($tracingNum)
    {
        $this->options['TrackingNumber'] = $tracingNum;
        return $this;
    }

    function setSenderInfo($email, $contactName)
    {
        $this->options['SenderEMailAddress'] = $email;
        $this->options['SenderContactName'] = $contactName;
        return $this;
    }

    function setPersonalMessage($msg)
    {
        $this->options['EventNotificationDetail']['PersonalMessage'] = $msg;
        return $this;
    }

    function setNotificationEvent($event = self::EVENT_ON_DELIVERY)
    {
        $this->options['EventNotificationDetail']['EventNotifications']['Events'] = $event;
        return $this;
    }

    function setNotificationType($type = self::TYPE_HTML)
    {
        $this->options['EventNotificationDetail']['NotificationDetail']['NotificationType'] = $type;
    }

    function call()
    {
        try {
            $response = parent::call()->sendNotifications($this->options);
            return $response;
        } catch (\SoapFault $e) {
            var_dump($e);
        }
    }
}