<?php

    namespace App\Providers;

    use App\Models\Student;
    use App\Policies\StudentPolicy;
    use Illuminate\Support\Facades\Gate;
    use Illuminate\Support\ServiceProvider;

    class AuthServiceProvider extends ServiceProvider
    {
        /**
         * Register services.
         */
        public function register(): void
        {
            //
        }

        /**
         * Bootstrap services.
         */
        public function boot(): void
        {
            $this->register();

            // simple Gate checking if user is admin 
            Gate::define('access-admin-panel', function($user) {
                return $user->is_admin;
            });
        }

        // registering policies 
        protected $policies = [
            Student::class => StudentPolicy::class ,
        ];
    }
