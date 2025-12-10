<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor; // Import Model

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil IP Pengunjung
        $ip = $request->ip();

        // Cek Database: Jika IP belum ada, simpan.
        // firstOrCreate akan otomatis mengecek duplikat.
        Visitor::firstOrCreate(
            ['ip_address' => $ip], // Kunci pencarian
            ['user_agent' => $request->userAgent()] // Data tambahan jika baru dibuat
        );

        return $next($request);
    }
}