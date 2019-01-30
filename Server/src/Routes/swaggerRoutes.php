
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


  /**
 * @OA\Tag(
 *     name         =  "login",
 *     description  =  "Login operation"
 * )
 */

 /**
 * @OA\Tag(
 *     name         =  "signup",
 *     description  =  "Register a user"
 * )
 */

  /**
 * @OA\Tag(
 *     name         =  "user shop",
 *     description  =  "user performs all shop related operations"
 * )
 */

 /**
 * @OA\Tag(
 *     name         =  "admin",
 *     description  =  "admin operations"
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
