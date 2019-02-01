<?php
use OpenApi\Annotations as OA;
/**
 * @OA\Info(
 *     version      =  "1.0",
 *     title        =  "Ecommerce Api Testing",
 *     description  =  "Ecommerce Application provides a platform for retailers to sell there product's "
 * )
 */

/**
 * @OA\Server(
 *     url          =  "http://localhost/ecommerce/Server/public",
 *     description  =  "Production Server",
 * )
 */


 /**
 * @OA\Server(
 *     url  =  "http://localhost:5000",
 *     description  =  "using php Server",
 * )
 */

 /**
 * @OA\SecurityScheme(
 *    type    =  "http",
 *    scheme  =  "bearer",
 *    name    =  "Authorization",
 *    in      =  "header",
 *    securityScheme = "TokenBased",
 * )
 */


?>