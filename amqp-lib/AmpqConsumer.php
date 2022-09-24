<?php

namespace Kiri\AmqpLib;

use Closure;

class AmpqConsumer
{

    private AMQPExchangeOption $exchangeOption;


    private AMQPQueueOption $queueOption;


    private AMQPConsumerOption $consumerOption;


    /**
     * @param AMQPExchangeOption $exchangeOption
     * @param AMQPQueueOption $queueOption
     * @param AMQPConsumerOption $consumerOption
     */
    public function __construct(AMQPExchangeOption $exchangeOption, AMQPQueueOption $queueOption, AMQPConsumerOption $consumerOption)
    {
        $this->exchangeOption = $exchangeOption;
        $this->queueOption = $queueOption;
        $this->consumerOption = $consumerOption;
    }


    /**
     * @return AMQPExchangeOption
     */
    public function getExchangeOption(): AMQPExchangeOption
    {
        return $this->exchangeOption;
    }

    /**
     * @param AMQPExchangeOption $exchangeOption
     */
    public function setExchangeOption(AMQPExchangeOption $exchangeOption): void
    {
        $this->exchangeOption = $exchangeOption;
    }

    /**
     * @return AMQPQueueOption
     */
    public function getQueueOption(): AMQPQueueOption
    {
        return $this->queueOption;
    }

    /**
     * @param AMQPQueueOption $queueOption
     */
    public function setQueueOption(AMQPQueueOption $queueOption): void
    {
        $this->queueOption = $queueOption;
    }

    /**
     * @return AMQPConsumerOption
     */
    public function getConsumerOption(): AMQPConsumerOption
    {
        return $this->consumerOption;
    }

    /**
     * @param AMQPConsumerOption $consumerOption
     */
    public function setConsumerOption(AMQPConsumerOption $consumerOption): void
    {
        $this->consumerOption = $consumerOption;
    }

}
