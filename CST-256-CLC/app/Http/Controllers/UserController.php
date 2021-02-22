<?php

namespace App\Http\Controllers;

use App\Services\Security\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $service;
    public function __construct(){
        $this->service =  new SecurityService();    //initializing SecurityService on create of UserController
    }
    
    public function getUserProfile(){
        $userID = Auth::user()->id;     //gets the user ID from Auth
        $data = $this->service->getUserProfile($userID);    //using User ID, get's user's profile passing value to SecurityService
        return view('profile', $data);  //returns to profile page with the user profile information stored in data array
    }
    
    public function updateUserProfile(){
        // creates a data array including user profiles posted from edit profile page
        $data = [
            'userID' => Auth::user()->id,
            'phonenumber' => $_POST['phonenumber'],
            'address' => $_POST['address'],
            'biography' => $_POST['biography']
        ];
        $this->service->updateUserProfile($data);   //sends the posted data to SecurityService update function
        return view('profile', $data);  //returns page with the same data array meaning that update is always succeesful 
    }
    
    public function getAllProfiles(){
        $data = $this->service->getAllProfiles();   //calls the security service to get all profiles to display in admin Module
        return view('adminAllProfiles')->with('data', $data);   //returns to the admin page with all the user information stored in data array
    }
    
    public function editSelectedProfile(){  
        $userID = $_POST['userID'];     //admin function, gets the hidden key userID from the form method post 
        $data = $this->service->editSelectedProfile($userID);       //using the userID, passes the value to security service
        return view('adminEditSelectedProfile')->with('data', $data);   //update is always successful, no validation, returns the same data array
    }
    
    public function adminUpdateSelectedProfile(){
        //creates a data array with all the posted values from admin edit form 
        $data = [
            'userID' => $_POST['userID'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'isAdmin' => $_POST['isAdmin'],
            'phonenumber' => $_POST['phonenumber'],
            'address' => $_POST['address'],
            'biography' => $_POST['biography']
        ];
        $this->service->adminUpdateSelectedProfile($data);  //passes all the information stored in data array to security service
        return $this->getAllProfiles();
    }
    
    public function adminSuspendProfile(){
        $userID = $_POST['userID']; //in order to suspend correct user, gets the user ID from the form as hidden key
        $this->service->adminSuspendProfile($userID);    //passes the userID to security service
        return $this->getAllProfiles();     //return to admin module by getting all the active profiles on cite.
    }
    
    public function adminDeleteProfile(){
        $userID = $_POST['userID']; //in order to delete correct user, gets the user ID from the form as hidden key
        $this->service->adminDeleteProfile($userID);    //passes the userID to security service
        return $this->getAllProfiles();     //return to admin module by getting all existing and active profiles on cite
    }
    
    public function getPortfolio(){
        $userID = Auth::user()->id;     //gets the current user ID from Auth
        $data = $this->service->getPortfolio($userID);  //passes the userID to security service
        return view('portfolio')->with($data);      //returns to portfolio page with the data storing all information for logged in user
    }
    
    public function updatePortfolio(){
        $userID = Auth::user()->id;     //gets the current userID from Auth
        //creates a data array with all the posted values from portfolio edit form 
        $data = [
            'userID' => $userID,
            'job' => $_POST['job'],
            'skills' => $_POST['skills'],
            'education' => $_POST['education']
        ];
        $this->service->updatePortfolio($data);     //passes the portfolio information stored in data array to security service
        return $this->getPortfolio();       //return so portfolio page, after getting the updated portfolio
    }
    
    public function adminEditPortfolio(){
        $userID = $_POST['userID'];     // admin module, passes the userID from the form method post, hidden userID key
        $data = $this->service->adminEditPortfolio($userID);     //passes the userID to security service
        return view('adminEditPortfolio')->with('data', $data);     //returns to admin edit form using updated data array storing all information
    }
    
    public function adminUpdatePortfolio(){
        $userID = $_POST['userID'];     // admin module, passes the userID from the form method post, hidden userID key
        //creates a data array with all the posted values from portfolio edit form 
        $data = [
            'userID' => $userID,
            'job' => $_POST['job'],
            'skills' => $_POST['skills'],
            'education' => $_POST['education']
        ];
        $this->service->adminUpdatePortfolio($data);    //passes the portfolio information stored in data array to security service
        return $this->getAllProfiles();     //returns to admin module getting all the updated user profiles
    }
    
    public function getAllJobs(){
        $data = $this->service->getAllJobs();   //request all the posted jobs from security service
        return view('jobs')->with('data', $data);   //returns to jobs page using data array storing all the job information for users 
    }
    
    public function deletePortfolio(){
        $userID = $_POST['userID'];     // admin module, passes the userID from the form method post, hidden userID key
        $this->service->deletePortfolio($userID);   //passes the userID to security service
        return $this->getAllJobs();     //returns to job page to see if the the job posting was deleted
    }
}
