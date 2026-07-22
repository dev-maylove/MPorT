<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    /**
     * Beranda
     */
    public function index(): void
    {
        $this->view('home/index', [
            'title' => 'MandalaNet ISP 2026',
        ]);
    }

    /**
     * Paket Internet
     */
    public function paket(): void
    {
        $this->view('home/paket', [
            'title' => 'Paket Internet',
        ]);
    }

    /**
     * Dashboard User
     */
    public function dashboard(): void
    {
        $this->view('dashboard/index', [
            'title' => 'Dashboard',
        ]);
    }

    /**
     * Dashboard Admin
     */
    public function adminDashboard(): void
    {
        $this->view('admin/dashboard', [
            'title' => 'Dashboard Admin',
        ]);
    }

    /**
     * Kelola Pelanggan
     */
    public function adminPelanggan(): void
    {
        $this->view('admin/pelanggan', [
            'title' => 'Kelola Pelanggan',
        ]);
    }

    /**
     * Kelola Paket
     */
    public function adminPaket(): void
    {
        $this->view('admin/paket', [
            'title' => 'Kelola Paket',
        ]);
    }

    /**
     * Kelola Tagihan
     */
    public function adminTagihan(): void
    {
        $this->view('admin/tagihan', [
            'title' => 'Kelola Tagihan',
        ]);
    }

    /**
     * Kelola Pembayaran
     */
    public function adminPembayaran(): void
    {
        $this->view('admin/pembayaran', [
            'title' => 'Kelola Pembayaran',
        ]);
    }

    /**
     * Kelola Pengguna
     */
    public function adminPengguna(): void
    {
        $this->view('admin/pengguna', [
            'title' => 'Kelola Pengguna',
        ]);
    }

    /**
     * Pengaturan
     */
    public function adminPengaturan(): void
    {
        $this->view('admin/pengaturan', [
            'title' => 'Pengaturan',
        ]);
    }

    /**
     * Laporan
     */
    public function adminLaporan(): void
    {
        $this->view('admin/laporan', [
            'title' => 'Laporan',
        ]);
    }
}
