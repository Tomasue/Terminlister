<?php

namespace Library;

interface DataManagerInterface
{

    // Open and close
    public static function open();
    public static function close();

    // Setters
    public static function setString(string $key, string $value): bool;
    public static function setInteger(string $key, int $value): bool;
    public static function setBoolean(string $key, bool $value): bool;
    public static function setArray(string $key, array $values): bool;

    // Getters
    public static function getString(string $key): string;
    public static function getInteger(string $key): int;
    public static function getBoolean(string $key): bool;

    // Has, remove and match
    public static function has(string $key): bool;
    public static function remove(string $key): bool;
    public static function match(string $key, $match): bool;

    // String utility
    public static function prepend(string $key, string $value): bool;
    public static function append(string $key, string $value): bool;
    public static function uppercase(string $key): bool;
    public static function lowercase(string $key): bool;

    // Integer utility
    public static function iterate(string $key): bool;
    public static function add(string $key, int $value): bool;
    public static function subtract(string $key, int $value): bool;
    public static function multiply(string $key, int $value): bool;
    public static function divide(string $key, int $value): bool;

    // Boolean utility
    public static function toggle(string $key): bool;

}
