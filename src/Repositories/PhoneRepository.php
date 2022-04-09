<?php 

namespace App\Repositories;

/**
 * Phone repository for managing phone normalized values
 */
class PhoneRepository 
{
    /**
     * repository record list
     *
     * @var array
     */
    protected $records;

    /**
     * return available filters that the repository can be filtered by
     *
     * @return array
     */
    public function availableFilters() {
        return [
            'state', 'country'
        ];
    }

    /**
     * save the repository records
     *
     * @param array $records
     * @return void
     */
    public function setRecords(array $records) {
        $this->records = $records;
    }

    /**
     * filter repository by provided available filters
     *
     * @param array $filters
     * @return array
     */
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