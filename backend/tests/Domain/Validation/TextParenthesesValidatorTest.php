<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Domain\Validation\TextParenthesesValidator;

final class TextParenthesesValidatorTest extends TestCase
{
    private TextParenthesesValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new TextParenthesesValidator();
    }

    public function testValidSimpleParentheses(): void
    {
        $this->assertTrue($this->validator->validate("()"));
    }

    public function testValidMixedParentheses(): void
    {
        $this->assertTrue($this->validator->validate("()[]{}"));
    }

    public function testInvalidMixedParentheses(): void
    {
        $this->assertFalse($this->validator->validate("(]"));
    }

    public function testValidNestedWithText(): void
    {
        $this->assertTrue(
            $this->validator->validate("texto (texto [texto {texto}])")
        );
    }

    public function testInvalidOrder(): void
    {
        $this->assertFalse($this->validator->validate("([)]"));
    }
}
