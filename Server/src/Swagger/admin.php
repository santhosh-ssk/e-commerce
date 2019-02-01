
<?php
use OpenApi\Annotations as OA;

 /**
 * @OA\Tag(
 *     name         =  "admin",
 *     description  =  "admin operations"
 * )
 */
 
/**
 * @OA\Get(
 *     path = "/admin/{adminId}/shop",
 *     tags = {"admin"},
 *     summary = "fetches all shops added by the user",
 *     security  =  {{"TokenBased":{}}},
 *     @OA\Parameter(
 *          name      =  "adminId",
 *          in        =  "path",
 *          required  =   true,
 *          @OA\Schema(
 *              type  =  "integer",
 *              example = 35
 *          )
 *      ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType = "application/json",
 *         )
 *     ),
 *     @OA\Response(
 *         response = 200,
 *         description = "OK"
 *     )
 * )
*/

/**
 * @OA\Put(
 *     path = "/admin/{adminId}/shop",
 *     tags = {"admin"},
 *     summary   =  "Authorize user shop",
 *     security  =  {{"TokenBased":{}}},
 *     @OA\Parameter(
 *          name      =  "adminId",
 *          in        =  "path",
 *          required  =   true,
 *          @OA\Schema(
 *              type  =  "integer",
 *              example  =  35
 *          )
 *      ),@OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType  =  "application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property  =  "shopId",
 *                     type  =  "integer"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "isAuth",
 *                     type  =  "integer"
 *                 ),
 *                 example = {"shopId":1,"isAuth":1}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response  =  200,
 *         description  =  "OK"
 *     )
 * )
*/
?>
