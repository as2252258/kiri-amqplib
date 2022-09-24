<?php

namespace Kiri\AmqpLib;

class SendInfo implements \Stringable
{
	private string $avatar;
	private string $thumbnail;
	private string $nickname;
	private string $sex;

	/**
	 * @param string $avatar
	 * @param string $thumbnail
	 * @param string $nickname
	 * @param string $sex
	 */
	public function __construct(string $avatar, string $thumbnail, string $nickname, string $sex)
	{
		$this->avatar = $avatar;
		$this->thumbnail = $thumbnail;
		$this->nickname = $nickname;
		$this->sex = $sex;
	}


	/**
	 * @return string
	 */
	public function getAvatar(): string
	{
		return $this->avatar;
	}

	/**
	 * @return string
	 */
	public function getThumbnail(): string
	{
		return $this->thumbnail;
	}

	/**
	 * @return string
	 */
	public function getNickname(): string
	{
		return $this->nickname;
	}

	/**
	 * @return string
	 */
	public function getSex(): string
	{
		return $this->sex;
	}


	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return json_encode([
			'avatar' => $this->avatar,
			'thumbnail' => $this->thumbnail,
			'nickname' => $this->nickname,
			'sex' => $this->sex,
		], JSON_UNESCAPED_UNICODE);
	}
}
