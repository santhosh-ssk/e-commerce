<?php
// middlewareErrorLogs.php

use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

// Middleware to handle minor errors
$app->add(function (Request $request, Response $response, $next) {
    /** @var \Psr\Log\LoggerInterface $logger */
    $logger = $this->get(LoggerInterface::class);

    // error handler function
    $myHandlerForMinorErrors = function ($errno, $errstr, $errfile, $errline) use ($response, $logger) {
        switch ($errno) {
            case E_USER_ERROR:
                $logger->error("Error number [$errno] $errstr on line $errline in file $errfile");
                break;
            case E_USER_WARNING:
                $logger->warning("Error number [$errno] $errstr on line $errline in file $errfile");
                break;
            case E_USER_NOTICE:
                $logger->notice("Error number [$errno] $errstr on line $errline in file $errfile");
                break;
            default:
                $logger->notice("Error number [$errno] $errstr on line $errline in file $errfile");
                break;
        }
        
        // Optional: Write error to response
        //$response = $response->getBody()->write("Error: [$errno] $errstr<br>\n");

        // Don't execute PHP internal error handler
        return true;
    };

    // Set custom php error handler for minor errors
    set_error_handler($myHandlerForMinorErrors, E_NOTICE | E_STRICT);

    return $next($request, $response);
});
?>