<?php

namespace Kiri\AmqpLib;

use Exception;
use Kiri\Core\Str;
use Kiri\Server\Abstracts\BaseProcess;
use Swoole\Process;


/**
 *
 */
class AmqbChannelProcess extends BaseProcess
{

    protected bool $enable_coroutine = false;


    /**
     * @param string $host
     * @param string $port
     * @param string $user
     * @param string $password
     * @param string $vhost
     * @param AMQP $config
     */
    public function __construct(public string $host, public string $port, public string $user,
                                public string $password, public string $vhost, public AMQP $config)
    {
        $this->name = 'ampq.' . $this->config->getExchangeOption()->getExchange() . '.' .
            $this->config->getQueueOption()->getQueue();
    }


    /**
     * @return $this
     * @throws Exception
     */
    public function onSigterm(): static
    {
        pcntl_signal(15, function () {
            $this->isStop = true;
        });
        return $this;
    }


    /**
     * @param Process $process
     * @return void
     * @throws Exception
     */
    public function process(Process $process): void
    {
        try {
            $queue = $this->config->getQueueOption();
            $consumer = $this->config->getConsumerOption();

            $route = $queue->getRouteKey();
            if ($this->config->getExchangeOption()->getType() == strtolower(AMQPEnum::FANOUT->name)) {
                $route = '';
            }

            $channel = $this->config->reChannel(Str::rand(32), $route);
            $channel->basic_consume($queue->getQueue(), $consumer->getConsumerTag(), $consumer->isNoLocal(), $consumer->isNoAck(),
                $consumer->isExclusive(), $consumer->isNowait(), $consumer->getCallback(), $consumer->getTicket(), $consumer->getArguments());

            while (count($channel->callbacks)) {
                if ($this->isStop()) {
                    break;
                }
                if (!$this->config->isConnected()) {
                    $this->config->connected();
                }
                $channel->wait();
            }
            $this->config->close();
        } catch (\Throwable $exception) {
            \Kiri::getLogger()->error(throwable($exception));
        }
    }

}
