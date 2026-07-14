<?php

namespace Sudam\SudamSweetAlert;

use Illuminate\Support\Facades\Session;
use Sudam\SudamSweetAlert\Support\AlertOptionsBuilder;

class SudamSweetAlert
{
    protected array $options = [];

    public function success(string $title, string $text = '', array $options = []): static
    {
        return $this->flash(AlertOptionsBuilder::modal('success', $title, $text, $options));
    }

    public function error(string $title, string $text = '', array $options = []): static
    {
        return $this->flash(AlertOptionsBuilder::modal('error', $title, $text, $options));
    }

    public function warning(string $title, string $text = '', array $options = []): static
    {
        return $this->flash(AlertOptionsBuilder::modal('warning', $title, $text, $options));
    }

    public function info(string $title, string $text = '', array $options = []): static
    {
        return $this->flash(AlertOptionsBuilder::modal('info', $title, $text, $options));
    }

    public function question(string $title, string $text = '', array $options = []): static
    {
        return $this->flash(AlertOptionsBuilder::modal('question', $title, $text, $options));
    }

    public function toast(string $icon, string $title, array $options = []): static
    {
        return $this->flash(AlertOptionsBuilder::toast($icon, $title, $options));
    }

    protected function flash(array $options): static
    {
        $this->options = $options;
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
