<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use \App\Models\User;
use \App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index()
    {
        //here we get all the existing users to display
        //TODO: Come back and use an Eloquent join for this query and group by roles so you dont have to fetch roles separately
        //TODO: This will also make sure the query is secure as Eloquent uses PDO and the DB facade doesn't.
        //TODO: Also, how do u query a one-to-many or many-to-many relationship so that you get one result on one side with many on the other?

        //Only super-admin users are allowed to manage users, but admin users are allowed thru coz of the grouped admin route, hence
        //we need to kick admins out of here
        if (Auth::user()->hasRole('super-admin'))
        {
            $users = DB::select(DB::raw("SELECT u.id, u.name, u.email, r.id as role_id, r.name as role_name 
                FROM users u
                LEFT JOIN role_to_user r2u
                ON u.id = r2u.user_id
                LEFT JOIN roles r
                ON r2u.role_id = r.id"));

            //get the user roles into an array
            $usersRoles = [];
            foreach($users as $user)
            {
                $usersRoles[$user->id][] = $user->role_name;
            }



            return view('admin.users.users')->with(['users' => $users, 'roles' => $usersRoles]);
        }
        else
        {
            flash('You are not authorized')->warning();
            return redirect('/home');
        }


    }





    public function create()
    {
        //Only super-admin users are allowed to manage users, but admin users are allowed thru coz of the grouped admin route, hence
        //we need to kick admins out of here
        if (Auth::user()->hasRole('super-admin'))
        {
            //get all existing roles
            $roles = Role::all();

            return view('admin.users.create_users')->with([
                'allRoles' => $roles
            ]);
        }
        else
        {
            flash('You are not authorized')->warning();
            return redirect('/home');
        }
    }





    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'roles' => 'required|array',
        ]);

        //validation was successful

        $user = new User();
        //first of all check if that provided email is already registered in the DB
        if ($user::where('email', $request->email)->first())
        {
            flash('That email is already registered with us')->error();
            return redirect('admin/create_user');
        }
        else
        {
            //save the user and make sure to get their last inserted ID
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            if ($user->save()) {
                $user_id = $user->id;
                //TODO: save the roles in a loop from the roles array submitted using their user_id retrieved above
                //now update the table with newly submitted values
                foreach($request->roles as $roleId) {
                    DB::table('role_to_user')->insert(array('user_id' => $user_id, 'role_id' => $roleId));
                }

                flash('The user was saved successfully')->success();
                return redirect('admin/users');
            }
        }

    }





    public function showEdit($userId)
    {
        //Only super-admin users are allowed to manage users, but admin users are allowed thru coz of the grouped admin route, hence
        //we need to kick admins out of here
        if (Auth::user()->hasRole('super-admin'))
        {
            //here we get all the existing users to display
            //TODO: Come back and use an Eloquent join for this query and group by roles so you dont have to fetch roles separately
            //TODO: This will also make sure the query is secure as Eloquent uses PDO

            $users = DB::select(DB::raw("select u.id, u.name, u.email, r2u.user_id, r.id as role_id, r.name as role_name 
            from users u, role_to_user r2u, roles r 
            where u.id = $userId
            and u.id = r2u.user_id
                and r.id = r2u.role_id
            group by u.id, u.name, u.email, r2u.user_id, r.id, r.name"));

            //get all existing roles anyway
            $roles = Role::all();

            //get the user roles into an array. If the user has many roles, there will be more than one record, so loop
            $usersRoles = [];
            foreach($users as $user)
            {
                $usersRoles[$user->role_id] = $user->role_name;
            }

            return view('admin.users.edit_users')->with([
                'user' => $user,
                'usersRoles' => $usersRoles,
                'allRoles' => $roles
            ]);
        }
        else
        {
            flash('You are not authorized')->warning();
            return redirect('/home');
        }
    }



    public function update(Request $request)
    {
        $user = new User();

        //update the user
        $user_update = $user::where('id', '=', $request->userId)
            ->update(array
                (
                    'name' => $request->name,
                    'email' => $request->email
                )
            );

        //update the roles
        //First, with pivot tables, it's best to delete all recs
        $delete = DB::delete("DELETE FROM role_to_user WHERE user_id = $request->userId");

        //now update the pivot table with newly submitted values
        foreach($request->roles as $roleId) {
            DB::table('role_to_user')->insert(array('user_id' => $request->userId, 'role_id' => $roleId));
        }

        //return redirect()->route('admin/users');
        return redirect('admin/users');
    }





    public function destroy(User $user)
    {
        //delete the roles first
        //$deleteRoles = DB::delete("DELETE FROM role_to_user WHERE user_id = $user->id");
        $user->roles()->detach();

        $user->delete();

        return redirect('admin/users');
    }




}
