<?php
declare(strict_types = 1);

namespace Docsman\Model;

class Cryptography
{
    const METHOD = 'aes-256-ctr';

    /**
     * Encrypts a message
     *
     * @param string $message plaintext message
     * @param string $key encryption key (raw binary expected)
     * @param boolean $encode set to TRUE to return a base64-encoded
     * @return string raw binary or base64-encoded string
     */
    public static function encrypt($message, $key, $encode = false): string
    {
        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = random_bytes($nonceSize);

        $ciphertext = openssl_encrypt(
            $message,
            self::METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        if ($encode) {
            return base64_encode($nonce . $ciphertext);
        }

        return $nonce . $ciphertext;
    }

    /**
     * Decrypts a message
     *
     * @param string $message ciphertext message
     * @param string $key encryption key (raw binary expected)
     * @param boolean $encoded set to TRUE if the supplied message is base64-encoded
     * @throws CryptographyException
     *
     * @return string
     */
    public static function decrypt($message, $key, $encoded = false): string
    {
        if ($encoded) {
            $message = base64_decode($message, true);
            if ($message === false) {
                throw new CryptographyException('Decode failure (the given message is not a valid base64 string)');
            }
        }

        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');

        $plaintext = openssl_decrypt(
            $ciphertext,
            self::METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        return $plaintext;
    }
}
