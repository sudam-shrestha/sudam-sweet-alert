<?php

namespace Sudam\SudamSweetAlert;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SudamSweetAlertServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('sudam-sweet-alert')
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        $this->app->singleton('sudam-sweet-alert', fn () => new SudamSweetAlert());
    }
}
