<?php declare(strict_types=1);

if (!function_exists('mysql_escape_string')) {
    /**
     * mysql_escape_string — Escapes a string for use in a mysql_query
     *
     * @link https://dev.mysql.com/doc/refman/8.0/en/string-literals.html#character-escape-sequences
     *
     * @param string $unescaped_string
     * @return string
     * @deprecated
     */
    function mysql_escape_string(string $unescaped_string): string
    {
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

        return \strtr($unescaped_string, $replacementMap);
    }
}
