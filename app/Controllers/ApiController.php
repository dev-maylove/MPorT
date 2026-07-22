<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Services\AuthService;

class ApiController extends Controller
{
    private AuthService $auth;

    public function __construct()
    {
        parent::__construct();

        $this->auth = new AuthService();
    }

    public function status(): void
    {
        $this->response->json([
            'success' => true,
            'message' => 'API MPorT aktif',
            'version' => '1.0.0',
        ]);
    }

    public function login(): void
    {
        $input = $this->request->json();

        if ($input === []) {
            $this->response->json([
                'success' => false,
                'message' => 'Request JSON tidak valid.',
            ], 400);
        }

        $username = trim((string) ($input['username'] ?? ''));
        $password = (string) ($input['password'] ?? '');

        if ($username === '' || $password === '') {
            $this->response->json([
                'success' => false,
                'message' => 'Username dan password wajib diisi.',
            ], 422);
        }

        $user = $this->auth->login($username, $password);

        if ($user === null) {
            $this->response->json([
                'success' => false,
                'message' => 'Username atau password salah.',
            ], 401);
        }

        $this->response->json([
            'success' => true,
            'message' => 'Login berhasil.',
            'user' => $user,
        ]);
    }

    public function logout(): void
    {
        $this->auth->logout();

        $this->response->json([
            'success' => true,
            'message' => 'Logout berhasil.',
        ]);
    }

    public function paket(): void
    {
        $this->response->json([
            'success' => true,
            'data' => [],
            'message' => 'Data paket belum tersedia.',
        ]);
    }

    public function me(): void
    {
        $user = Session::get('user');

        if ($user === null) {
            $this->response->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 401);
        }

        $this->response->json([
            'success' => true,
            'user' => $user,
        ]);
    }
}
