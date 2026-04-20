# Basic PHP & PostgreSQL Auth

A basic authentication system featuring registration, login, and a protected dashboard.

## Tech Stack
* **Backend:** PHP
* **Database:** PostgreSQL
* **Styling:** Custom CSS

## Setup
1. Create a PostgreSQL table using the query in `database.sql`.
2. Rename `db.sample.php` to `db.php` and add your credentials.
3. Serve using XAMPP/Apache.

## Basic Authentication Documentation

**Introduction**

Basic Authentication is one of the simplest methods used to secure web applications and APIs. It involves sending a username and password with each request to verify the identity of the user. Although easy to implement, it has limitations in terms of security compared to more advanced methods like token-based authentication.

**Authentication Flow**

Login Request: The client sends a request with the username and password encoded in Base64.

Server Validation: The server decodes the credentials and checks them against the database.

Access Granted: If valid, the server allows access to protected resources.

Access Denied: If invalid, the server returns an error response (e.g., 401 Unauthorized).

**Implementation in Laravel**

Middleware: Create a middleware to intercept requests and validate credentials.

Routes Protection: Apply the middleware to routes that require authentication.

Database Check: Verify the username and password against stored records.

Example:

public function handle($request, Closure $next)
{
    $headers = $request->header('Authorization');
    if ($headers && preg_match('/Basic\s+(.*)$/i', $headers, $matches)) {
        $credentials = base64_decode($matches[1]);
        list($username, $password) = explode(':', $credentials, 2);

        if ($this->checkCredentials($username, $password)) {
            return $next($request);
        }
    }
    return response('Unauthorized', 401);
}

**Advantages**

Simplicity: Easy to implement and understand.

Compatibility: Supported by most HTTP clients and browsers.

Quick Setup: No need for complex token management.

**Limitations**

Security Risk: Credentials are sent with every request, making them vulnerable if not encrypted (must use HTTPS).

No Session Management: Does not support advanced features like token expiration or refresh.

Scalability Issues: Not ideal for large-scale applications.

**Recommendations**

Always use HTTPS to protect credentials.

Consider using more secure methods (e.g., JWT, OAuth) for production systems.

Use Basic Authentication only for simple or internal applications where security risks are minimal.

**Conclusion**

Basic Authentication provides a straightforward way to secure APIs but should be used cautiously. While it is useful for learning and small projects, modern applications often require more robust authentication mechanisms.
