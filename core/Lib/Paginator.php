<?php 

namespace Core\Lib;

class Paginator 
{
    /**
     * return pagination data
     *
     * @param array $records
     * @param integer $page
     * @param integer $limit
     * @return array
     */
    public function paginate(array $records, $page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        $data = array_slice($records, $offset, $limit, true);
        $pagesCount = ceil(count($records) / $limit);
        return [
            'currentPage' => $page,
            'pagesCount' => $pagesCount,
            'data' => $data,
            'total' => count($records)
        ];
    }
}