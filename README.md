## Project Name
SPOTD is a robust web server built using Laravel with a structured N-Layer architecture, ensuring scalability and maintainability. I prioritize security with Laravel Sanctum API for robust authentication and authorization.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [Folder Structure](#folder-structure)
- [API Endpoints](#api-endpoints)
- [Authentication](#authentication)
- [Testing](#testing)

## Installation

Clone the repository:

```bash
git clone https://github.com/itsmejcb/spotd_server.git

cd spotd_server
```

Install Composer dependencies:

```bash
composer install
```

Copy the .env.example file and update the database credentials:

```bash
cp .env.example .env
php artisan key:generate
```

Update the .env file with your database configuration:
```bash
#for sqlite config for dont have sqlite file
touch database/database.sqlite
```
```dotenv
DB_CONNECTION=sqlite
#and disable the mysql config
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=your_database_name
#DB_USERNAME=your_database_username
#DB_PASSWORD=your_database_password

#for mysqli config
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Run database migrations and seeders:
```bash
php artisan migrate --seed
```

Install NPM dependencies and compile assets (if applicable):
```bash
npm install && npm run dev
```

## Usage
Start the Laravel development server:
```composer
//for default config
php artisan serve

//for custom host and port
php artisan serve --host=your_domain.com --port=your_custom_port_here_if_needed
```

## Folder Structure
This project follows an N-layer architecture:
```bash
/app
  /Http
    /Controllers
    /Requests
  /Providers
  /Services
  /Repositories
/config
/database
  /migrations
  /seeders
/resources
/routes
/tests
```

## API Endpoints
Define your API routes in routes/api.php and implement corresponding controller methods.
```php
// Example API endpoints

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignIn\AuthController;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
```

## Authentication
This project uses Sanctum for API authentication. Implement authentication logic in your controllers.
```php
// Example authentication using Sanctum in a controller method

use App\Http\Controllers\Controller;
use App\Http\Requests\SignIn\AuthRequest;
use App\Services\SignIn\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function auth(AuthRequest $request)
    {
        $user = $this->authService->authenticate($request->validated());

        if (!$user) {
            return response()->json(['message' => 'error occurred']);
        }

        $token = $this->authService->generateAccessToken($user);

        return $request->jsonResponse($user, $token);

    }

    public function logout(Request $request): JsonResponse
    {
        $this->authService->logout($request->user());

        return response()->json(['message' => 'Logged out successfully']);
    }
}

```

## Testing
Run tests using PHPUnit:
```bash
php artisan test
```
