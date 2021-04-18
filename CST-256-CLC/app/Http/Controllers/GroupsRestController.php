<?php
/*
 *  Project Name: CST-256-CLC - Version: 2.0 The End
 *    Group Name: IDK
 *   Module Name: Group's Rest Module
 *   Programmers: Safa Bayraktar & Jacob Cauthren
 *          Date: 4/17/2021
 *
 *      Group's Rest module returns all the Groups stored on Database in JSON formatized view.
 */

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
