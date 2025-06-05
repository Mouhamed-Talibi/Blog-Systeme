<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class AppController extends Controller
    {
        // home page 
        public function home() {
            return view('home');
        }

        // register page
        public function register() {
            return view('register');
        }

        // submit registration
        public function submitRegistration(Request $request) {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                ]
            );
        }
    }
