# Laravel Learn Initial


## [File System](https://laravel.com/docs/11.x/structure#the-bootstrap-directory)

- `app` directory: here he will live all source code of the app, in this directory you will find the following:
    - `Console`: contains all custom artisan commands, the command file is created in this directory and they are register in the `Kernel.php` file. Example
        ```php
        //app/Console/Commands/ExampleCommand.php
        namespace App\Console\Commands;

        use Illuminate\Console\Command;

        class ExampleCommand extends Command
        {
            protected $signature = 'example:command';
            protected $description = 'This is an example command';

            public function __construct()
            {
                parent::__construct();
            }

            public function handle()
            {
                $this->info('Example command executed successfully!');
            }
        }
        ```
    - `Exceptions`: app exceptions are handled here, contains all custom exceptions. Example
        ```php
        // app/Exceptions/CustomException.php
        namespace App\Exceptions;

        use Exception;

        class CustomException extends Exception
        {
            public function report()
            {
                // Custom reporting logic
            }

            public function render($request)
            {
                return response()->view('errors.custom', [], 500);
            }
        }
        ```
    - `Http`: In this diorectory is located all logic related to handling http requests
        - `Controllers`: It contains all the controllers of the aplication, the controllers are responsible for handling http requests and returning reponses. Example
            ```php
            // app/Http/Controllers/ExampleController.php
            namespace App\Http\Controllers;

            use Illuminate\Http\Request;

            class ExampleController extends Controller
            {
                public function index()
                {
                    return view('example.index');
                }
            }
            ```
        - `Middleware`: It contains all the Middleware of the aplication, the middleware `intercepts` http requests to perform various tasks `before` the request reaches the `controller`, these tasks may involve data validation, login token authentication validation, etc. Example
            ```php
            //app/Http/Middleware/ExampleMiddleware.php
            namespace App\Http\Middleware;

            use Closure;

            class ExampleMiddleware
            {
                public function handle($request, Closure $next)
                {
                    // Custom logic before request is handled by controller
                    return $next($request);
                }
            }
            ```
    - `Models`: Contains all models of the `Eloquent ORM` of the aplication. The models represent the tables of the database and are used for interact with data. Example
        ```php
        //app/Models/User.php
        namespace App\Models;

        use Illuminate\Foundation\Auth\User as Authenticatable;
        use Illuminate\Notifications\Notifiable;

        class User extends Authenticatable
        {
            use Notifiable;

            protected $fillable = [
                'name', 'email', 'password',
            ];

            protected $hidden = [
                'password', 'remember_token',
            ];
        }
        ```
    - `Policies`: Contain authorization policies. Authorization policies determine what can do actions a user in a model. Example
        ```php
        // app/Policies/ExamplePolicy.php
        namespace App\Policies;

        use App\Models\User;
        use App\Models\Model;
        use Illuminate\Auth\Access\HandlesAuthorization;

        class ExamplePolicy
        {
            use HandlesAuthorization;

            public function view(User $user, Model $model)
            {
                return $user->id === $model->user_id;
            }

            public function update(User $user, Model $model)
            {
                return $user->id === $model->user_id;
            }
        }
        ```
    - `Providers`: It contains all services providers of the application. The providers are backbone of the application and load various services and components. Example
        ```php
        // app/Providers/AppServiceProvider.php
        namespace App\Providers;

        use Illuminate\Support\ServiceProvider;

        class AppServiceProvider extends ServiceProvider
        {
            public function register()
            {
                // Register services
            }

            public function boot()
            {
                // Bootstrap any application services
            }
        }
        ```
    
- `bootstrap` directory: This directory contains `app.php` file which bootstrapp framework, and contain `cache` directory for takes care of application performance

- `config` directory: Contains all configurations files of your application, this files contains key settings that control the database connection, cache options, session configuration. Load environment variables. Example
    ```php
    return [
        'name' => env('APP_NAME', 'Laravel'),
        'env' => env('APP_ENV', 'production'),
        'debug' => env('APP_DEBUG', false),
        'url' => env('APP_URL', 'http://localhost'),
        // Otros parámetros de configuración
    ];
    ```
- `database` directory: main directory of the database, contains db migrations, factories and seeders.
    - `factories`: the factories are used to generate test data in database. Example
        ```php
        //database/factories/UserFactory.php
        namespace Database\Factories;

        use App\Models\User;
        use Illuminate\Database\Eloquent\Factories\Factory;
        use Illuminate\Support\Str;

        class UserFactory extends Factory
        {
            protected $model = User::class;

            public function definition()
            {
                return [
                    'name' => $this->faker->name,
                    'email' => $this->faker->unique()->safeEmail,
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'), // password
                    'remember_token' => Str::random(10),
                ];
            }
        }
        ```
    - `migrations`: Migrations define and modify the structure of database tables. Laravel provides an API to define these modifications. Example
        ```php
        // database/migrations/2024_01_01_000000_create_users_table.php
        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;
        
        class CreateUsersTable extends Migration
        {
            public function up()
            {
                Schema::create('users', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
                    $table->string('email')->unique();
                    $table->timestamp('email_verified_at')->nullable();
                    $table->string('password');
                    $table->rememberToken();
                    $table->timestamps();
                });
            }

            public function down()
            {
                Schema::dropIfExists('users');
            }
        }
        ```

    - `seeders`: The seeders are used for `populate` the database with initial data, this is useful for `testing` application, they execute all files in the `factories` directory. Example
        ```php
        // database/seeders/DatabaseSeeder.php

        namespace Database\Seeders;

        use App\Models\User;
        // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
        use Illuminate\Database\Seeder;

        class DatabaseSeeder extends Seeder
        {
            /**
            * Seed the application's database.
            */
            public function run(): void
            {
                // User::factory(10)->create();

                User::factory()->create([
                    'name' => 'Test User',
                    'email' => 'test@example.com',
                ]);
            }
        }
        ```
