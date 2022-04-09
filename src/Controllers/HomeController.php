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
        $queryString = $request->queryString();
        if(!empty($queryString)) {
            $phoneRepository->setRecords($records);
            $records = $phoneRepository->filterBy($queryString);
        }
        $data = $paginator->paginate($queryString, $records);
        return json_encode($data, JSON_PRETTY_PRINT);
        // return $this->renderer->load('index', $data);
    }
}