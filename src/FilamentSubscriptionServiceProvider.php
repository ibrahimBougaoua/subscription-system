<?php

namespace IbrahimBougaoua\FilamentSubscription;

use IbrahimBougaoua\FilamentSubscription\Pages\ManageSubscriptionPage;
use IbrahimBougaoua\FilamentSubscription\Pages\PlansPage;
use IbrahimBougaoua\FilamentSubscription\Commands\FilamentSubscriptionCommand;
use IbrahimBougaoua\FilamentSubscription\Resources\FeatureResource;
use IbrahimBougaoua\FilamentSubscription\Resources\PlanResource;
use IbrahimBougaoua\FilamentSubscription\Resources\PlanSubscriptionsResource;
use IbrahimBougaoua\FilamentSubscription\Widgets\SubscriptionsOverview;
use Spatie\LaravelPackageTools\Package;
use Filament\PluginServiceProvider;

class FilamentSubscriptionServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'tailwindcss-styles' => __DIR__ . '/../dist/css/style.css',
    ];

    protected array $scripts = [
        //'tailwindcss-scripts' => __DIR__ . '/../dist/js/tailwindcss.js',
    ];

    protected array $resources = [
        PlanResource::class,
        FeatureResource::class,
        PlanSubscriptionsResource::class,
    ];

    protected array $pages = [
        ManageSubscriptionPage::class,
        PlansPage::class,
    ];

    protected array $widgets = [
        SubscriptionsOverview::class,
    ];

    public function packageBooted(): void
    {
        parent::packageBooted();

        //$user = User::find(1);
        //$user->newSubscription('Test','test','Test','2023-07-15 18:55:38.000000','2023-07-15 18:55:38.000000','2023-07-15 18:55:38.000000','2023-07-15 18:55:38.000000','2023-07-15 18:55:38.000000','',1);
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-subscriptions')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament_subscriptions_table')
            ->hasCommand(FilamentSubscriptionCommand::class);
    }
}
