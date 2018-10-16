<?php

namespace Library;

use Library\Exception\WrongTypeException;

abstract class DataManager implements DataManagerInterface
{

    private static $data = [];

    // Override
    abstract protected static function onOpen();
    abstract protected static function onClose();

    public static function open()
    {
        static::onOpen();
    }

    public static function close()
    {
        static::onClose();
        unset(self::$data[self::getClass()]);
    }

    private static function getClass(): string
    {
        $class = explode('\\', strtolower(get_called_class()));
        $class = $class[count($class)-1];
        return $class;
    }

    protected static function setData($data): bool
    {
        // Making sure it's associative array
        self::$data[self::getClass()] = json_decode(json_encode($data), true);
        return true;
    }

    protected static function getData()
    {
        return self::$data[self::getClass()];
    }

    private static function set(string $key, $value): bool
    {
        $parsed = explode('.', $key);
        $data =& self::$data[self::getClass()];
        while (count($parsed) > 1) {
            $next = array_shift($parsed);
            if (!isset($data[$next]) || !is_array($data[$next])) {
                $data[$next] = [];
            }
            $data =& $data[$next];
        }
        $data[array_shift($parsed)] = $value;
        return true;
    }

    private static function get(string $key)
    {
        $parsed = explode('.', $key);
        $data = self::getData();
        while ($parsed) {
            $next = array_shift($parsed);
            if (isset($data[$next])) {
                $data = $data[$next];
            } else {
                return null;
            }
        }
        return $data;
    }

    public static function setString(string $key, string $value): bool
    {
        $response = self::set($key, $value);
        return $response;
    }

    public static function setInteger(string $key, int $value): bool
    {
        $response = self::set($key, $value);
        return $response;
    }

    public static function setBoolean(string $key, bool $value): bool
    {
        $response = self::set($key, $value);
        return $response;
    }

    public static function setArray(string $key, array $values): bool
    {
        $response = self::set($key, $values);
        return $response;
    }

    public static function getString(string $key): string
    {
        $response = self::get($key);
        if (!is_string($response)) {
            throw new WrongTypeException();
        }
        return $response;
    }

    public static function getInteger(string $key): int
    {
        $response = self::get($key);
        if (!is_int($response)) {
            throw new WrongTypeException();
        }
        return $response;
    }

    public static function getBoolean(string $key): bool
    {
        $response = self::get($key);
        if (!is_bool($response)) {
            throw new WrongTypeException();
        }
        return $response;
    }

    public static function has(string $key): bool
    {
        $response = self::get($key);
        return $response != null ? true : false;
    }

    public static function remove(string $key): bool
    {
        $parsed = explode('.', $key);
        $data = self::getData();
        while (count($parsed) > 1) {
            $next = array_shift($parsed);
            if (!isset($data[$next]) || !is_array($data[$next])) {
                $data[$next] = [];
            }
            $data =& $data[$next];
        }
        unset($data[array_shift($parsed)]);
        self::setData($data);
        return true;
    }

    public static function match(string $key, $match): bool
    {
        $item = self::get($key);
        if ($item == null) {
            return false;
        }
        try {
            if ($item == $match) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function prepend(string $key, string $value): bool
    {
        $response = self::setString($key, $value.self::getString($key));
        return $response;
    }

    public static function append(string $key, string $value): bool
    {
        $response = self::setString($key, self::getString($key).$value);
        return $response;
    }

    public static function uppercase(string $key): bool
    {
        $response = self::setString($key, strtoupper(self::getString($key)));
        return $response;
    }

    public static function lowercase(string $key): bool
    {
        $response = self::setString($key, strtolower(self::getString($key)));
        return $response;
    }

    public static function iterate(string $key): bool
    {
        $response = self::setInteger($key, self::getInteger($key) + 1);
        return $response;
    }

    public static function add(string $key, int $value): bool
    {
        $response = self::setInteger($key, self::getInteger($key) + $value);
        return $response;
    }

    public static function subtract(string $key, int $value): bool
    {
        $response = self::setInteger($key, self::getInteger($key) - $value);
        return $response;
    }

    public static function multiply(string $key, int $value): bool
    {
        $response = self::setInteger($key, self::getInteger($key) * $value);
        return $response;
    }

    public static function divide(string $key, int $value): bool
    {
        $response = self::setInteger($key, self::getInteger($key) / $value);
        return $response;
    }

    public static function toggle(string $key): bool
    {
        $response = self::setBoolean($key, !self::getBoolean($key));
        return $response;
    }

}
