<?php

    namespace App\Http\Controllers;

    use App\Models\Prisident;
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;

    class PrisidentController extends Controller
    {
        // Show registration form
        public function showRegistrationForm()
        {
            return view('president.register');
        }

        // Handle registration submission
        public function register(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:prisidents',
                'password' => 'required|string|confirmed|min:8',
            ]);

            $president = Prisident::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($president));

            return redirect()->route('email.verify');
        }

        // verify email 
        public function verifyEmail() {
            return view('emails.verify');
        }

        // verify 
        public function verify(EmailVerificationRequest $request) {
            $request->fulfill();
            return redirect('/students')->with('success', 'Your Email Has been Verified Successfully !');
        }

        // send email verification
        public function sendEmailVerification(Request $request) {
            $request->user()->sendEmailVerificationNotification();
            return back()->with('success', 'Verification Link Sent Successfully !');
        }
    }
