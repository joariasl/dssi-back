<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;

class AuthenticateController extends Controller
{
    /**
     * Log in
     * Create token for user
     *
     * @param Request $request
     */
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('username', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function invalidate(Request $request) {
        JWTAuth::parseToken()->invalidate();
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function user(Request $request) {
        $user = JWTAuth::parseToken()->toUser();
        return $user;
    }

    /**
     * Get all permissions for user
     *
     * @param Request $request
     * @return array
     */
    public function permissions(Request $request) {
        $user = JWTAuth::parseToken()->toUser();
        $permissions=[];
        // Permissions in user
        foreach($user->permissions()->get() as $permission){
            if(!in_array($permission->name, $permissions)){
                $permissions[]=$permission->name;
            }
        }
        // Permissions in roles for users
        foreach($user->roles()->get() as $role){
            foreach($role->permissions()->get() as $permission){
                if(!in_array($permission->name, $permissions)){
                    $permissions[]=$permission->name;
                }
            }
        }
        return $permissions;
    }
}
