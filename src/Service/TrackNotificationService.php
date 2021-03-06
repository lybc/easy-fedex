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
        $this->setWsdl('TrackService_v12.wsdl');
        $this->setVersionInfo($this->_serviceId, $this->_wsdlVersion, '0', '0');
    }

    /**
     * @param $tracingNum
     * @return $this
     */
    function setTrackingNumber($tracingNum)
    {
        arr_set($this->options, 'TrackingNumber', $tracingNum);
        return $this;
    }

    function setSenderInfo($email, $contactName)
    {
        arr_set($this->options, 'SenderEMailAddress', $email);
        arr_set($this->options, 'SenderContactName', $contactName);
        return $this;
    }

    function setPersonalMessage($msg)
    {
        arr_set($this->options, 'EventNotificationDetail.PersonalMessage', $msg);
        return $this;
    }

    function setNotificationEvent($event = self::EVENT_ON_DELIVERY)
    {
        arr_set($this->options, 'EventNotificationDetail.EventNotifications.Events', $event);
        return $this;
    }

    function setNotificationType($type = self::TYPE_HTML)
    {
        arr_set(
            $this->options,
            'EventNotificationDetail.EventNotifications.NotificationDetail.NotificationType',
            $type
        );

        return $this;
    }

    function setReceiverInfo($email, $name)
    {
        arr_set(
            $this->options,
            'EventNotificationDetail.EventNotifications.NotificationDetail.EmailDetail.EmailAddress',
            $email
        );

        arr_set(
            $this->options,
            'EventNotificationDetail.EventNotifications.NotificationDetail.EmailDetail.Name',
            $name
        );

        return $this;
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