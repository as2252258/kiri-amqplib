<?php

namespace Kiri\AmqpLib;

class ReceiveMessage implements \Stringable
{
	private string $requestId;
	private string $userId;
	private string $sendId;
	private string $channelId;
	private mixed $body;
	private string $event;
	private SendInfo $sendInfo;

	/**
	 * @param string $requestId
	 * @param string $userId
	 * @param string $sendId
	 * @param string $channelId
	 * @param mixed $body
	 * @param string $event
	 * @param SendInfo $sendInfo
	 */
	public function __construct(string $requestId, string $userId, string $sendId, string $channelId, mixed $body, string $event, SendInfo $sendInfo)
	{
		$this->requestId = $requestId;
		$this->userId = $userId;
		$this->sendId = $sendId;
		$this->channelId = $channelId;
		$this->body = $body;
		$this->event = $event;
		$this->sendInfo = $sendInfo;
	}

	/**
	 * @return string
	 */
	public function getRequestId(): string
	{
		return $this->requestId;
	}

	/**
	 * @return string
	 */
	public function getUserId(): string
	{
		return $this->userId;
	}

	/**
	 * @return string
	 */
	public function getSendId(): string
	{
		return $this->sendId;
	}

	/**
	 * @return string
	 */
	public function getChannelId(): string
	{
		return $this->channelId;
	}

	/**
	 * @return mixed
	 */
	public function getBody(): mixed
	{
		return $this->body;
	}

	/**
	 * @return string
	 */
	public function getEvent(): string
	{
		return $this->event;
	}

	/**
	 * @return SendInfo
	 */
	public function getSendInfo(): SendInfo
	{
		return $this->sendInfo;
	}


	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return json_encode([
			'requestId' => $this->requestId,
			'userId' => $this->userId,
			'sendId' => $this->sendId,
			'channelId' => $this->channelId,
			'body' => $this->body,
			'event' => $this->event,
			'sendInfo' => $this->sendInfo,
		], JSON_UNESCAPED_UNICODE);
	}
}
