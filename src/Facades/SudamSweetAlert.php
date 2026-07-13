<?php

namespace Sudam\SudamSweetAlert\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Sudam\SudamSweetAlert\SudamSweetAlert success(string $title, string $text = '', array $options = [])
 * @method static \Sudam\SudamSweetAlert\SudamSweetAlert error(string $title, string $text = '', array $options = [])
 * @method static \Sudam\SudamSweetAlert\SudamSweetAlert warning(string $title, string $text = '', array $options = [])
 * @method static \Sudam\SudamSweetAlert\SudamSweetAlert info(string $title, string $text = '', array $options = [])
 * @method static \Sudam\SudamSweetAlert\SudamSweetAlert question(string $title, string $text = '', array $options = [])
 *
 * @see \Sudam\SudamSweetAlert\SudamSweetAlert
 */
class SudamSweetAlert extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'sudam-sweet-alert';
    }
}
