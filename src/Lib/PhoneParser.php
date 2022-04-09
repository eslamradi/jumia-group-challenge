<?php 

namespace App\Lib;

use Core\Definitions\ConfigInterface;

/**
 * Parser for phone numbers from database into required format
 */
class PhoneParser 
{

    public function parse($phones, $countries) {
        foreach($phones as $key => $phone) {
            $parsedPhone = $this->getParsedNumber($phone, $countries);
            $parsedPhones[$key] = $parsedPhone;
        }
        return $parsedPhones ?? [];
    }

    public function getParsedNumber($phone, $countries) {
        $parsed = [
            'state' => 'NOK'
        ];
        foreach($countries as $key => $country) {
            preg_match('/' . substr($country['regex'], 0, 10) . '/', $phone, $matches);
            
            if (sizeof($matches) > 0) {
                $parsed['country'] = $key;
                $parsed['code'] = $country['code'];
                
                preg_match('/' . $country['regex'] . '/', $phone, $matches);
                
                if (sizeof($matches) > 0) {
                    $parsed['state'] = 'OK';
                }
                break;
            }
        }
        $phoneExploded = explode(' ', $phone);
        $parsed['number'] = end($phoneExploded);
        return $parsed;
    }
}