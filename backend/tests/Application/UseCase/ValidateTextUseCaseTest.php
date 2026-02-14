<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Application\UseCase\ValidateTextUseCase;
use Domain\Validation\ValidatorInterface;

final class ValidateTextUseCaseTest extends TestCase
{
    public function testExecuteReturnsTrueWhenValidatorReturnsTrue(): void
    {
        $validator = $this->createMock(ValidatorInterface::class);

        $validator->method('validate')
                  ->willReturn(true);

        // 👇 UseCase REAL
        $useCase = new ValidateTextUseCase($validator);

        $result = $useCase->execute('()');

        $this->assertTrue($result);
    }

    public function testExecuteReturnsFalseWhenValidatorReturnsFalse(): void
    {
        $validator = $this->createMock(ValidatorInterface::class);

        $validator->method('validate')
                  ->willReturn(false);

        $useCase = new ValidateTextUseCase($validator);

        $result = $useCase->execute('(]');

        $this->assertFalse($result);
    }
}
