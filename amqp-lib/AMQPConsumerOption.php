<?php

namespace Kiri\AmqpLib;

class AMQPConsumerOption
{

    private string $consumer_tag = '';
    private bool $no_local = false;
    private bool $no_ack = false;
    private bool $exclusive = false;
    private bool $nowait = false;
    private array|null $callback = null;
    private mixed $ticket = null;
    private array $arguments = array();

    /**
     * @param string $consumer_tag
     * @param array|null $callback
     * @param bool $no_local
     * @param bool $no_ack
     * @param bool $exclusive
     * @param bool $nowait
     * @param mixed|null $ticket
     * @param array $arguments
     */
    public function __construct(string $consumer_tag, ?array $callback, bool $no_local = false, bool $no_ack = false, bool $exclusive = false, bool $nowait = false, mixed $ticket = null, array $arguments = [])
    {
        $this->consumer_tag = $consumer_tag;
        $this->no_local = $no_local;
        $this->no_ack = $no_ack;
        $this->exclusive = $exclusive;
        $this->nowait = $nowait;
        $this->callback = $callback;
        $this->ticket = $ticket;
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getQueue(): string
    {
        return $this->queue;
    }

    /**
     * @param string $queue
     */
    public function setQueue(string $queue): void
    {
        $this->queue = $queue;
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
     */
    public function setConsumerTag(string $consumer_tag): void
    {
        $this->consumer_tag = $consumer_tag;
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
     */
    public function setNoLocal(bool $no_local): void
    {
        $this->no_local = $no_local;
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
     */
    public function setNoAck(bool $no_ack): void
    {
        $this->no_ack = $no_ack;
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
     */
    public function setExclusive(bool $exclusive): void
    {
        $this->exclusive = $exclusive;
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
     */
    public function setNowait(bool $nowait): void
    {
        $this->nowait = $nowait;
    }

    /**
     * @return array|null
     */
    public function getCallback(): ?array
    {
        return $this->callback;
    }

    /**
     * @param array|null $callback
     */
    public function setCallback(?array $callback): void
    {
        $this->callback = $callback;
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
     */
    public function setTicket(mixed $ticket): void
    {
        $this->ticket = $ticket;
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
     */
    public function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }

}
