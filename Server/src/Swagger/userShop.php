
<?php
use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name         =  "user shop",
 *     description  =  "user performs all shop related operations"
 * )
*/

/**
 * @OA\Get(
 *     path = "/user/{userId}/shop",
 *     tags = {"user shop"},
 *     summary = "fetches all shops added by the user",
 *     @OA\Parameter(
 *          name      =  "userId",
 *          in        =  "path",
 *          required  =   true,
 *          @OA\Schema(
 *              type  =  "integer",
 *              example = 36
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
 * @OA\Post(
 *     path = "/user/{userId}/shop",
 *     tags = {"user shop"},
 *     summary   =  "Register a shop",
 *     security  =  {{"TokenBased":{}}},
 *     @OA\Parameter(
 *          name      =  "userId",
 *          in        =  "path",
 *          required  =   true,
 *          @OA\Schema(
 *              type  =  "integer",
 *              example  =  36
 *          )
 *      ),@OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType  =  "application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property  =  "shopName",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "shopPhoneNO",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "shopDescription",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "block",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "street",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "area",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "pincode",
 *                     type  =  "string"
 *                 ),
 *                 example = { "shopName": "ABC", "shopPhoneNO": "9900099000",
 *                           "shopDescription":"ABC provides readymade children dresses",
 *                           "block":"No 8","street" : "Bharathi Nagar", "area":"chennai","pincode":"600017"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response  =  200,
 *         description  =  "OK"
 *     )
 * )
*/

/**
 * @OA\Delete(
 *     path = "/user/{userId}/shop/{shopId}",
 *     tags = {"user shop"},
 *     summary   =  "delete a shop",
 *     security  =  {{"TokenBased":{}}},
 *     @OA\Parameter(
 *          name      =  "userId",
 *          in        =  "path",
 *          required  =   true,
 *          @OA\Schema(
 *              type  =  "integer",
 *              example  =  36
 *          )
 *      ),
 *     @OA\Parameter(
 *          name      =  "shopId",
 *          in        =  "path",
 *          required  =   true,
 *          @OA\Schema(
 *              type  =  "integer",
 *              example  =  1
 *          )
 *      ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType  =  "application/json",
 *         )
 *     ),
 *     @OA\Response(
 *         response  =  200,
 *         description  =  "OK"
 *     )
 * )
*/

?>