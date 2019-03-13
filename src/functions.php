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
            chr(26) => "\\z",
            chr(8) => "\\b",
            '"' => '\"',
            "'" => "\'",
            '_' => "\_",
            "%" => "\%",
            '\\' => '\\\\'
        ];
        $c_string = '';
        foreach (str_split($unescaped_string) as $c) {
            if (in_array($c, array_keys($replacementMap))) {
                $c_string .= $replacementMap[$c];
            } else {
                $c_string .= $c;
            }
        }
        return $c_string;
    }
}