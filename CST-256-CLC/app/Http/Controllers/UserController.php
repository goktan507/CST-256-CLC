<?php
/*
 *  Project Name: CST-256-CLC - Version: 2.0 The End
 *    Group Name: IDK
 *   Module Name: User Module
 *   Programmers: Safa Bayraktar & Jacob Cauthren
 *          Date: 4/17/2021
 *          
 *      User module contains all the user related operations.
 */

namespace App\Http\Controllers;

use App\Services\Security\SecurityService;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Services\Utility\MyLogger1;

class UserController extends Controller
{

    private $service;
    private $logger;

    public function __construct()
    {
        $this->service = new SecurityService(); // initializing SecurityService on create of UserController
        $this->logger = MyLogger1::getLogger(); // initializing logger on create of UserController
    }

    public function getUserProfile()
    {
        $this->logger->info("Entering UserController getUserProfile()");
        try {
            $userID = Auth::user()->id; // gets the user ID from Auth
            $data = $this->service->getUserProfile($userID); // using User ID, get's user's profile passing value to SecurityService
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController getUserProfile() redirecting to profile page...");
        return view('profile', $data); // returns to profile page with the user profile information stored in data array
    }

    public function updateUserProfile()
    {
        $this->logger->info("Entering UserController updateUserProfile()");
        try {
            // creates a data array including user profiles posted from edit profile page
            $data = [
                'userID' => Auth::user()->id,
                'phonenumber' => $_POST['phonenumber'],
                'address' => $_POST['address'],
                'biography' => $_POST['biography']
            ];
            $this->service->updateUserProfile($data); // sends the posted data to SecurityService update function
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController updateUserProfile() redirecting to profile page...");
        return view('profile', $data); // returns page with the same data array meaning that update is always succeesful
    }

    public function getAllProfiles()
    {
        $this->logger->info("Entering UserController getAllProfiles()");
        try {
            $data = $this->service->getAllProfiles(); // calls the security service to get all profiles to display in admin Module
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController getAllProfiles() redirecting to adminAllProfiles page...");
        return view('adminAllProfiles')->with('data', $data); // returns to the admin page with all the user information stored in data array
    }

    public function editSelectedProfile()
    {
        $this->logger->info("Entering UserController editSelectedProfile()");
        try {
            $userID = $_POST['userID']; // admin function, gets the hidden key userID from the form method post
            $data = $this->service->editSelectedProfile($userID); // using the userID, passes the value to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController editSelectedProfile() redirecting adminEditSelectedProfile page");
        return view('adminEditSelectedProfile')->with('data', $data); // update is always successful, no validation, returns the same data array
    }

    public function adminUpdateSelectedProfile()
    {
        $this->logger->info("Entering UserController adminUpdateSeletedProfile()");
        // creates a data array with all the posted values from admin edit form
        try {
            $data = [
                'userID' => $_POST['userID'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'isAdmin' => $_POST['isAdmin'],
                'phonenumber' => $_POST['phonenumber'],
                'address' => $_POST['address'],
                'biography' => $_POST['biography']
            ];
            $this->service->adminUpdateSelectedProfile($data); // passes all the information stored in data array to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController adminUpdateSelectedProfile() redirecting to get_profiles page");
        return redirect('get_profiles');
    }

    public function adminSuspendProfile()
    {
        $this->logger->info("Entering UserController adminSuspendProfile()");
        try {
            $userID = $_POST['userID']; // in order to suspend correct user, gets the user ID from the form as hidden key
            $this->service->adminSuspendProfile($userID); // passes the userID to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController adminSuspendProfile() redirecting to get_profiles");
        return redirect('get_profiles'); // return to admin module by getting all the active profiles on cite.
    }

    public function adminDeleteProfile()
    {
        $this->logger->info("Entering UserController adminDeleteProfile()");
        try {
            $userID = $_POST['userID']; // in order to delete correct user, gets the user ID from the form as hidden key
            $this->service->adminDeleteProfile($userID); // passes the userID to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController adminDeleteProfile() redirecting to get_profiles");
        return redirect('get_profiles'); // return to admin module by getting all existing and active profiles on cite
    }

    public function getPortfolio()
    {
        $this->logger->info("Entering UserController getPortfolio()");
        try {
            $userID = Auth::user()->id; // gets the current user ID from Auth
            $data = $this->service->getPortfolio($userID); // passes the userID to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController getPortfolio() redirecting to portfolio page...");
        return view('portfolio')->with($data); // returns to portfolio page with the data storing all information for logged in user
    }

    public function updatePortfolio()
    {
        $this->logger->info("Entering UserController updatePortfolio()");
        try {
            $userID = Auth::user()->id; // gets the current userID from Auth
                                        // creates a data array with all the posted values from portfolio edit form
            $data = [
                'userID' => $userID,
                'job' => $_POST['job'],
                'skills' => $_POST['skills'],
                'education' => $_POST['education']
            ];
            $this->service->updatePortfolio($data); // passes the portfolio information stored in data array to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController updatePortfolio() redirecting get_portfolio");
        return redirect('get_portfolio'); // return so portfolio page, after getting the updated portfolio
    }

    public function adminEditPortfolio()
    {
        $this->logger->info("Entering UserController adminEditPortfolio()");
        try {
            $userID = $_POST['userID']; // admin module, passes the userID from the form method post, hidden userID key
            $data = $this->service->adminEditPortfolio($userID); // passes the userID to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController adminEditPortfolio() redirecting adminEditPortfolio");
        return view('adminEditPortfolio')->with('data', $data); // returns to admin edit form using updated data array storing all information
    }

    public function adminUpdatePortfolio()
    {
        $this->logger->info("Entering UserController adminUpdatePortfolio()");
        try {
            $userID = $_POST['userID']; // admin module, passes the userID from the form method post, hidden userID key
                                        // creates a data array with all the posted values from portfolio edit form
            $data = [
                'userID' => $userID,
                'job' => $_POST['job'],
                'skills' => $_POST['skills'],
                'education' => $_POST['education']
            ];
            $this->service->adminUpdatePortfolio($data); // passes the portfolio information stored in data array to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController adminUpdatePortfolio() returning get_profiles");
        return redirect('get_profiles'); // returns to admin module getting all the updated user profiles
    }

    public function getAllJobs()
    {
        $this->logger->info("Entering UserController getAllJobs()");
        try {
            $data = $this->service->getAllJobs(); // request all the posted jobs from security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController getAllJobs() redirecting jobs page");
        return view('jobs')->with('data', $data); // returns to jobs page using data array storing all the job information for users
    }

    public function deletePortfolio()
    {
        $this->logger->info("Entering UserController deletePortfolio()");
        try {
            $userID = $_POST['userID']; // admin module, passes the userID from the form method post, hidden userID key
            $this->service->deletePortfolio($userID); // passes the userID to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController detePortfolio() redirecting get_jobs");
        return redirect('get_jobs'); // returns to job page to see if the the job posting was deleted
    }

    public function getAllGroups()
    {
        $this->logger->info("Entering UserController getAllGroups()");
        try {
            $data = $this->service->getAllGroups(); // request all the groups from security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController getAllGroups() redirecting groups page");
        return view('groups')->with('data', $data); // returns to groups view page with the data passed from security service
    }

    public function deleteGroup()
    {
        $this->logger->info("Entering UserController deleteGroup()");
        try {
            $groupID = $_POST['groupID']; // the group id passed from form post to delete specific group
            $this->service->deleteGroup($groupID); // requests to delete group with groupID being passed to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController deleteGroup() redirecting get_groups");
        return redirect('get_groups'); // redirects back to groups view
    }

    public function editGroup()
    {
        $this->logger->info("Entering UserController editGroup()");
        try {
            $groupID = $_POST['groupID']; // the group id passed from form post to edit specific group
            $data = $this->service->editGroup($groupID); // requests to get group info with groupID being passed to security service
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController editGroup() redirecting editGroup page");
        return view('editGroup')->with('data', $data); // returns to editGroup view to display current information of group
    }

    public function updateGroup()
    {
        $this->logger->info("Entering UserController uptadeGroup()");
        // storing all the information passed from editGroup view
        try {
            $data = [
                'groupID' => $_POST['groupID'],
                'name' => $_POST['name'],
                'description' => $_POST['description']
            ];
            $this->service->updateGroup($data); // passes the data array storing all information, to pass into security service to update group
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController updateGroup() redirecting get_groups");
        return redirect('get_groups'); // redirects back to the groups view
    }

    public function getCreateGroup()
    {
        $this->logger->info("Entering UserController getCreateGroup()");
        $this->logger->info("Exiting UserController getCreateGroup() redirecting createGroup");
        return view('createGroup'); // sends to the create group view
    }

    public function createGroup()
    {
        $this->logger->info("Entering UserController createGroup()");
        // storing all the information passed from createGroup view
        try {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'userID' => Auth::user()->id
            ];
            if(!($data['name'] == "" || $data['description'] == ""))
                $this->service->createGroup($data); // passes the data array storing all information, to pass into security service to create group
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController createGroup() redirecting get_groups");
        if(!($data['name'] == "" || $data['description'] == ""))
            return redirect('get_groups'); // redirects back to groups view
        else
            return redirect('get_create_group');
    }

    public function joinGroup()
    {
        $this->logger->info("Entering UserController joinGroup()");
        try {
            $groupID = $_POST['groupID']; // the group id passed from form post to join specific group
            $this->service->joinGroup($groupID); // passes the groupID that user is trying to join
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController joinGroup() redirecting get_groups");
        return redirect('get_groups'); // redirects back to groups view
    }

    public function leaveGroup()
    {
        $this->logger->info("Entering UserController leaveGroup()");
        try {
            $groupID = $_POST['groupID']; // the group id passed from form post to leave specific group
            $this->service->leaveGroup($groupID); // passes the groupID that user is trying to leave
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController leaveGroup() redirecting get_groups");
        return redirect('get_groups'); // redirects back to groups view
    }

    public function getJobsBySearch()
    {
        $this->logger->info("Entering UserController getJobsBySearch()");
        try {
            $search = $_POST['search']; // the search text passed from the form post to display searched job postings
            $data = $this->service->getJobsBySearch($search); // passes the search text to security service
            if ($data == 'getAll') { // if dao returns getAll meaning that search text was empty, then we return all job posting
                return redirect('/get_jobs'); // redirecting to /get_jobs will display all job postings
            }
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController getJobsBySearch() redirecting jobs page");
        return view('jobs')->with('data', $data); // if search was an actual text input, then returns the result of it.
    }

    public function viewJob()
    {
        $this->logger->info("Entering UserController viewJob()");
        // get the job posting information from table index that was requested to view
        try {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'job' => $_POST['job'],
                'skills' => $_POST['skills'],
                'education' => $_POST['education']
            ];
        } catch (Exception $e) {
            $this->logger->error($e);
        }
        $this->logger->info("Exiting UserController viewJob() redirecting viewJob page");
        return view('viewJob')->with('data', $data); // returns to view page with data
    }
}
