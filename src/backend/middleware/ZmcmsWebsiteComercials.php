<?php
namespace Zmcms\WebsiteComercials\Backend\Middleware;
use Closure;use Session;use URL;class ZmcmsWebsiteComercials
{
	public function handle($request, Closure $next){
		return $next($request);
	}
}
