<?php

namespace App\Models;

// 1. Panggil class yang dibutuhkan Filament
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 2. Tambahkan "implements FilamentUser" di sini
class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 3. Tambahkan fungsi sakti ini.
    // Fungsi ini yang bertugas membuka pintu gerbang di Production.
    public function canAccessPanel(Panel $panel): bool
    {
        // Ganti 'email_anda@gmail.com' dengan email yang SUDAH Anda daftarkan.
     return $this->email === 'yukasa2005@gmail.com';
        
        // Atau jika ingin membolehkan SEMUA user masuk (Hati-hati!):
        // return true; 
    }
}