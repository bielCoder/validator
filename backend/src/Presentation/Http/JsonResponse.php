<?php
declare(strict_types=1);

namespace Presentation\Http;

final class JsonResponse
{
    public function __construct(
        private array $data,
        private int $status = 200
    ) {}

    public function send(): void
    {
        http_response_code($this->status);
        header('Content-Type: application/json');
        echo json_encode($this->data);
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
