<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Permission;
use Hash;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	} 
	
	//list page load
    public function index()
	{
		return view('user.list');
	}
	
	//List Data
	public function userList()
	{
		$get_users = User::where('id', '!=' , auth()->user()->id)->orderBy('id','DESC')->get();
		
		return datatables()->of($get_users)
		->addIndexColumn()
		->editColumn('created_at', function($data){
			return date('Y-m-d H:i:s', strtotime($data->created_at));
		})
		->addColumn('action', function($data){
			$action = "";
			
			if(!empty(auth()->user()->permission_id)){
			if(in_array(1,explode(',',auth()->user()->permission_id)))
			{
				$action = '<a href="' . route('user.show',$data->id) . '" class="btn btn-sencdory shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>';
			}
			if(in_array(3,explode(',',auth()->user()->permission_id)))
			{
				$action .= '<a href="' . route('user.edit',$data->id) . '" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>';
			}
			if(in_array(4,explode(',',auth()->user()->permission_id)))
			{
				$action .= '<a href="' . route('user.delete',$data->id) . '" class="btn btn-danger shadow btn-xs sharp" onClick="return confirm_click()"><i class="fa fa-trash"></i></a>';
			}
			}
			return $action;
		})
		->rawColumns(['action'])
		->make(true);
	}
	
	//Create page lode.
	public function create()
	{
		if(!empty(auth()->user()->permission_id)){
			if(in_array(2,explode(',',auth()->user()->permission_id)))
			{
				$permissions = Permission::get();
				return view('user.create',compact('permissions'));
			}
			
			return redirect()->route('user.index')->with('danger', 'Do not have permmision to add user');
		}
		return redirect()->route('user.index')->with('danger', 'Do not have permmision to add user');
		
	}
		
	//Store.
	public function store(Request $request)
	{   
		$data = $request->validate([
		'name' => 'required|alpha_num|max:50',
		'email' => 'required|email|max:100',
		'password' => 'required|min:8|max:12|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
		'phone_number' => 'required|numeric|digits:10',
		'city' => 'required',
		'gender' => 'required',
		'hobbies' => 'required|array',
		'permission' => 'required|array',
		],
		[
		'name.required' =>('Name field is required'),
		]);
		
		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->phone_number = $request->phone_number;
		$user->city = $request->city;
		$user->gender = $request->gender;
		$user->hobbies = implode(',',$request->hobbies);
		$user->permission_id = implode(',',$request->permission);
		$user->save();
		
		return redirect()->route('user.index')->with('success', 'User added successfully');
	}
		
	//View page load.
	public function show(User $user)
	{
		return view('user.view', compact('user'));
	}
		
	//Edit page load.
	public function edit(User $user)
	{
		if(!empty(auth()->user()->permission_id)){
			if(in_array(3,explode(',',auth()->user()->permission_id)))
			{
				$permissions = Permission::get();
				return view('user.edit', compact('user','permissions'));
			}
			return redirect()->route('user.index')->with('danger', 'Do not have permmision to edit user');
		}
		return redirect()->route('user.index')->with('danger', 'Do not have permmision to edit user');
	}
		
	//Update.
	public function update(Request $request, User $user)
	{
		$data = $request->validate([
		'name' => 'required|alpha_num|max:50',
		'email' => 'required|email|max:100',
		'phone_number' => 'required|numeric|digits:10',
		'city' => 'required',
		'gender' => 'required',
		'hobbies' => 'required|array',
		'permission' => 'required|array',
		],
		[
		'name.required' =>('Name field is required'),
		]);
		
		$user = User::find($user->id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone_number = $request->phone_number;
		$user->city = $request->city;
		$user->gender = $request->gender;
		$user->hobbies = implode(',',$request->hobbies);
		$user->permission_id = implode(',',$request->permission);
		$user->save();
		
		return redirect()->route('user.index')->with('success', 'User updated successfully');
	}
		
	//Delete.
	public function delete($id)
	{
		if(!empty(auth()->user()->permission_id)){
			if(in_array(4,explode(',',auth()->user()->permission_id)))
			{
				$user = User::find($id);
				$user->delete();
				
				return redirect()->route('user.index')->with('success', 'User deleted successfully');
			}
			return redirect()->route('user.index')->with('danger', 'Do not have permmision to delete user');
		}
		return redirect()->route('user.index')->with('danger', 'Do not have permmision to delete user');
	}
}
