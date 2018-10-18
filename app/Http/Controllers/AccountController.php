<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller {

    public function createAccount($email = "test1@gmail.com", $password = "bidbid", $firstName = "test", $lastName = "user", $phone = "12345678") {

        $jsonResponse = array();
        // First, check if username exist.
        $emails = DB::select('SELECT email FROM Users WHERE email = \''.$email.'\'');

        if (count($emails) >= 1) {
            $jsonResponse['statusCode'] = -1;
            $jsonResponse['statusDescription'] = 'Email Existed!';

        } else {
            $jsonResponse['statusCode'] = 1;

            DB::beginTransaction();


            $passwordHash = Hash::make($password);
            DB::insert("INSERT INTO Users (email, password, created_at, updated_at) VALUES ('".$email."', '".$passwordHash."', NOW(), NOW())");


            $id = DB::select("SELECT LAST_INSERT_ID() AS id;");
            DB::insert(
                "INSERT INTO UserInfos VALUES (".$id[0]->id.", '".$firstName."', '".$lastName."', '".$email."', '".$phone."');");


            DB::commit();

            $jsonResponse['statusDescription'] = 'Account Successfully Created!';
        }

        return json_encode($jsonResponse);
    }


    public function loginAccount($email = "test1@gmail.com", $password = "bidbid") {

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return "Success";
        } else {
            return "Failed";
        }
        /*
        $jsonResponse = array();

        $account = DB::select( "SELECT * FROM Logins WHERE Email = '".$email."';");

        if (count($account) == 0) {
            $jsonResponse['statusCode'] = -1;
            $jsonResponse['statusDescription'] = 'Account Not Found!';
        } else {
            $passwordHash = $account[0]->PasswordHash;

            if (password_verify($password, $passwordHash)) {
                $jsonResponse['statusCode'] = 1;
                $jsonResponse['statusDescription'] = 'Login Verified!';
            } else {
                $jsonResponse['statusCode'] = 0;
                $jsonResponse['statusDescription'] = 'Incorrect Password!';
            }
        }
        */
        //return json_encode($jsonResponse);
    }

    public function logoutAccount() {
        if (Auth::check()) {
            Auth::logout();

            if (!Auth::check()) {
                return "Logged out";
            } else {
                return "Failed to log out";
            }
        } else {
            return "No account to log out";
        }


    }

    public function isLoggedIn() {

        if (Auth::check()) {
            $user = Auth::user();
            return $user->email;

        } else {
            return "false";
        }

    }


    public function retrieveAccountInfo($email = "", $password = "") {



    }
}
