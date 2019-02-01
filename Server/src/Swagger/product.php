<?php
use OpenApi\Annotations as OA;


/**
 * @OA\Tag(
 *     name         =  "product",
 *     description  =  "all product related operations"
 * )
*/

/**
 * @OA\Get(
 *     path = "/{userId}/products",
 *     tags = {"product"},
 *     summary   =  "Add a new product",
 *     security  =  {{"TokenBased":{}}},
 *     @OA\Response(
 *         response  =  200,
 *         description  =  "OK"
 *     ),
 *    @OA\Parameter(
 *          name      =  "userId",
 *          in        =  "path",
 *          required  =   true,
 *          @OA\Schema(
 *              type  =  "integer",
 *              example  =  36
 *          )
 *      ),
 *    @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType  =  "application/json",
 *         )
 *     ),
 * )
*/

/**
 * @OA\Post(
 *     path = "/product",
 *     tags = {"product"},
 *     summary   =  "Add a new product",
 *     security  =  {{"TokenBased":{}}},
 *     @OA\Response(
 *         response  =  200,
 *         description  =  "OK"
 *     ),
 *    @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType  =  "application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property  =  "userId",
 *                     type  =  "integer"
 *                 ),
 *                  @OA\Property(
 *                     property  =  "name",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "description",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "color",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "size",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "netweight",
 *                     type  =  "string"
 *                 ),
 *                 @OA\Property(
 *                     property  =  "mrpprice",
 *                     type  =  "string"
 *                 ),
 *                 example = { "userId":36,"name": "T-shirt", "description": "Made out of high quality fabric, designed for rough use.",
 *                           "color":"blue",
 *                           "size":"medium","netweight" : "", "mrpprice":"500 Rs"}
 *             )
 *         )
 *     ),
 * )
*/

?>
