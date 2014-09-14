<?php namespace SvperCRM\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind(
            'SvperCRM\Repositories\OrganizationRepositoryInterface',
            'SvperCRM\Repositories\DbOrganizationRepository'
        );
    }
}
