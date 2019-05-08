<?php

namespace App\Http\Controllers\Backend\Access\User;

use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\CreateUserRequest;
use App\Http\Requests\Backend\Access\User\DeleteUserRequest;
use App\Http\Requests\Backend\Access\User\EditUserRequest;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;
use App\Http\Requests\Backend\Access\User\ShowUserRequest;
use App\Http\Requests\Backend\Access\User\StoreUserRequest;
use App\Http\Requests\Backend\Access\User\UpdateUserRequest;
use App\Http\Responses\Backend\Access\User\CreateResponse;
use App\Http\Responses\Backend\Access\User\EditResponse;
use App\Http\Responses\Backend\Access\User\ShowResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Access\Permission\Permission;
use App\Models\Access\User\User;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Repositories\Backend\Access\User\UserRepository;
use App\Repositories\Backend\Seat\SeatRepository;
use App\Repositories\Backend\Floor\FloorRepository;
use App\Repositories\Backend\Branch\BranchRepository;

use What3words\Geocoder\Geocoder;
use What3words\Geocoder\AutoSuggestOption;
use Illuminate\Support\Facades\Input;


/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var \App\Repositories\Backend\Access\User\UserRepository
     */
    protected $users;

    /**
     * @var \App\Repositories\Backend\Access\Role\RoleRepository
     */
    protected $roles;

    /**
     * @var \App\Repositories\Backend\Seat\RoleRepository
     */
    protected $seats;

    /**
     * @var \App\Repositories\Backend\Branch\BranchRepository
     */
    protected $branch;
    protected $floor;

    /**
     * @param \App\Repositories\Backend\Access\User\UserRepository $users
     * @param \App\Repositories\Backend\Access\Role\RoleRepository $roles
     */
    public function __construct(UserRepository $users, RoleRepository $roles, BranchRepository $branch,  SeatRepository $seats)
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->branch = $branch;
        $this->seats = $seats;

    }

    /**
     * @param \App\Http\Requests\Backend\Access\User\ManageUserRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageUserRequest $request)
    {
        return new ViewResponse('backend.access.users.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Access\User\CreateUserRequest $request
     *
     * @return \App\Http\Responses\Backend\Access\User\CreateResponse
     */
    public function create(CreateUserRequest $request)
    {
        $roles = $this->roles->getAll();
        $branch = $this->branch->getAll();
        $seats = $this->seats->getAll();
        $floor['floor'] = DB::table('floors')->get();
        
        return view('backend.access.users.create',$floor,array('roles'=> $roles,'branch'=>$branch,'seats'=>$seats));
        //return new CreateResponse($roles);
    }

    /**
     * @param \App\Http\Requests\Backend\Access\User\StoreUserRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        $this->users->create($request);
       //     dd($request);
        return new RedirectResponse(route('admin.access.user.index'), ['flash_success' => trans('alerts.backend.users.created')]);
    }

    /**
     * @param \App\Models\Access\User\User                           $user
     * @param \App\Http\Requests\Backend\Access\User\ShowUserRequest $request
     *
     * @return \App\Http\Responses\Backend\Access\User\ShowResponse
     */
    public function show(User $user, ShowUserRequest $request)
    {
        return new ShowResponse($user);
    }

    /**
     * @param \App\Models\Access\User\User                           $user
     * @param \App\Http\Requests\Backend\Access\User\EditUserRequest $request
     *
     * @return \App\Http\Responses\Backend\Access\User\EditResponse
     */
    public function edit(User $user, EditUserRequest $request)
    {
        $roles = $this->roles->getAll();
        $permissions = Permission::getSelectData('display_name');
          $branch = $this->branch->getAll();
          
        return new EditResponse($user, $roles, $permissions, $branch);
    }

    /**
     * @param \App\Models\Access\User\User                             $user
     * @param \App\Http\Requests\Backend\Access\User\UpdateUserRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $this->users->update($user, $request);
        //dd($request);
        return new RedirectResponse(route('admin.access.user.index'), ['flash_success' => trans('alerts.backend.users.updated')]);
    }

    /**
     * @param \App\Models\Access\User\User                             $user
     * @param \App\Http\Requests\Backend\Access\User\DeleteUserRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(User $user, DeleteUserRequest $request)
    {
        $this->users->delete($user);

        return new RedirectResponse(route('admin.access.user.index'), ['flash_success' => trans('alerts.backend.users.deleted')]);
    }

    public function convert()
    {
        $api= new Geocoder("79NK10MQ");
        // $result= $api->convertTo3wa($lat,$lng);
        // $words = $result["words"];
        // print"The words for ($lat,$lng) are " . $words . "\n";
        // print_r($api->getError());  

        $words= input::get('threewordaddress');
        $result = $api->convertToCoordinates($words);

        //print "The coordinates for $words are (" . $result["coordinates"]["lat"] . "),(" . $result["coordinates"]["lng"] . ")\n";

        print "The coordinates for $words are (" . $result["coordinates"]["lat"] . "),(" . $result["coordinates"]["lng"] . ")\n First is lattitude and second is longitude \n";

        //return new RedirectResponse(route('admin.access.user.index'), ['flash_success' => trans('alerts.backend.users.deleted')]);
    }
}
