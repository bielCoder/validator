<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Infrastructure\Http\CorsMiddleware;
use Presentation\Router\ApiRouter;
use Presentation\Controller\ValidateTextController;
use Application\UseCase\ValidateTextUseCase;
use Domain\Validation\TextParenthesesValidator;


CorsMiddleware::handle();


$useCase = new ValidateTextUseCase(new TextParenthesesValidator());
ApiRouter::post('/validate', new ValidateTextController($useCase));

ApiRouter::dispatch();
