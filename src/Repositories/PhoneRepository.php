<?php 

namespace App\Repositories;

class PhoneRepository 
{
    protected $records;

    public function availableFilters() {
        return [
            'state', 'country'
        ];
    }

    public function setRecords(array $records) {
        $this->records = $records;
    }

    public function filterBy($filters) {
        $filtered = $this->records;
        foreach($filters as $key => $filter) {
            if(in_array($key, $this->availableFilters())){
                $filtered = array_filter(
                    $filtered, 
                    fn($v, $k) => $v[$key] == $filter,
                    ARRAY_FILTER_USE_BOTH);
            }
        }
        return $filtered;
    }
}