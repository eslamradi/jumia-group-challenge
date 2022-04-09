<?php

namespace App\Controllers;

use App\Lib\PhoneParser;
use App\Repositories\PhoneRepository;
use Core\Definitions\RequestInterface;
use Core\Lib\AbstractController;
use Core\Lib\Paginator;
use Core\Lib\Request;

class HomeController extends AbstractController
{
    /**
     * get customer phones and parse them into the required format and attach necessary data
     * @return mixed
     */
    public function index(Request $request, PhoneParser $parser, PhoneRepository $phoneRepository,Paginator $paginator) {
        $phones = $this->db->from('customer')->get('phone');
        $records = $parser->parse($phones);
        $filters = $request->queryString();
        if(!empty($filters)) {
            $phoneRepository->setRecords($records);
            $records = $phoneRepository->filterBy($filters);
        }
        $data = $paginator->paginate($records);
        // return json_encode($data, JSON_PRETTY_PRINT);
        return $this->renderer->load('index', $data);
    }
}