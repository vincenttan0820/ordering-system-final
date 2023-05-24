<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

     public function index($id, $category_id = null)
     {
         // Check the user's role
       
     
         if($category_id == null)
         {
             $menu = Menu::get();
         }
         else
         {
             $menu = Menu::where('category_id', $category_id)->get();
         }
     
         $category=Category::get();
         $cart = Cart::where('user_id', $id)->where('status', 'pending')->first();
       
         return view('showMenu', compact('menu', 'category', 'cart', 'id'));
     }
     
    /**
     * User Profile
     * @param Nill
     * @return View Profile
     */
    public function getProfile()
    {
        return view('profile');
    }

    /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     */
    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|numeric|digits:10',
        ]);

        try {
            DB::beginTransaction();
            
            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
            ]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            
            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
    
    /**
     * SignUp
     * @param first name, last name, email, mobile number ,password of user
     * @return redirect to login page
     */
    public function userSignUp(Request $request)
    {
        $request->validate([
            'first_name'    => 'required | max:20',
            'last_name'     => 'required | max:20',
            'email'         => ['required | max:11', 'regex:/^.*(?=\D*\d)[0-9]'],
            'mobile_number' => 'required | max:20',
            'password'      => ['required', 'regex:/^.*[A-Za-z0-9!#%]{8,32}$']
        ]);

        $user = $request->input();
        $user['role_id'] = 2;
        $request->session()->flash('user',$user['first_name']);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect("login");
    }

    /**
     * Login
     * @param first name, email, password of user, password confirmation occurs
     * @return redirect to home page
     */
    public function userLogin(Request $request)
    {
        $request->validate([
            'first_name'    => 'required | max:20',
            'email'    => 'required | email',
            'password' => ['required | confirmed', 'regex:/^[A-Za-z0-9!#%]{8,32}$']
        ]);
        
        $username = $request->input('first_name');
        $request->session->put('first_name', $username);
        return redirect("home");
    }
}
