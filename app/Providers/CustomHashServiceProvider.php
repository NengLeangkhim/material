<?php

namespace App\Providers;

use App\Http\Controllers\en_de;
use Illuminate\Hashing\HashServiceProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class CustomHashServiceProvider extends HashServiceProvider
{
    public function register()
    {
        $this->app->singleton('hash', function () {
            return new CustomHasher;
        });
    }
}

class CustomHasher implements HasherContract {
    /**
     * Get information about the given hashed value.
     *
     * @param  string  $hashedValue
     * @return array
     */
    public function info($hashedValue){
        // print_r(password_get_info($hashedValue));
        // return password_get_info($hashedValue);
    }

    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @return array   $options
     * @return string
     */
    public function make($value, array $options = array()) {
		//I have custom encoding / encryption here//
        //Define your custom hashing logic here//.
        $pass_en = en_de::aes_en($value,'1941a39eed11fdef7f9de6d597df9f4b');
        return $pass_en;
        // base64_encode(base64_encode($value));
    }

    /**
     * Check the given plain value against a hash.
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = array()) {

        return $value == "" ? false : $this->make($value) === $hashedValue;
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = array()) {
        return false;
    }

}
