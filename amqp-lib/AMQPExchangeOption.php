<?php

namespace Kiri\AmqpLib;

class AMQPExchangeOption
{

    private string $exchange;
    private string $type;
    private bool $passive = false;
    private bool $durable = false;
    private bool $auto_delete = true;
    private bool $internal = false;
    private bool $nowait = false;
    private array $arguments = [];
    private mixed $ticket = null;

    /**
     * @param string $exchange
     * @param AMQPEnum $type
     * @param bool $passive
     * @param bool $durable
     * @param bool $auto_delete
     * @param bool $internal
     * @param bool $nowait
     * @param array $arguments
     * @param string|null $ticket
     */
    public function __construct(string $exchange, AMQPEnum $type, bool $passive = false, bool $durable = false, bool $auto_delete = false, bool $internal = false, bool $nowait = false, array $arguments = [], mixed $ticket = null)
    {
        $this->exchange = $exchange;
        $this->type = strtolower($type->name);
        $this->passive = $passive;
        $this->durable = $durable;
        $this->auto_delete = $auto_delete;
        $this->internal = $internal;
        $this->nowait = $nowait;
        $this->arguments = $arguments;
        $this->ticket = $ticket;
    }

    /**
     * @return string
     */
    public function getExchange(): string
    {
        return $this->exchange;
    }

    /**
     * @param string $exchange
     */
    public function setExchange(string $exchange): void
    {
        $this->exchange = $exchange;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param AMQPEnum $type
     */
    public function setType(AMQPEnum $type): void
    {
        $this->type = strtolower($type->name);
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
    public function isInternal(): bool
    {
        return $this->internal;
    }

    /**
     * @param bool $internal
     */
    public function setInternal(bool $internal): void
    {
        $this->internal = $internal;
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
     * @return string|null
     */
    public function getTicket(): ?string
    {
        return $this->ticket;
    }

    /**
     * @param string|null $ticket
     */
    public function setTicket(?string $ticket): void
    {
        $this->ticket = $ticket;
    }

}
