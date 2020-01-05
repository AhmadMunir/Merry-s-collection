<?php
namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "AS6yMkPP1YEQ_1RPmSItB_hnP8uthx2dEREmoMSg9MMLiKebZ4VFRYbiOnKhR4nFoBYlr25YKcEiWgXl";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EIwQWr68T99yeLfiknzSkcqSiFGGWEZPEvLa87cLae1Tn07zbP0oeqA6Uwsja71VWNhxjpR22otzfLu9";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
?>
