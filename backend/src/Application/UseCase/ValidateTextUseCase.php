<?php 
    declare(strict_types=1);
    namespace Application\UseCase;

    use Domain\Validation\ValidatorInterface;

    final class ValidateTextUseCase implements ValidateTextUseCaseInterface {
        public function __construct(
            private ValidatorInterface $validator
        ) {}

       public function execute(string $text): bool
        {
            return $this->validator->validate($text);
        }
    }