<?php

namespace Paulinhoajr\Sicredi;

interface Environment
{
    /**
     * Gets the environment's Api URL
     *
     * @return the Api URL
     */
    public function getApiUrl();

    /**
     * Gets the environment's Api Query URL
     *
     * @return the Api Query URL
     */
    public function getApiQueryURL();
}
