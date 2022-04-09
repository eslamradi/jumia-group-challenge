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
    public function paginate($queryString, array $records, $limit = 10) {
        $page = !empty($queryString['page']) ? $queryString['page'] : 1; 
        $offset = ($page - 1) * $limit;
        $data = array_slice($records, $offset, $limit, true);
        $pagesCount = ceil(count($records) / $limit);
        return [
            'currentPage' => $page,
            'pagesCount' => $pagesCount,
            'records' => $data,
            'total' => count($records),
            'links' => $this->buildUrlQuery($queryString, $page, $pagesCount)
        ];
    }

    public function buildUrlQuery($queryString, $page, $pagesCount) {
        $links = [];
        for ($i=1; $i <= $pagesCount; $i++) { 
            if($i == $page) {
                $links[] = '#';
            } else{
                $links[] = '?'. http_build_query(array_merge($queryString, ['page' => $i]));
            }
        }
        return $links;
    }
}