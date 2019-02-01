<?php
use OpenApi\Annotations as OA;

  /**
 * @OA\Tag(
 *     name         =  "login",
 *     description  =  "Login operation"
 * )
 */

  /**
 * @OA\Put(
 *     path = "/login",
 *     tags = {"login"},
 *     summary = "Login operation",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType = "application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property = "username",
 *                     type = "string"
 *                 ),
 *                 @OA\Property(
 *                     property = "password",
 *                     type = "string"
 *                 ),
 *                 example = {"username": "user@gmail.com", "password": "1234"}
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