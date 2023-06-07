<?php

declare(strict_types=1);

use Domain\User\Email;
use DomainException;

test('インスタンス化時に指定した値を取得できること', function () {
    $email = new Email('test@example.com');

    expect($email->value)->toBe('test@example.com');
});

test('文字数超過時、例外となること',
    fn() => new Email(str_repeat('a', Email::MAX_LENGTH + 1))
)->throws(DomainException::class);

test('わざとテストを失敗：メールアドレスが期待する値でない', function () {
    $email = new Email('test@example.com');

    expect($email->value)->toBe('hoge@example.com');
});

test('スキップするテスト: --group=引数の文字列でフィルタできる')
    ->skip('スキップの結果の例：ここにスキップの理由でも書くとよさそう')
    ->group('スキップの例');
test('MacOSの場合のみスキップ', fn() => expect(true)->toBeTrue())->skipOnMac()->group('スキップの例');
test('WindowsOSの場合のみスキップ', fn() => expect(true)->toBeTrue())->skipOnWindows()->group('スキップの例');
test('LinuxOSの場合のみスキップ', fn() => expect(true)->toBeTrue())->skipOnLinux()->group('スキップの例');

test('ToDoとして残すテスト: --todosでToDoのテストのみフィルタできる')->todo();

test('notも使える', fn() => expect('1')->not()->toBe(1));

test('モックを使ったテスト')->todo();
