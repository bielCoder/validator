<?php
declare(strict_types=1);

namespace Domain\Validation;

final class TextParenthesesValidator implements ValidatorInterface
{
    private const MAX_LENGTH = 10000;
    private const MIN_LENGTH = 1;

    public function validate(string $text): bool
    {
        $length = strlen($text);

        //  Regra de tamanho obrigatório
        if ($length < self::MIN_LENGTH || $length > self::MAX_LENGTH) {
            return false;
        }

        $stack = [];

        $pairs = [
            ')' => '(',
            ']' => '[',
            '}' => '{',
        ];

        $openings = [
            '(' => true,
            '[' => true,
            '{' => true,
        ];

        foreach (str_split($text) as $char) {

            // Se for abertura → empilha
            if (isset($openings[$char])) {
                $stack[] = $char;
                continue;
            }

            // Se for fechamento
            if (isset($pairs[$char])) {

                if (empty($stack)) {
                    return false;
                }

                $last = array_pop($stack);

                if ($last !== $pairs[$char]) {
                    return false;
                }
            }

        }

        return empty($stack);
    }
}
