<?php

namespace App\Http\Controllers;

use App\Models\DTO;
use App\Services\Security\SecurityService;
use App\Services\Utility\MyLogger1;
use Exception;

class UsersRestController extends Controller
{
    
    private $service;
    private $logger;
    
    public function __construct(){
        $this->logger = MyLogger1::getLogger();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->logger->info("Entering UsersRestController Index()");
        try{
        $this->service = new SecurityService();
        $data = $this->service->getAllProfiles();
        $dto = new DTO(200, 'Getting all users UsersRestController@index()', $data);
        } catch (Exception $e){
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UsersRestController Index(), returning JSON Encoded DTO Model");
        return json_encode($dto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->logger->info("Entering UsersRestController show()");
        try{
        $this->service = new SecurityService();
        $data = $this->service->getUserProfile($id);
        $dto = new DTO(200, 'Getting user by user id=' . $id . ' UsersRestController@show()', $data);
        } catch (Exception $e){
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UsersRestController show(), returning JSON Encoded DTO Model");
        return json_encode($dto);
    }

}
