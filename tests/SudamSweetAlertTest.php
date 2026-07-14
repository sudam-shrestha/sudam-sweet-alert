<?php

use Sudam\SudamSweetAlert\Facades\SudamSweetAlert;

it('flashes a success alert with correct icon and title', function () {
    SudamSweetAlert::success('Saved!', 'All good.');

    expect(session('sudam-sweet-alert'))
        ->toMatchArray([
            'icon' => 'success',
            'title' => 'Saved!',
            'text' => 'All good.',
        ]);
});

it('flashes an error alert', function () {
    SudamSweetAlert::error('Failed', 'Something went wrong.');

    expect(session('sudam-sweet-alert'))
        ->toMatchArray([
            'icon' => 'error',
            'title' => 'Failed',
        ]);
});

it('flashes a warning alert', function () {
    SudamSweetAlert::warning('Careful', 'This cannot be undone.');

    expect(session('sudam-sweet-alert')['icon'])->toBe('warning');
});

it('flashes an info alert', function () {
    SudamSweetAlert::info('Heads up');

    expect(session('sudam-sweet-alert')['icon'])->toBe('info');
});

it('flashes a question alert', function () {
    SudamSweetAlert::question('Are you sure?');

    expect(session('sudam-sweet-alert')['icon'])->toBe('question');
});

it('flashes a toast with correct defaults', function () {
    SudamSweetAlert::toast('success', 'Saved successfully!');

    expect(session('sudam-sweet-alert'))
        ->toMatchArray([
            'icon' => 'success',
            'title' => 'Saved successfully!',
            'toast' => true,
            'position' => 'top-end',
            'showConfirmButton' => false,
            'timer' => 3000,
            'timerProgressBar' => true,
        ]);
});

it('allows overriding toast options per call', function () {
    SudamSweetAlert::toast('error', 'Oops', [
        'position' => 'bottom-start',
        'timer' => 5000,
    ]);

    expect(session('sudam-sweet-alert'))
        ->toMatchArray([
            'position' => 'bottom-start',
            'timer' => 5000,
        ]);
});

it('allows chaining timer, position and close button overrides', function () {
    SudamSweetAlert::success('Saved!')
        ->timer(4000)
        ->position('top-end')
        ->showCloseButton(false);

    expect(session('sudam-sweet-alert'))
        ->toMatchArray([
            'timer' => 4000,
            'position' => 'top-end',
            'showCloseButton' => false,
        ]);
});

it('applies design defaults like close button visibility to every alert', function () {
    SudamSweetAlert::info('Test');

    expect(session('sudam-sweet-alert'))
        ->toHaveKey('showCloseButton');
});

it('does not flash null values into the session', function () {
    SudamSweetAlert::success('Saved!');

    expect(session('sudam-sweet-alert'))
        ->not->toHaveKey('background')
        ->not->toHaveKey('color');
});
