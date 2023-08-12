<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(config('locale.status')){
            if(session()->has('locale') && array_key_exists(session('locale'),config('locale.languages'))) {
                App::setLocale(session('locale'));
            } else {
                $userLanguages = preg_split('/[,;]/',$request->server('HTTP_ACCEPT_LANGUAGE'));

                foreach ($userLanguages as $language) {
                    if(array_key_exists(session('locale'),config('locale.languages'))) {
                        App::setLocale($language);
                        setlocale(LC_TIME,config('local.languages')[$language][1]);
                        Carbon::setlocale(config('local.languages')[$language][0]);
                        if(config('local.languages')[$language][2]) {
                            session(['lang-ltr' => true]);
                        }else {
                            session()->forget('lang-rtl');
                        }
                        break;
                    }
                }
            }
        }

        return $next($request);
    }
}
