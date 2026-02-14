<?php
declare(strict_types=1);

namespace Application\UseCase;

interface ValidateTextUseCaseInterface
{
    public function execute(string $text): bool;
}
