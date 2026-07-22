<?php

declare(strict_types=1);

namespace App\Core;

class Controller
{
    protected Request $request;
    protected Response $response;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
    }

    protected function view(string $view, array $data = []): void
    {
        // Mencegah variabel penting tertimpa
        extract($data, EXTR_SKIP);

        $base = dirname(__DIR__) . '/Views';

        // File view
        $viewFile = $base . '/' . $view . '.php';

        if (!file_exists($viewFile)) {

            http_response_code(500);

            Logger::error('View tidak ditemukan', [
                'view' => $view,
            ]);

            exit('500 Internal Server Error');
        }

        // Render view ke buffer
        ob_start();

        require $viewFile;

        $content = ob_get_clean();

        // Layout utama
        $layout = $base . '/layouts/main.php';

        if (!file_exists($layout)) {

            http_response_code(500);

            Logger::error('Layout tidak ditemukan', [
                'layout' => 'layouts/main.php',
            ]);

            exit('500 Internal Server Error');
        }

        require $layout;
    }
}
