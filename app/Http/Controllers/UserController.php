<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function AllUsers()
    {
        $cesaeInfo = $this->getCesaeInfo();
        $contacts = $this->getContacts();
        $users = $this->getAllUsersFromDB();
        // dd($users);
        // $contactPerson = DB::table('users')->where('name', 'Rita')->first();
        // dd($contactPerson);
        
    //    $this->deleteUserFromDB(4);

        // $this->updateUserAtDB();

        return view('users.all_users', compact('cesaeInfo', 'contacts', 'users'));
    }

    public function AddUsers()
    {
        // $this->insertUserIntoDB();
        return view('users.add_users');
    }


    public function getCesaeInfo()
    {
        $cesaeInfo = [
            'name' => 'CESAE',
            'address' => 'Rua do Xpto',
            'adddress' => 'Rua do Cesae',
        ];

        return $cesaeInfo;
    }

    public function getContacts()
    {
        $contacts = [
            ['id' => 1, 'name' => 'Filipa', 'phone' => '912890789'],
            ['id' => 2, 'name' => 'Joel', 'phone' => '912890789'],
            ['id' => 3, 'name' => 'Rita', 'phone' => '912890789'],
        ];
        return $contacts;
    }

    public function insertUserIntoDB()
    {
        DB::table('users')->insert(
        [
            'name' => 'Filipa Santos',
            'email' => 'filipa.santos@gmail.com',
            'password' => '123456',
        ]);

        return response()->json( 'User inserted successfully');
    }

    public function updateUserAtDB()
    {
        // DB::table('users')->where('id', 1)->update([
        //     'address' => 'Rua Nova da Filipa',
        //     'updated_at' => now(),
        // ]);

        DB::table('users')->where('id', 1)->update(['email' => 'filipa.santos@gmail.com']);
    }

    public function getAllUsersFromDB()
    {
        $users = DB::table('users')
        ->get();

        return $users;
    }

    public function deleteUserFromDB($id)

    {   DB::table('tasks')->where('user_id', $id)->delete();
        DB::table('users')->where('id', $id)->delete();
        return back();
    }


    public function getUserById($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        // dd($user);
        return view('users.user_details', compact('user'));
    }


    public function addUserIntoDB(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
    
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('users.show')->with('success', 'User added successfully');
    }
    

    
}