<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\WebsiteVisit;
use Symfony\Component\HttpFoundation\Response;

class TrackWebsiteVisits
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Track only successful GET requests for non-admin, non-asset paths
        if ($request->isMethod('GET') && !$request->is('admin*') && !$request->is('login') && !$request->ajax()) {
            try {
                $userAgent = $request->header('User-Agent') ?? '';
                
                $deviceType = $this->detectDevice($userAgent);
                $browser = $this->detectBrowser($userAgent);
                $os = $this->detectOS($userAgent);

                // Map page name based on route or path
                $pageName = $request->route() ? $request->route()->getName() : $request->path();
                if (!$pageName || $pageName === '/') {
                    $pageName = 'Beranda';
                } else {
                    $pageName = ucfirst(trim($request->path(), '/'));
                }

                WebsiteVisit::create([
                    'session_id' => session()->getId(),
                    'ip_address' => $request->ip(),
                    'device_type' => $deviceType,
                    'browser' => $browser,
                    'operating_system' => $os,
                    'page_url' => $request->fullUrl(),
                    'page_name' => $pageName,
                    'visited_at' => now(),
                ]);
            } catch (\Throwable $e) {
                // Silently ignore visit logging errors to avoid breaking user experience
            }
        }

        return $response;
    }

    private function detectDevice(string $userAgent): string
    {
        if (preg_match('/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i', $userAgent)) {
            return 'tablet';
        }
        if (preg_match('/(mobile|iphone|ipod|blackberry|opera mini|iemobile|mobilephone)/i', $userAgent)) {
            return 'mobile';
        }
        return 'desktop';
    }

    private function detectBrowser(string $userAgent): string
    {
        if (preg_match('/Edge|Edg/i', $userAgent)) return 'Microsoft Edge';
        if (preg_match('/Chrome/i', $userAgent)) return 'Chrome';
        if (preg_match('/Safari/i', $userAgent)) return 'Safari';
        if (preg_match('/Firefox/i', $userAgent)) return 'Firefox';
        if (preg_match('/Opera|OPR/i', $userAgent)) return 'Opera';
        return 'Lainnya';
    }

    private function detectOS(string $userAgent): string
    {
        if (preg_match('/windows/i', $userAgent)) return 'Windows';
        if (preg_match('/android/i', $userAgent)) return 'Android';
        if (preg_match('/iphone|ipad|ipod/i', $userAgent)) return 'iOS';
        if (preg_match('/macintosh|mac os x/i', $userAgent)) return 'macOS';
        if (preg_match('/linux/i', $userAgent)) return 'Linux';
        return 'Lainnya';
    }
}
