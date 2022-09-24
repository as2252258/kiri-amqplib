<?php

namespace Kiri\AmqpLib;


use Exception;
use Kiri\AmqpLib\Message\AMQPMessage;
use Kiri\Di\LocalService;

class AmpqProducer
{

    private AMQPExchangeOption $exchangeOption;
    private AMQPQueueOption $queueOption;

    private array $config;

    /**
     * @param AMQPExchangeOption $exchangeOption
     * @param AMQPQueueOption $queueOption
     * @param array $config
     */
    public function __construct(AMQPExchangeOption $exchangeOption, AMQPQueueOption $queueOption, array $config)
    {
        $this->exchangeOption = $exchangeOption;
        $this->queueOption = $queueOption;
        $this->config = $config;
    }


    /**
     * @return AMQPExchangeOption
     */
    public function getExchangeOption(): AMQPExchangeOption
    {
        return $this->exchangeOption;
    }


    /**
     * @return AMQPQueueOption
     */
    public function getQueueOption(): AMQPQueueOption
    {
        return $this->queueOption;
    }


    /**
     * @param string $nodeId
     * @param string $routeKey
     * @param ReceiveMessage $message
     * @return void
     * @throws Exception
     */
    public function publish(string $nodeId, string $routeKey, ReceiveMessage $message): void
    {
        $msg = new AMQPMessage(json_encode($message, JSON_UNESCAPED_UNICODE));
        $localService = \Kiri::getDi()->get(LocalService::class);
        $name = md5($this->config['host'] . '::' . $this->config['port']);
        if (!$localService->has($name)) {
            $amqp = new AMQP($this->exchangeOption, $this->queueOption, $this->config);
            $localService->set($name, $amqp);
        } else {
            $amqp = $localService->get($name);
        }
        $channel = $amqp->reChannel($nodeId, $routeKey);
        $channel->basic_publish($msg, $this->exchangeOption->getExchange(), $routeKey);
    }


}
