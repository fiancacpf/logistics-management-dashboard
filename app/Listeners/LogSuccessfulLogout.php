<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Request;
use App\Models\AccessLog;
use Illuminate\Support\Facades\Http;

class LogSuccessfulLogout
{
    public function handle(Logout $event)
    {
        $request = request();

        try {
            $response = Http::timeout(3)->get("http://ip-api.com/json/{$request->ip()}");

            if ($response->successful()) {
                $geo = $response->json();
            } else {
                $geo = [];
            }
        } catch (\Exception $e) {
            $geo = [];
        }

        $country = $geo['country'] ?? null;
        $city = $geo['city'] ?? null;

        AccessLog::create([
            'user_id'    => $event->user->id,
            'action'     => 'logout',
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'country'    => $country,
            'city'       => $city,
        ]);
    }
}
