<?php
/*
 *  Project Name: CST-256-CLC - Version: 2.0 The End
 *    Group Name: IDK
 *   Module Name: Default Module
 *   Programmers: Safa Bayraktar & Jacob Cauthren
 *          Date: 4/17/2021
 *
 *      Home Controller is a default controller therefore it can be included as default module, 
 *   this is where we set the account role into session.
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Exception;
use App\Services\Security\SecurityService;
use App\Services\Utility\MyLogger1;

class HomeController extends Controller
{

    private $logger;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->logger = MyLogger1::getLogger(); // initializing logger on create of HomeController
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->logger->info("Entering HomeController Index()");
        // if session is already started, avoid to start again
        try {
            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();// starts a session to set admin status either true or false, then return to home page
            }
            $isAdmin = $this->isAdmin(); // checks to see if user is admin
            if ($isAdmin == 1)
                $_SESSION['admin'] = true;
            else
                $_SESSION['admin'] = false;
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting HomeController Index() redirecting to home page...");
        
        return view('home');
    }

    public function isAdmin()
    {
        $this->logger->info("Entering HomeController isAdmin()");
        try {
            $service = new SecurityService();
            $userID = Auth::user()->id; // gets the user ID
                                        // within using user ID, goes through SecurityService to SecurityDAO, and
                                        // to get the isAdmin row and it's value either 1(true) or 0(false)
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting HomeController isAdmin() returning the value to index()...");

        return $service->isAdmin($userID);
    }
}
