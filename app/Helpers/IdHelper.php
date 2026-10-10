<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

if (! function_exists('encryptId')) {
    function encryptId($id): string
    {
        $encrypted = Crypt::encryptString((string) $id);

        return rtrim(strtr($encrypted, '+/', '-_'), '=');
    }
}

if (! function_exists('decryptId')) {
    function decryptId(string $id): string
    {
        $id = strtr($id, '-_', '+/');
        $id .= str_repeat('=', (4 - strlen($id) % 4) % 4);

        try {
            return Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }
}