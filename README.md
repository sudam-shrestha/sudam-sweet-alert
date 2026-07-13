# Sudam Sweet Alert

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sudam-shrestha/sudam-sweet-alert.svg?style=flat-square)](https://packagist.org/packages/sudam-shrestha/sudam-sweet-alert)
[![GitHub Tests Action Status](https://github.com/sudam-shrestha/sudam-sweet-alert/actions/workflows/run-tests.yml/badge.svg)](https://github.com/sudam-shrestha/sudam-sweet-alert/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sudam-shrestha/sudam-sweet-alert.svg?style=flat-square)](https://packagist.org/packages/sudam-shrestha/sudam-sweet-alert)

A modern, actively maintained [SweetAlert2](https://sweetalert2.github.io/) wrapper for Laravel 12. Fire beautiful modal alerts and toasts straight from your controllers using session flash data — no manual JS wiring required.

Built as a fresh alternative to older SweetAlert packages that are no longer maintained.

## Features

- Simple, chainable API: `success()`, `error()`, `warning()`, `info()`, `question()`, `toast()`
- Built-in toast notifications with sensible defaults (top-right, auto-dismiss)
- Configurable close button, colors, background, and animation on every alert
- Per-call option overrides — any SweetAlert2 option can be passed through
- Zero database/migrations required — pure session flash, works out of the box

## Installation

You can install the package via composer:

```bash
composer require sudam-shrestha/sudam-sweet-alert
```

Publish the config file with:

```bash
php artisan vendor:publish --tag="sudam-sweet-alert-config"
```

This is the contents of the published config file:

```php
return [
    // Modal alert defaults
    'position' => 'center',
    'timer' => null,
    'show_confirm_button' => true,

    // Toast defaults
    'toast_position' => 'top-end',
    'toast_timer' => 3000,

    // Design — applies to both modals and toasts
    'show_close_button' => true,
    'confirm_button_color' => '#3085d6',
    'cancel_button_color' => '#d33',
    'background' => null,
    'text_color' => null,
    'buttons_styling' => true,
    'custom_class' => [],

    'cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11',
];
```

Optionally, publish the views to customize the alert markup:

```bash
php artisan vendor:publish --tag="sudam-sweet-alert-views"
```

Finally, add this once to your main layout, right before `</body>`:

```blade
@include('sudam-sweet-alert::alert')
```

## Usage

Import the facade:

```php
use Sudam\SudamSweetAlert\Facades\SudamSweetAlert;
```

### Modal alerts

```php
SudamSweetAlert::success('Saved!', 'Your changes have been saved.');
SudamSweetAlert::error('Failed', 'Something went wrong.');
SudamSweetAlert::warning('Careful', 'This action cannot be undone.');
SudamSweetAlert::info('Heads up', 'Here is something you should know.');
SudamSweetAlert::question('Are you sure?', 'This will delete the record.');

return redirect()->back();
```

### Toast notifications

```php
SudamSweetAlert::toast('success', 'Saved successfully!');
```

By default, toasts appear top-right and auto-dismiss after 3 seconds.

### Overriding options per call

Any [SweetAlert2 option](https://sweetalert2.github.io/#configuration) can be passed as the last argument:

```php
SudamSweetAlert::error('Failed', 'Could not save record.', [
    'position' => 'bottom-start',
    'timer' => 5000,
    'showCloseButton' => false,
]);
```

### Chainable helpers

```php
SudamSweetAlert::success('Saved!')
    ->timer(4000)
    ->position('top-end')
    ->showCloseButton(false);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sudam Shrestha](https://github.com/sudam-shrestha)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
