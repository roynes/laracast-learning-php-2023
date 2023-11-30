<?php

use Core\Validator;

it('validates a string', function () {
    expect(Validator::string('foobar'))->toBe(true);
    expect(Validator::string(false))->toBe(false);
    expect(Validator::string(''))->toBe(false);
});

it('validates a string with a minimum of 20 characters', function () {
    expect(Validator::string('foobar', 20))->toBeFalse();
});

it('validates an email', function () {
    expect(Validator::email('this_is_not_an_email'))->toBeFalse();
    expect(Validator::email('test@test.com'))->toBeTrue();
});

it('validates that a numbber is greater than a given amount', function () {
    expect(Validator::greaterThan(1, 3))->toBeFalse();
    expect(Validator::greaterThan(3, 1))->toBeTrue();
});
