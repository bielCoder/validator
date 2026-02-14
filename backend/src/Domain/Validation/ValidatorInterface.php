<?php
    declare(strict_types=1);
    namespace Domain\Validation;

    interface ValidatorInterface
    {
        /**
         * Validates the given input.
         *
         * @param string $input The input to validate.
         * @return bool True if the input is valid, false otherwise.
         */
        public function validate(string $input): bool;
    }