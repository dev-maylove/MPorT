<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Logger;
use App\Core\Session;
use App\Services\AuthService;

class AuthController extends Controller
{
    private AuthService $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = new AuthService();
    }

    public function login(): void
    {
        requireGuest();

        $error = '';

        if ($this->request->isMethod('POST')) {

            csrf_verify();

            $username = trim((string) $this->request->post('username'));
            $password = (string) $this->request->post('password');

            if ($username === '' || $password === '') {

                $error = 'Username dan password wajib diisi.';

            } else {

                $user = $this->auth->login($username, $password);

                if ($user !== null) {

                    if (($user['role'] ?? '') === 'admin') {
                        $this->response->redirect('/admin');
                        return;
                    }

                    $this->response->redirect('/dashboard');
                    return;
                }

                $error = 'Username atau password salah.';
            }
        }

        $this->view('login/index', [
            'title' => 'Login',
            'error' => $error,
        ]);
    }

    public function logout(): void
    {
        $user = Session::get('user');

        if ($user !== null) {
            Logger::info('Logout', [
                'user_id' => $user['id'],
                'username' => $user['username'],
            ]);
        }

        $this->auth->logout();

        $this->response->redirect('/login');
    }
}
