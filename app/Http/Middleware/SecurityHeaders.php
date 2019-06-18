<?php

namespace App\Http\Middleware;

use Closure;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Блокируем MIME sniffing («вынюхивание MIME»), если загружается:
        // - образный ресурс, MIME­‑тип которого не JavaScript;
        // - стиль, MIME­‑тип которого не text/css.
        $response->header('X-Content-Type-Options', 'nosniff');

        // Запрещаем клиенту загружать сайт в элементах HTML iframe и object.
        $response->header('X-Frame-Options', 'DENY');

        // Разрешаем браузеру остановить загрузку страницы, если он заметит XSS.
        $response->header('X-XSS-Protection', '1; mode=block');
        $response->header("X-Content-Security-Policy", "default-src 'self' 'unsafe-inline' stackpath.bootstrapcdn.com code.jquery.com cdnjs.cloudflare.com fonts.googleapis.com fonts.gstatic.com");
        $response->header("Content-Security-Policy", "default-src 'self' 'unsafe-inline' stackpath.bootstrapcdn.com code.jquery.com cdnjs.cloudflare.com fonts.googleapis.com fonts.gstatic.com");
        $response->header("X-Webkit-CSP", "default-src 'self' 'unsafe-inline' stackpath.bootstrapcdn.com code.jquery.com cdnjs.cloudflare.com fonts.googleapis.com fonts.gstatic.com" );
        $response->header("strict-transport-security", "max-age=31536000' 'includeSubDomains' stackpath.bootstrapcdn.com code.jquery.com cdnjs.cloudflare.com fonts.googleapis.com fonts.gstatic.com" );
        // $response->header('Feature-Policy', 'vibrate "self"', 'geolocation "self"');
        // $response->header('Set-Cookie', 'vibrate "self"', 'geolocation "self"');

        return $response;
    }
}
