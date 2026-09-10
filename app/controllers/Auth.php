<?php

class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->model('User_model');
    }

public function login()
{
    if ($this->session->has_userdata('is_logged_in')) {
        redirect('/products');
    }

    $data['login_error'] = $this->session->flashdata('login_error');

    $this->call->view('auth/login', $data);
}

    public function authenticate()
    {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->User_model->find_by_username($username);

        if (!$user || !password_verify($password, $user['password'])) {
            $this->session->set_flashdata(
                'login_error',
                'Invalid username or password.'
            );

            redirect('/login');
            return;
        }

        if (isset($user['is_active']) && !$user['is_active']) {
            $this->session->set_flashdata(
                'login_error',
                'This account is inactive.'
            );

            redirect('/login');
            return;
        }

        $this->session->set_userdata([
            'user_id'      => $user['id'],
            'username'     => $user['username'],
            'role'         => $user['role'] ?? null,
            'is_logged_in' => true
        ]);

        redirect('/products');
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('/login');
    }
}