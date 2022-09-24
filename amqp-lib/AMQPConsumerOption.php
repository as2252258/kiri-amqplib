<?php

namespace Kiri\AmqpLib;

use Closure;

class AMQPConsumerOption
{

    private string $consumer_tag = '';
    private bool $no_local = false;
    private bool $no_ack = false;
    private bool $exclusive = false;
    private bool $nowait = false;
    private array|Closure|null $callback = null;
    private mixed $ticket = null;
    private array $arguments = array();

    /**
     * @param string $consumer_tag
     * @param Closure|array|null $callback
     * @param bool $no_local
     * @param bool $autoAck
     * @param bool $exclusive
     * @param bool $nowait
     * @param mixed|null $ticket
     * @param array $arguments
     */
    public function __construct(string $consumer_tag, Closure|array|null $callback = null, bool $no_local = false, bool $autoAck = false, bool $exclusive = false, bool $nowait = false, mixed $ticket = null, array $arguments = [])
    {
        $this->consumer_tag = $consumer_tag;
        $this->no_local = $no_local;
        $this->no_ack = $autoAck;
        $this->exclusive = $exclusive;
        $this->nowait = $nowait;
        $this->callback = $callback;
        $this->ticket = $ticket;
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getConsumerTag(): string
    {
        return $this->consumer_tag;
    }

    /**
     * @param string $consumer_tag
     * @return AMQPConsumerOption
     */
    public function setConsumerTag(string $consumer_tag): AMQPConsumerOption
    {
        $this->consumer_tag = $consumer_tag;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNoLocal(): bool
    {
        return $this->no_local;
    }

    /**
     * @param bool $no_local
     * @return AMQPConsumerOption
     */
    public function setNoLocal(bool $no_local): AMQPConsumerOption
    {
        $this->no_local = $no_local;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNoAck(): bool
    {
        return $this->no_ack;
    }

    /**
     * @param bool $no_ack
     * @return AMQPConsumerOption
     */
    public function setNoAck(bool $no_ack): AMQPConsumerOption
    {
        $this->no_ack = $no_ack;
        return $this;
    }

    /**
     * @return bool
     */
    public function isExclusive(): bool
    {
        return $this->exclusive;
    }

    /**
     * @param bool $exclusive
     * @return AMQPConsumerOption
     */
    public function setExclusive(bool $exclusive): AMQPConsumerOption
    {
        $this->exclusive = $exclusive;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNowait(): bool
    {
        return $this->nowait;
    }

    /**
     * @param bool $nowait
     * @return AMQPConsumerOption
     */
    public function setNowait(bool $nowait): AMQPConsumerOption
    {
        $this->nowait = $nowait;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCallback(): ?array
    {
        return $this->callback;
    }

    /**
     * @param Closure|array $callback
     * @return AMQPConsumerOption
     */
    public function setCallback(Closure|array $callback): AMQPConsumerOption
    {
        $this->callback = $callback;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTicket(): mixed
    {
        return $this->ticket;
    }

    /**
     * @param mixed $ticket
     * @return AMQPConsumerOption
     */
    public function setTicket(mixed $ticket): AMQPConsumerOption
    {
        $this->ticket = $ticket;
        return $this;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @param array $arguments
     * @return AMQPConsumerOption
     */
    public function setArguments(array $arguments): AMQPConsumerOption
    {
        $this->arguments = $arguments;
        return $this;
    }

}
