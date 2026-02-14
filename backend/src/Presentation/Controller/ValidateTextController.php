<?php
declare(strict_types=1);

namespace Presentation\Controller;

use Application\UseCase\ValidateTextUseCase;
use Application\UseCase\ValidateTextUseCaseInterface;
use Presentation\Http\JsonResponse;

final class ValidateTextController
{
    public function __construct(
       private ValidateTextUseCaseInterface $useCase
        
    ) {}

    public function __invoke(?array $payload = null): JsonResponse
    {
        $payload ??= json_decode(file_get_contents('php://input'), true) ?? [];

        $text = $payload['text'] ?? '';

        $isValid = $this->useCase->execute($text);

        if (!$isValid) {
            return new JsonResponse([
                'validation' => [
                    'text' => $text,
                    'validation' => false,
                    'message' => 'The text is invalid or exceeds the character limit..']
            ], 422);
        }

        return new JsonResponse([
            'validation' => [
                'text' => $text,
                'validation' => true,
                'message' => 'Text is valid.'
            ]
        ], 200);
    }
}
