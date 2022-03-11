<?php
namespace App\Http\Controllers\API\Authentification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;
use App\Models\User;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends BaseController
{

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $auth = Auth::user();
            $success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken;
            $success['name'] =  $auth->name;

            return $this->handleResponse($success, 'User logged-in!');
        }
        else{
            return $this->handleError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        $success['password'] =  $user->password;
        $success['created_at'] =  $user->created_at->format('d/m/Y');

        return $this->handleResponse($success, 'User successfully registered!');
    }


    public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();
    return response()->json(['You have successfully logged out and the token was successfully deleted' => true]);
}

/*
	 * Get authenticated user details
	*/
	public function getAuthenticatedUser(Request $request) {
		return $request->user();
	}

    public function index()
    {
        $client = User::all();
        return $this->handleResponse(UserResource::collection($client), 'user have been retrieved!');
    }

}
