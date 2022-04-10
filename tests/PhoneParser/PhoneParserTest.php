<?php

declare(strict_types=1);

namespace Tests\PhoneParser;

use App\Lib\PhoneParser;
use PHPUnit\Framework\TestCase;

class PhoneParserTest extends TestCase
{
    protected $parser;

    protected $feed;

    protected $countries;

    public function setUp(): void
    {

        $this->parser = new PhoneParser;

        $this->feed = [
            '(237) 677046616' => ['country' => 'Cameroon', 'state' =>    'OK',     'code' => '+237', 'number' =>    '677046616'],
            '(237) 6A0311634' => ['country' => 'Cameroon', 'state' =>    'NOK',     'code' => '+237', 'number' =>    '6A0311634'],
            '(251) 9773199405' => ['country' => 'Ethiopia', 'state' =>    'NOK',     'code' => '+251', 'number' =>    '9773199405'],
            '(251) 914701723' => ['country' => 'Ethiopia', 'state' =>    'OK',     'code' => '+251', 'number' =>    '914701723'],
            '(212) 698054317' => ['country' => 'Morocco', 'state' =>    'OK',     'code' => '+212', 'number' =>    '698054317'],
            '(212) 6546545369' => ['country' => 'Morocco', 'state' =>    'NOK',     'code' => '+212', 'number' =>    '6546545369'],
            '(258) 849181828' => ['country' => 'Mozambique', 'state' =>    'OK',     'code' => '+258', 'number' =>    '849181828'],
            '(258) 84330678235' => ['country' => 'Mozambique', 'state' =>    'NOK',     'code' => '+258', 'number' =>    '84330678235'],
            '(256) 775069443' => ['country' => 'Uganda', 'state' =>    'OK',     'code' => '+256', 'number' =>    '775069443'],
            '(256) 7503O6263' => ['country' => 'Uganda', 'state' =>    'NOK',     'code' => '+256', 'number' =>    '7503O6263'],
        ];

        $this->countries = [
            'Cameroon' => [
                'code' => '+237',
                'regex' => '\(237\)\ ?[2368]\d{7,8}$'
            ],
            'Ethiopia' => [
                'code' => '+251',
                'regex' => '\(251\)\ ?[1-59]\d{8}$'
            ],
            'Morocco' => [
                'code' => '+212',
                'regex' => '\(212\)\ ?[5-9]\d{8}$'
            ],
            'Mozambique' => [
                'code' => '+258',
                'regex' => '\(258\)\ ?[28]\d{7,8}$'
            ],
            'Uganda' => [
                'code' => '+256',
                'regex' => '\(256\)\ ?\d{9}$'
            ]
        ];
    }
    public function testPhoneParserCanParseSingle(): void
    {
        foreach ($this->feed as $phone => $result) {
            $parsedSingle =  $this->parser->parseSingle($phone, $this->countries, 'Phone parser single parsing error');
            $this->assertEquals($parsedSingle, $result);
        }
    }

    public function testPhoneParserCanParseBulk(): void
    {
        $bulkParsed =  $this->parser->parse(array_keys($this->feed), $this->countries);
        $this->assertEquals(array_values($this->feed), array_values($bulkParsed), 'Phone parser bulk parsing error');
    }
}
