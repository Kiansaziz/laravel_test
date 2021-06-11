https://kians.websysn.com/login/facebook/callback


http://localhost:8000/login/facebook/callback




/**
* @OA\Get(
*     path="/api/testing/{mytest}",
*     @OA\Response(response="200", description="Display a listing of projects.")
* )
*/




/**
* @OA\Parameter(
*      parameter="general--page",
*      in="query",
*      name="page",
*      description="The current page for the result set, defaults to *1*",
*      @OA\Schema(
*          type="integer",
*          default=1,
*      )
* )
*/

/**
* @OA\Get(
*     path="/api/testing/{mytest}",
*     @OA\Parameter(
*          ref="#/components/parameters/general--page",
*     ),
*     @OA\Response(response="200", description="Display a listing of projects.")
* )
*/
