<?php

namespace App\Http\Controllers;

use App\Models\DTO;
use App\Services\Security\SecurityService;
use Exception;

class GroupsRestController extends Controller
{
    
    private $service;
    private $logger;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->logger->info("Entering GroupsRestController Index()");
        try{
        $this->service = new SecurityService();
        $data = $this->service->getAllGroups();
        } catch (Exception $e){
            $this->logger->info($e);
        }
        $dto = new DTO(200, 'Getting all groups GroupsRestController@index()', $data);
        return json_encode($dto);
    }
}
