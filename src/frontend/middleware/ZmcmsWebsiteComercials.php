<?php
namespace Zmcms\WebsiteComercials\Frontend\Middleware;
use Closure;use Session;use URL;class ZmcmsWebsiteComercials
{
	public function handle($request, Closure $next){
		return $next($request);
	}
}
