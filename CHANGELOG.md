# Changelog

All notable changes to `sudam-sweet-alert` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2026-07-13

### Added
- Initial release
- Modal alerts: `success()`, `error()`, `warning()`, `info()`, `question()`
- Toast notifications via `toast()` with configurable position and auto-dismiss timer
- Session-flash based alert delivery — no manual JS wiring required
- Configurable close button, button colors, background, and text color
- Chainable option overrides: `->timer()`, `->position()`, `->showConfirmButton()`, `->showCloseButton()`
- Support for passing any raw SweetAlert2 option per call
- Publishable config file and Blade view
