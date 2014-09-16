<?php namespace SvperCRM\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind(
            'SvperCRM\Repositories\OrganizationRepositoryInterface',
            'SvperCRM\Repositories\DbOrganizationRepository'
        );

        $this->app->bind(
            'SvperCRM\Repositories\PersonRepositoryInterface',
            'SvperCRM\Repositories\DbPersonRepository'
        );

        $this->app->bind(
            'SvperCRM\Repositories\ContractRepositoryInterface',
            'SvperCRM\Repositories\DbContractRepository'
        );

        $this->app->bind(
            'SvperCRM\Repositories\RetainerRepositoryInterface',
            'SvperCRM\Repositories\DbRetainerRepository'
        );

        $this->app->bind(
            'SvperCRM\Repositories\CredentialRepositoryInterface',
            'SvperCRM\Repositories\DbCredentialRepository'
        );
    }
}
