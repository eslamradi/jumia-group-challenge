<?php 

namespace App\Lib;

use Core\Definitions\ConfigInterface;

/**
 * Parser for phone numbers from database into required format
 */
class PhoneParser 
{
    protected $countries;

    protected $cleanData;

    public function __construct($countries)
    {
        $this->countries = $countries;
    }

    public function parse($phones) {
        foreach($phones as $key => $phone) {
            $parsedPhone = $this->getParsedNumber($phone);
            $this->cleanData[$key] = $parsedPhone;
        }
        return $this->cleanData;
    }

    public function getParsedNumber($phone) {
        $parsed = [
            'state' => 'NOK'
        ];
        foreach($this->countries as $key => $country) {
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