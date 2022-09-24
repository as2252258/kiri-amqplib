<?php

namespace Kiri\AmqpLib;

use Exception;
use JetBrains\PhpStorm\ArrayShape;
use Kiri\Abstracts\Config;
use Kiri\AmqpLib\Channel\AMQPChannel;
use Kiri\AmqpLib\Connection\AMQPStreamConnection;
use Kiri\Exception\ConfigException;

class AMQP
{
    private AMQPExchangeOption $exchangeOption;
    private AMQPQueueOption $queueOption;
    private ?AMQPConsumerOption $consumerOption;

    private ?AMQPChannel $channel = null;

    private string $replyQueue = '';


    private ?AMQPStreamConnection $stream = null;


    #[ArrayShape([
        'host' => 'string',
        'port' => 'string|int',
        'user' => 'string',
        'password' => 'string',
        'vhost' => 'string',
    ])]
    private array $config;

    /**
     * @param AMQPExchangeOption $exchangeOption
     * @param AMQPQueueOption $queueOption
     * @param AMQPConsumerOption|null $consumerOption
     * @throws ConfigException
     */
    public function __construct(AMQPExchangeOption $exchangeOption, AMQPQueueOption $queueOption, ?AMQPConsumerOption $consumerOption = null)
    {
        $this->exchangeOption = $exchangeOption;
        $this->queueOption = $queueOption;
        $this->config = Config::get('amqp.config');
        $this->consumerOption = $consumerOption;
    }


    /**
     * @return AMQPConsumerOption|null
     */
    public function getConsumerOption(): ?AMQPConsumerOption
    {
        return $this->consumerOption;
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
     * @return void
     * @throws Exception
     */
    public function close(): void
    {
        $this->channel->queue_unbind($this->replyQueue,
            $this->exchangeOption->getExchange(),
            $this->queueOption->getRouteKey());
        $this->channel->close();
        $this->stream->close();
    }


    /**
     * @param string $nodeId
     * @param string $routeKey
     * @return AMQPChannel
     */
    public function reChannel(string $nodeId, string $routeKey): AMQPChannel
    {
        $exchange = $this->exchangeOption;
        $queue = $this->queueOption;
        if ($this->channel instanceof AMQPChannel && $this->channel->is_open()) {
            return $this->channel;
        }
        $this->channel = $this->connected()->channel($nodeId);
        $this->channel->exchange_declare($exchange->getExchange(), $exchange->getType(), $exchange->isPassive(), $exchange->isDurable(), $exchange->isAutoDelete(),
            $exchange->isInternal(), $exchange->isNowait(), $exchange->getArguments(), $exchange->getTicket());
        [$this->replyQueue, ,] = $this->channel->queue_declare($queue->getQueue(), $queue->isPassive(), $queue->isDurable(), $queue->isExclusive(),
            $queue->isAutoDelete(), $queue->isNowait(), $queue->getArguments(), $queue->getTicket());
        $this->channel->queue_bind($this->replyQueue, $exchange->getExchange(), $routeKey);
        return $this->channel;
    }

    /**
     * @return bool
     */
    public function isConnected(): bool
    {
        return $this->stream instanceof AMQPStreamConnection && $this->stream->isConnected();
    }


    /**
     * @return AMQPStreamConnection
     */
    public function connected(): AMQPStreamConnection
    {
        if (!$this->isConnected()) {
            $this->stream = new AMQPStreamConnection($this->config['host'], $this->config['port'], $this->config['user'],
                $this->config['password'], $this->config['vhost']);
        }
        return $this->stream;
    }


}