- `public` directory: this directory contain `index.php` file, which is the entry point for all requests your application receives and contains images files, js and css.

- `resources` directory: This directory contains all frontend `resources`. for example this directory contain:
    - views: The application views, wearing `blade template language`.
        ```php
        //resources/views/welcome.blade.php
        <!DOCTYPE html>
        <html>
            <head>
                <title>Laravel</title>
            </head>
            <body>
                <h1>Welcome to Laravel</h1>
            </body>
        </html>
        ```
    - lang: Lang files for the localizations.
        ```php
        // resources/lang/en/messages.php
        return [
            'welcome' => 'Welcome to our application!',
            'login' => 'Login',
            'register' => 'Register',
        ];

        // resources/lang/es/messages.php
        return [
            'welcome' => '¡Bienvenido a nuestra aplicación!',
            'login' => 'Iniciar sesión',
            'register' => 'Registrarse',
        ];
        ```
    - js: Javascript files for all the frontend functionality.
        ```js
        require('./bootstrap');
        window.Vue = require('vue');

        const app = new Vue({
            el: '#app',
        });
        ```
    - sass: Files SCSS for the styles.
        ```scss
        // resources/sass/app.scss
        // Import Bootstrap styles
        @import '~bootstrap/scss/bootstrap';

        body {
            font-family: 'Nunito', sans-serif;
        }
        ```
    - views/vendor: Custom Views from third party packages
    - views/components: Reusable Blade components.
        ```php
        // resources/views/components/alert.blade.php
        <div class="alert alert-{{ $type }}">
            {{ $slot }}
        </div>
        ```
    - views/layouts: Design templates to be extended by other views.
        ```php
        <!DOCTYPE html>
        <html>
            <head>
                <title>@yield('title')</title>
            </head>
            <body>
                <div class="container">
                    @yield('content')
                </div>
            </body>
        </html>
        ```

- `routes` directory: This directory contains all of the route definitions for your application. These file define how HTTP requests are mapped to specific controller. These files are common in this directory.
    - `web.php`: Contain the web routes of the application. This file which provides session state, and cookie encryption
        ```php
        use Illuminate\Support\Facades\Route;

        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::middleware(['auth'])->group(function () {
            Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        });
        ```
    - `api.php`: Contain the `API` routes for the application . This file which provides `JSON` response handling. Example
        ```php
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Route;

        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();
        });

        Route::get('/posts', [App\Http\Controllers\Api\PostController::class, 'index']);
        Route::post('/posts', [App\Http\Controllers\Api\PostController::class, 'store']);
        Route::get('/posts/{id}', [App\Http\Controllers\Api\PostController::class, 'show']);
        Route::put('/posts/{id}', [App\Http\Controllers\Api\PostController::class, 'update']);
        Route::delete('/posts/{id}', [App\Http\Controllers\Api\PostController::class, 'destroy']);
        ```
    - `channels.php`: Contains the routes of the `event transmission channels` in real time.
        ```php
        use Illuminate\Support\Facades\Broadcast;

        Broadcast::channel('order.{orderId}', function ($user, $orderId) {
            return (int) $user->id === (int) \App\Models\Order::find($orderId)->user_id;
        });
        ```
    - `console.php`: Console commands definitions, exceute `php artisan inspire` in cmd
        ```php
        use Illuminate\Foundation\Inspiring;
        use Illuminate\Support\Facades\Artisan;

        Artisan::command('inspire', function () {
            $this->comment(Inspiring::quote());
        })->describe('Display an inspiring quote');
        ```

- `storage` directorory: This directory contain all compilation blade template, file based sessions,  file caches, and other files generated by the framework.

- `tests` directory: The tests directory contains your automated tests. Example Pest or PHPUnit unit tests and feature tests are provided out of the box.

- `vendor` directory: The vendor directory contains your Composer dependencies.


## Management and Routes Definition

- Route GET request 
    ```php
    Rute::get('/api', function(){
        return "Hola";
    })
    ```
- Dynamic Route:
    ```php
    Rute::get('/api/{slug}', function($slug){
        return $slug;
    })
    ```

- Query Route:
    ```php
    // import 
    use Illuminate\Http\Request;
    Rute::get('/search', function(Request $req){
        return $req->all();
    })
    ```
