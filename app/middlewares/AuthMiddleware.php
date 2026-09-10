<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle(Closure $next)
    {
        $lava = lava_instance();

        if (!$lava->session->has_userdata('is_logged_in')) {
            redirect('/login');
            return;
        }

        return $next();
    }
}