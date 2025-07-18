<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class Prisident extends Authenticatable implements MustVerifyEmail
    {
        use HasFactory, Notifiable;

        protected $fillable = ['name', 'email', 'email_verified_at', 'password'];
    }
