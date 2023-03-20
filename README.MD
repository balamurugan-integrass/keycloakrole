
# Keycloak Role authorization

Api authorization for base on user Role

## Installation

Install package with composer

```bash
composer require bala/Keycloak-role-permission
```
    
Add Middleware to your kernal.php

```bash
protected $routeMiddleware = [
    ...
    'keycloak.role' => \Bala\Middleware\KeycloakRoleMiddleware::class
];
```

Add Variable to .env

```bash
KEYCLOAK_ROLE_CLIENT_ID="KEYCLOAK CLIENT ID"
```
## Usage

```javascript
Route::get('example-protected-api', [ExampleController::class, index])->middleware('keycloak.role:role')
```

