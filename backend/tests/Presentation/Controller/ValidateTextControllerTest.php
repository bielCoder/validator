<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Presentation\Controller\ValidateTextController;
use Application\UseCase\ValidateTextUseCase;
use Application\UseCase\ValidateTextUseCaseInterface;
use Presentation\Http\JsonResponse;

final class ValidateTextControllerTest extends TestCase
{
    public function testReturns422WhenTextIsInvalid(): void
    {
        $useCase = $this->createMock(ValidateTextUseCaseInterface::class);
        $useCase->method('execute')
                ->willReturn(false);

        $controller = new ValidateTextController($useCase);

        $response = $controller(['text' => '([)]']);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(422, $response->getStatus());
    }

    public function testReturns200WhenTextIsValid(): void
    {
        $useCase = $this->createMock(ValidateTextUseCaseInterface::class);
        $useCase->method('execute')
                ->willReturn(true);

        $controller = new ValidateTextController($useCase);

        $response = $controller(['text' => '()']);

        $this->assertEquals(200, $response->getStatus());
    }
}
