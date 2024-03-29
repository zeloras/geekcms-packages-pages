<?php

namespace GeekCms\Pages\Providers;

use GeekCms\PackagesManager\Support\ServiceProvider as MainServiceProvider;
use GeekCms\Pages\Models\Block;
use Illuminate\Support\Facades\Blade;

/**
 * Class InitServiceProvider.
 */
class InitServiceProvider extends MainServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function registerBladeDirective(): void
    {
        Blade::directive('getBlock', function ($arguments) {
            list($name) = explode(',', str_replace(['(', ')', '', "'"], '', $arguments));

            $block = Block::where('name', $name)->first();

            if ($block) {
                return $block->content_compile;
            }

            return null;
        });
    }

    public function registerProviders(): void
    {
        parent::registerProviders(); // TODO: Change the autogenerated stub
        $this->app->register(EventServiceProvider::class);
    }
}
