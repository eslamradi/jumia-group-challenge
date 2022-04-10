<?php

declare(strict_types=1);

namespace Tests\PhoneRepository;

use App\Repositories\PhoneRepository;
use PHPUnit\Framework\TestCase;

class PhoneRepositoryTest extends TestCase
{
    protected $repository;

    protected $feed;

    public function setUp(): void
    {
        $this->repository = new PhoneRepository;

        $this->feed = [
            ['country' => 'Morocco',     'state' => 'NOK',     'code' => '+212', 'number' =>    '6007989253'],
            ['country' => 'Morocco',     'state' => 'OK',     'code' => '+212', 'number' =>    '698054317'],
            ['country' => 'Morocco',     'state' => 'NOK',     'code' => '+212', 'number' =>    '6546545369'],
            ['country' => 'Morocco',     'state' => 'NOK',     'code' => '+212', 'number' =>    '6617344445'],
            ['country' => 'Morocco',     'state' => 'OK',     'code' => '+212', 'number' =>    '691933626'],
            ['country' => 'Morocco',     'state' => 'OK',     'code' => '+212', 'number' =>    '633963130'],
            ['country' => 'Morocco',     'state' => 'OK',     'code' => '+212', 'number' =>    '654642448'],
            ['country' => 'Mozambique',     'state' => 'OK',     'code' => '+258', 'number' =>    '847651504'],
            ['country' => 'Mozambique',     'state' => 'OK',     'code' => '+258', 'number' =>    '846565883'],
            ['country' => 'Mozambique',     'state' => 'OK',     'code' => '+258', 'number' =>    '849181828'],
        ];
    }
    public function testPhoneRepositoryCanSet(): void
    {
        $this->repository->setRecords($this->feed);

        $records = $this->repository->filterBy([]);

        $this->assertEquals($records, $this->feed, 'phone repository doesnt return as expected');
    }

    public function testPhoneRepositoryCanFilterRecords(): void
    {
        $this->repository->setRecords($this->feed);
        $filters = [
            'country' => 'Mozambique'
        ];
        $this->assertFilters($filters, 3);

        $filters = [
            'country' => 'Morocco',
            'state' => 'OK'
        ];
        $this->assertFilters($filters, 4);
    }

    protected function assertFilters($filters, $expectedCount)
    {
        $records = $this->repository->filterBy($filters);
        foreach ($filters as $filter => $value) {
            foreach ($records as $record) {
                if ($record[$filter] != $value) {
                    $this->assertNotTrue(true);
                    break;
                }
            }
        }
        $this->assertEquals(count($records), $expectedCount, 'Phone repository Filters error');
    }
}
