<?php
// File: Template_Proj1/src/lib/Auth.php

class Auth {

    /**
     * Starts a secure session.
     */
    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            // Configure session cookies for better security
            session_set_cookie_params([
                'lifetime' => 3600,
                'path' => '/',
                'domain' => '', // Set your domain in production
                'secure' => isset($_SERVER['HTTPS']), // Only send cookie over HTTPS
                'httponly' => true, // Prevent JavaScript access to the session cookie
                'samesite' => 'Lax'
            ]);
            session_start();
        }
    }

    /**
     * Logs in a regular user.
     * @param User $user The User object to log in.
     */
    public static function login(User $user) {
        session_regenerate_id(true); // Prevent session fixation
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
    }

    /**
     * Logs in an admin.
     * @param Admin $admin The Admin object to log in.
     */
    public static function loginAdmin(Admin $admin) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin->id;
        $_SESSION['admin_email'] = $admin->email;
    }

    /**
     * Logs out the current user or admin and destroys the session.
     */
    public static function logout() {
        // Unset all session variables
        $_SESSION = [];

        // Delete the session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
    }

    /**
     * Checks if a regular user is logged in.
     * @return bool
     */
    public static function isUserLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    /**
     * Checks if an admin is logged in.
     * @return bool
     */
    public static function isAdminLoggedIn() {
        return isset($_SESSION['admin_id']);
    }

    /**
     * If no user is logged in, redirects to the login page.
     */
    public static function requireUserLogin() {
        if (!self::isUserLoggedIn()) {
            header('Location: log-in.php');
            exit();
        }
    }

    /**
     * If no admin is logged in, redirects to the admin login page.
     */
    public static function requireAdminLogin() {
        if (!self::isAdminLoggedIn()) {
            header('Location: admin-auth.php');
            exit();
        }
    }
}
?>
