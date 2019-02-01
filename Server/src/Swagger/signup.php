<?php
use OpenApi\Annotations as OA;


 /**
 * @OA\Tag(
 *     name         =  "signup",
 *     description  =  "Register a user"
 * )
 */

 /**
 * @OA\Post(
 *     path = "/signup",
 *     tags = {"signup"},
 *     summary = "Signup operation, Register a user",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType = "application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property = "name",
 *                     type = "string"
 *                 ),
 *                  @OA\Property(
 *                     property = "email",
 *                     type = "string"
 *                 ),
 *                 @OA\Property(
 *                     property = "password",
 *                     type = "string"
 *                 ),
 *                 example = {"name": "user","email": "user@gmail.com", "password": "1234"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response = 200,
 *         description = "OK"
 *     )
 * )
*/


?>