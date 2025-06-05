@component('mail::message')
# Welcome to Our App, {{ $user->name ?? 'User' }} 👋

Thanks for signing up!  
To complete your registration, please **verify your email address** by clicking the button below:

@component('mail::button', ['url' => $actionUrl])
Verify Email Address
@endcomponent

---

If you did **not** create this account, you can safely ignore this email.

Thanks,<br>
The {{ config('app.name') }} Team

---

If you're having trouble clicking the "Verify Email Address" button,  
copy and paste the URL below into your web browser:

**{{ $actionUrl }}**
@endcomponent
