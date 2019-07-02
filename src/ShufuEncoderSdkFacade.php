<?php

namespace Hoangstark\ShufuEncoderSdk;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hoangstark\ShufuEncoderSdk\Skeleton\SkeletonClass
 */
class ShufuEncoderSdkFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shufu-encoder-sdk';
    }
}
