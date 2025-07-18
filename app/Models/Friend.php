<?php

    namespace App\Models;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Notifications\Notifiable;

    class Friend extends Authenticatable implements MustVerifyEmail
    {
        use Notifiable;

        protected $fillable = ['name', 'email', 'password'];

        protected $hidden = ['password'];
    }

