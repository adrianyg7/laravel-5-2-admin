<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Collection::macro('tree', function ($name, $delimiter = '.', $baseval = false) {
            $array = array_combine($this->pluck($name)->all(), $this->all());
            $splitRE   = '/' . preg_quote($delimiter, '/') . '/';
            $returnArr = [];

            foreach ($array as $key => $val) {
                // Get parent parts and the current leaf
                $parts  = preg_split($splitRE, $key, -1, PREG_SPLIT_NO_EMPTY);
                $leafPart = array_pop($parts);

                // Build parent structure
                // Might be slow for really deep and large structures
                $parentArr = &$returnArr;
                foreach ($parts as $part) {
                    if ( ! isset($parentArr[$part]) ) {
                        $parentArr[$part] = [];
                    }
                    elseif ( ! is_array($parentArr[$part]) ) {
                        if ($baseval) {
                            $parentArr[$part] = ['__base_val' => $parentArr[$part]];
                        } else {
                            $parentArr[$part] = [];
                        }
                    }
                    $parentArr = &$parentArr[$part];
                }

                // Add the final part to the structure
                if (empty($parentArr[$leafPart])) {
                    $parentArr[$leafPart] = $val;
                } elseif ($baseval && is_array($parentArr[$leafPart])) {
                    $parentArr[$leafPart]['__base_val'] = $val;
                }
            }

            return $returnArr;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
