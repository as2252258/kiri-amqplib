<?php

namespace Kiri\AmqpLib;

class AMQPQueueOption
{

    private string $queue = '';
    private string $routeKey = '';
    private bool $passive = false;
    private bool $durable = false;
    private bool $exclusive = false;
    private bool $auto_delete = true;
    private bool $nowait = false;
    private array $arguments = array();
    private mixed $ticket = null;

    /**
     * @param string $queue
     * @param string $routeKey
     * @param bool $passive
     * @param bool $durable
     * @param bool $exclusive
     * @param bool $auto_delete
     * @param bool $nowait
     * @param array $arguments
     * @param mixed|null $ticket
     */
    public function __construct(string $queue, string $routeKey, bool $passive = false, bool $durable = false, bool $exclusive = false, bool $auto_delete = false, bool $nowait = false, array $arguments = [], mixed $ticket = null)
    {
        $this->queue = $queue;
        $this->routeKey = $routeKey;
        $this->passive = $passive;
        $this->durable = $durable;
        $this->exclusive = $exclusive;
        $this->auto_delete = $auto_delete;
        $this->nowait = $nowait;
        $this->arguments = $arguments;
        $this->ticket = $ticket;
    }

    /**
     * @return string
     */
    public function getRouteKey(): string
    {
        return $this->routeKey;
    }

    /**
     * @param string $routeKey
     */
    public function setRouteKey(string $routeKey): void
    {
        $this->routeKey = $routeKey;
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
     * @return bool
     */
    public function isPassive(): bool
    {
        return $this->passive;
    }

    /**
     * @param bool $passive
     */
    public function setPassive(bool $passive): void
    {
        $this->passive = $passive;
    }

    /**
     * @return bool
     */
    public function isDurable(): bool
    {
        return $this->durable;
    }

    /**
     * @param bool $durable
     */
    public function setDurable(bool $durable): void
    {
        $this->durable = $durable;
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
    public function isAutoDelete(): bool
    {
        return $this->auto_delete;
    }

    /**
     * @param bool $auto_delete
     */
    public function setAutoDelete(bool $auto_delete): void
    {
        $this->auto_delete = $auto_delete;
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

}
