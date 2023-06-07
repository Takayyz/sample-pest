<?php

declare(strict_types=1);

namespace Domain\User;

use DomainException;

final class Email
{
    /**
     * メールアドレスの最大文字数
     *
     * @var int
     */
    public const MAX_LENGTH = 256;

    /**
     * コンストラクタ
     *
     * @param string $value
     *
     * @throws DomainException
     */
    public function __construct(public readonly string $value)
    {
        if (mb_strlen($this->value) > self::MAX_LENGTH) {
            throw new DomainException('hoge');
        }
    }
}
