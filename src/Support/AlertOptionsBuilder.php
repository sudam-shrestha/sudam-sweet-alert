<?php

namespace Sudam\SudamSweetAlert\Support;

class AlertOptionsBuilder
{
    public static function modal(string $icon, string $title, string $text, array $overrides = []): array
    {
        $defaults = array_merge(self::designDefaults(), [
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
            'position' => config('sudam-sweet-alert.position', 'center'),
            'showConfirmButton' => config('sudam-sweet-alert.show_confirm_button', true),
            'showCloseButton' => config('sudam-sweet-alert.show_close_button', true),
            'timer' => config('sudam-sweet-alert.timer'),
        ]);

        return self::clean($defaults, $overrides);
    }

    public static function toast(string $icon, string $title, array $overrides = []): array
    {
        $defaults = array_merge(self::designDefaults(), [
            'icon' => $icon,
            'title' => $title,
            'toast' => true,
            'position' => config('sudam-sweet-alert.toast_position', 'top-end'),
            'showConfirmButton' => false,
            'showCloseButton' => config('sudam-sweet-alert.show_close_button', true),
            'timer' => config('sudam-sweet-alert.toast_timer', 3000),
            'timerProgressBar' => true,
        ]);

        return self::clean($defaults, $overrides);
    }

    protected static function designDefaults(): array
    {
        return [
            'confirmButtonColor' => config('sudam-sweet-alert.confirm_button_color', '#3085d6'),
            'cancelButtonColor' => config('sudam-sweet-alert.cancel_button_color', '#d33'),
            'background' => config('sudam-sweet-alert.background'),
            'color' => config('sudam-sweet-alert.text_color'),
            'customClass' => config('sudam-sweet-alert.custom_class', []),
            'buttonsStyling' => config('sudam-sweet-alert.buttons_styling', true),
            'showClass' => ['popup' => 'animate__animated animate__fadeInDown animate__faster'],
            'hideClass' => ['popup' => 'animate__animated animate__fadeOutUp animate__faster'],
        ];
    }

    protected static function clean(array $defaults, array $overrides): array
    {
        return array_filter(
            array_merge($defaults, $overrides),
            fn($value) => $value !== null
        );
    }
}
