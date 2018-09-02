# Interview Task

The answers to the exercise Problems can be found in src/functions.php

### Test Cases

Test cases can be found in tests/FunctionsTest.php

To run the PHPUnit test cases, make sure you have Composer installed.

#### Install dependencies

```bash
# Install PHP dependencies using composer (PHPUnit) in this case.
$ composer install
```

#### Run the tests

```bash
$ php ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/
```
Which should return:

```text
PHPUnit 7.3.3 by Sebastian Bergmann and contributors.

....                                     4 / 4 (100%)

Time: 130 ms, Memory: 4.00MB

OK (4 tests, 11 assertions)
```