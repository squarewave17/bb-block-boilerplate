<?php

namespace Big_Bite\Block_Boilerplate;

/**
 * Runs the plugin setup sequence.
 *
 * @return void
 */
function setup(): void
{
    new Loader();
}
