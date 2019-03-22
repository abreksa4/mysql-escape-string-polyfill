mysql-escape-string-polyfill
----------------------------
[![Build Status](https://travis-ci.org/abreksa4/mysql-escape-string-polyfill.svg?branch=master)](https://travis-ci.org/abreksa4/mysql-escape-string-polyfill)
[![codecov](https://codecov.io/gh/abreksa4/mysql-escape-string-polyfill/branch/master/graph/badge.svg)](https://codecov.io/gh/abreksa4/mysql-escape-string-polyfill)

mysql-escape-string-polyfill is a very insecure `mysql_escape_string` implementation (PHP 7.1/7.2) for a very limited use case 

# Usage
1. Install this package via composer: `composer require andrewbreksa/mysql-escape-string-polyfill`
2. Find all the places you use the `mysql_*` functions, and refactor your code to use PDO

# Limitations
- Uses the following map to replace characters in a string:
    ```php
    $replacementMap = [
        "\0" => "\\0",
        "\n" => "\\n",
        "\r" => "\\r",
        "\t" => "\\t",
        chr(26) => "\\Z",
        chr(8) => "\\b",
        '"' => '\"',
        "'" => "\'",
        '_' => "\_",
        "%" => "\%",
        '\\' => '\\\\'
    ];
    ```
- Not very comprehensively tested, this will be an ongoing effort as new edge cases are discovered

# Hacking on the complex source code
The implementation can be found in [functions.php](./src/functions.php), and you can run tests by executing `composer test`
