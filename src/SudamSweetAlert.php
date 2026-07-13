<?php

namespace Sudam\SudamSweetAlert;

use Illuminate\Support\Facades\Session;

class SudamSweetAlert
{
    protected array $options = [];

    public function success(string $title, string $text = '', array $options = []): static
    {
        return $this->modal('success', $title, $text, $options);
    }

    public function error(string $title, string $text = '', array $options = []): static
    {
        return $this->modal('error', $title, $text, $options);
    }

    public function warning(string $title, string $text = '', array $options = []): static
    {
        return $this->modal('warning', $title, $text, $options);
    }

    public function info(string $title, string $text = '', array $options = []): static
    {
        return $this->modal('info', $title, $text, $options);
    }

    public function question(string $title, string $text = '', array $options = []): static
    {
        return $this->modal('question', $title, $text, $options);
    }

    public function toast(string $icon, string $title, array $options = []): static
    {
        $defaults = array_merge($this->designDefaults(), [
            'icon' => $icon,
            'title' => $title,
            'toast' => true,
            'position' => config('sudam-sweet-alert.toast_position', 'top-end'),
            'showConfirmButton' => false,
            'showCloseButton' => config('sudam-sweet-alert.show_close_button', true),
            'timer' => config('sudam-sweet-alert.toast_timer', 3000),
            'timerProgressBar' => true,
        ]);

        return $this->flash($defaults, $options);
    }

    protected function modal(string $icon, string $title, string $text, array $options): static
    {
        $defaults = array_merge($this->designDefaults(), [
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
            'position' => config('sudam-sweet-alert.position', 'center'),
            'showConfirmButton' => config('sudam-sweet-alert.show_confirm_button', true),
            'showCloseButton' => config('sudam-sweet-alert.show_close_button', true),
            'timer' => config('sudam-sweet-alert.timer'),
        ]);

        return $this->flash($defaults, $options);
    }

    /**
     * Shared visual defaults applied to every alert type.
     */
    protected function designDefaults(): array
    {
        return [
            'confirmButtonColor' => config('sudam-sweet-alert.confirm_button_color', '#3085d6'),
            'cancelButtonColor' => config('sudam-sweet-alert.cancel_button_color', '#d33'),
            'background' => config('sudam-sweet-alert.background'),
            'color' => config('sudam-sweet-alert.text_color'),
            'customClass' => config('sudam-sweet-alert.custom_class', []),
            'buttonsStyling' => config('sudam-sweet-alert.buttons_styling', true),
            'showClass' => [
                'popup' => 'animate__animated animate__fadeInDown animate__faster',
            ],
            'hideClass' => [
                'popup' => 'animate__animated animate__fadeOutUp animate__faster',
            ],
        ];
    }

    protected function flash(array $defaults, array $overrides): static
    {
        // Remove null values so SweetAlert2 uses its own internal defaults
        $this->options = array_filter(
            array_merge($defaults, $overrides),
            fn($value) => $value !== null
        );

        Session::flash('sudam-sweet-alert', $this->options);

        return $this;
    }

    public function timer(int $milliseconds): static
    {
        return $this->mergeOption('timer', $milliseconds);
    }

    public function position(string $position): static
    {
        return $this->mergeOption('position', $position);
    }

    public function showConfirmButton(bool $show = true): static
    {
        return $this->mergeOption('showConfirmButton', $show);
    }

    public function showCloseButton(bool $show = true): static
    {
        return $this->mergeOption('showCloseButton', $show);
    }

    protected function mergeOption(string $key, mixed $value): static
    {
        $this->options[$key] = $value;
        Session::flash('sudam-sweet-alert', $this->options);

        return $this;
    }
}
