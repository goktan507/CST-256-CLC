<?php

namespace App\Http\Controllers;

use App\Models\DTO;
use App\Services\Security\SecurityService;
use Exception;

class JobsRestController extends Controller
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
        $this->logger->info("Entering JobsRestController Index()");
        try{
        $this->service = new SecurityService();
        $data = $this->service->getAllJobs();
        $dto = new DTO(200, 'Getting all jobs JobsRestController@index()', $data);
        } catch (Exception $e){
            $this->logger->info($e);
        }
        $this->logger->info("Exiting JobsRestController Index(), returnin JSON Encoded DTO Model");
        return json_encode($dto);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $this->logger->info("Exiting JobsRestController show()");
        try{
        $this->service = new SecurityService();
        $data = $this->service->getJobsBySearch($search);
        $dto = new DTO(200, 'Getting Jobs where Job | Skill =' . $search . ' JobsRestController@show()', $data);
        } catch (Exception $e){
            $this->logger->error($e);
        }
        $this->logger->info("Exiting JobsRestController show(), returning JSON Encoded DTO Model");
        return json_encode($dto);
    }

}
