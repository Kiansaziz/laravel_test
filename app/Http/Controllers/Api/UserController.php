<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/user",
    *      tags={"user"},
    *     @OA\Response(response="200", description="Display a listing of users."),
    *     @OA\Parameter(
     *         name="app_key",
     *         in="header",
     *         description="insert app key",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
    * )
    */

    public function index()
    {
      $data = User::all();

      return response()->json($data);
    }

    /**
     * @OA\Post(
     *      path="/api/user",
     *      operationId="storeUser",
     *      tags={"user"},
     *      summary="Store new user",
     *      description="Returns user data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *     @OA\Parameter(
     *         name="app_key",
     *         in="header",
     *         description="insert app key",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     * )
     */
    public function store(Request $request)
    {
      try {
        $create = User::create($request->all());
        return response()->json(['data' => $create , 'status' => 500]);
      } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage() ,'status' => 500]);
      }
    }

    /**
     * @OA\Get(
     *      path="/api/user/{id}",
     *      operationId="geUserById",
     *      tags={"user"},
     *      summary="Get user information",
     *      description="Returns user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *     @OA\Parameter(
     *         name="app_key",
     *         in="header",
     *         description="insert app key",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     * )
     */

    public function find($id)
    {
      $data = User::find($id);
      if ($data != null) {
        return response()->json(['data' => $data , 'status' => 200]);
      }
      return response()->json(['message' => 'Data Not Found !' ,'status' => 500]);
    }


    /**
    * @OA\Put(
    *      path="/api/user/{id}",
    *      operationId="updateUser",
    *      tags={"user"},
    *      summary="Update existing user",
    *      description="Returns updated user data",
    *      @OA\Parameter(
    *          name="id",
    *          description="User id",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/User")
    *      ),
    *      @OA\Response(
    *          response=202,
    *          description="Successful operation",
    *          @OA\JsonContent(ref="#/components/schemas/User")
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      @OA\Response(
    *          response=404,
    *          description="Resource Not Found"
    *      ),
    *     @OA\Parameter(
    *         name="app_key",
    *         in="header",
    *         description="insert app key",
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    * )
    */

    public function update(Request $request , $id)
    {
      $data = User::find($id);
      if ($data != null) {
        $data->update($request->all());
        return response()->json(['data' => $data , 'status' => 200]);
      }
      return response()->json(['message' => 'Data Not Found !' ,'status' => 500]);
    }

    /**
     * @OA\Delete(
     *      path="/api/user/{id}",
     *      operationId="deleteUserById",
     *      tags={"user"},
     *      summary="Delete user information",
     *      description="Returns true or false",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *     @OA\Parameter(
     *         name="app_key",
     *         in="header",
     *         description="insert app key",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     * )
     */
    public function delete($id)
    {
      $data = User::find($id);
      if ($data != null) {
        $data->delete();
        return response()->json($data);
      }

      return response()->json(['message' => 'Data Not Found !' ,'status' => 500]);
    }


}
