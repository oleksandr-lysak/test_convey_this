<?php
namespace App\Services;

use App\Models\Domain;
use Illuminate\Support\Facades\Auth;

class DomainService
{
    public function sanitizeDomain($url)
    {
        $url = preg_replace('/^https?:\/\//', '', $url);
        $url = preg_replace('/^www\./', '', $url);
        return explode('/', $url)[0];
    }

    public function processAndSaveDomain(string $rawDomain): Domain
    {
        $cleanDomain = $this->sanitizeDomain($rawDomain);
        return Auth::user()->domain()->updateOrCreate([], ['domain' => $cleanDomain]);
    }
}
