
# Keycloak Role authorization

Api authorization for base on user Role

## Installation

Install package with composer

```bash
composer require bala/Keycloak-roles-permission
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
KEYCLOAK_ROLE_CLIENT="KEYCLOAK CLIENT ID"
```
## Usage

Authorize api with role
```javascript
Route::get('example-protected-api', [ExampleController::class, 'index'])->middleware('keycloak.role:role name')
```

Authorize api with any role
```javascript
Route::get('example-protected-api', [ExampleController::class, 'index'])->middleware('keycloak.role:role1|role2')
```



