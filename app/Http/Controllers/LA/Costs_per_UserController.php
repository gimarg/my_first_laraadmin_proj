<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

// use App\Models\Cost;

class Costs_per_UserController extends Controller
{
	public $show_action = true;
	public $view_col = 'amount';
	public $listing_cols = ['id', 'date', 'type', 'amount'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Costs', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Costs', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Costs.
	 *
	 * @return \Illuminate\Http\Response
	 */
	// public function index()
	// {
	// 	$module = Module::get('Costs');
		
	// 	if(Module::hasAccess($module->id)) {
	// 		return View('la.costs.index', [
	// 			'show_actions' => $this->show_action,
	// 			'listing_cols' => $this->listing_cols,
	// 			'module' => $module
	// 		]);
	// 	} else {
  //           return redirect(config('laraadmin.adminRoute')."/");
  //       }
	// }

	/**
	 * Show the form for creating a new cost.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created cost in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	// public function store(Request $request)
	// {
	// 	if(Module::hasAccess("Costs", "create")) {
		
	// 		$rules = Module::validateRules("Costs", $request);
			
	// 		$validator = Validator::make($request->all(), $rules);
			
	// 		if ($validator->fails()) {
	// 			return redirect()->back()->withErrors($validator)->withInput();
	// 		}
			
	// 		$insert_id = Module::insert("Costs", $request);
			
	// 		return redirect()->route(config('laraadmin.adminRoute') . '.costs.index');
			
	// 	} else {
	// 		return redirect(config('laraadmin.adminRoute')."/");
	// 	}
	// }

	/**
	 * Display the specified cost.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
    // $user = DB::table('users')->where('name', 'John')->first();
    $user_costs = DB::table('costs')->where('user', '1')->sum('amount');
    // DB::select("SELECT `amount` FROM `costs` WHERE `amount`=3.56");
    // return view('la.costs_per_user.show', ['user_costs' => $user_costs]);
    
    // return $user_costs;
    // return view('greeting', ['name' => 'James']);
    // if(Module::hasAccess("Costs", "view")) {
			
		// 	$cost = Cost::find($id);
		// 	if(isset($cost->id)) {
				$module = Module::get('Costs');
				// $module->row = $cost;
				
				return view('la.costs_per_user.show', [
          'user_costs' => $user_costs,
					'module' => $module,
					'no_header' => true,
					'no_padding' => "no-padding"
				]);
		// 	} else {
		// 		return view('errors.404', [
		// 			'record_id' => $id,
		// 			'record_name' => ucfirst("cost"),
		// 		]);
		// 	}
		// } else {
		// 	return redirect(config('laraadmin.adminRoute')."/");
		// }
	}

// 	/**
// 	 * Show the form for editing the specified cost.
// 	 *
// 	 * @param  int  $id
// 	 * @return \Illuminate\Http\Response
// 	 */
// 	public function edit($id)
// 	{
// 		if(Module::hasAccess("Costs", "edit")) {			
// 			$cost = Cost::find($id);
// 			if(isset($cost->id)) {	
// 				$module = Module::get('Costs');
				
// 				$module->row = $cost;
				
// 				return view('la.costs.edit', [
// 					'module' => $module,
// 					'view_col' => $this->view_col,
// 				])->with('cost', $cost);
// 			} else {
// 				return view('errors.404', [
// 					'record_id' => $id,
// 					'record_name' => ucfirst("cost"),
// 				]);
// 			}
// 		} else {
// 			return redirect(config('laraadmin.adminRoute')."/");
// 		}
// 	}

// 	/**
// 	 * Update the specified cost in storage.
// 	 *
// 	 * @param  \Illuminate\Http\Request  $request
// 	 * @param  int  $id
// 	 * @return \Illuminate\Http\Response
// 	 */
// 	public function update(Request $request, $id)
// 	{
// 		if(Module::hasAccess("Costs", "edit")) {
			
// 			$rules = Module::validateRules("Costs", $request, true);
			
// 			$validator = Validator::make($request->all(), $rules);
			
// 			if ($validator->fails()) {
// 				return redirect()->back()->withErrors($validator)->withInput();;
// 			}
			
// 			$insert_id = Module::updateRow("Costs", $request, $id);
			
// 			return redirect()->route(config('laraadmin.adminRoute') . '.costs.index');
			
// 		} else {
// 			return redirect(config('laraadmin.adminRoute')."/");
// 		}
// 	}

// 	/**
// 	 * Remove the specified cost from storage.
// 	 *
// 	 * @param  int  $id
// 	 * @return \Illuminate\Http\Response
// 	 */
// 	public function destroy($id)
// 	{
// 		if(Module::hasAccess("Costs", "delete")) {
// 			Cost::find($id)->delete();
			
// 			// Redirecting to index() method
// 			return redirect()->route(config('laraadmin.adminRoute') . '.costs.index');
// 		} else {
// 			return redirect(config('laraadmin.adminRoute')."/");
// 		}
// 	}
	
// 	/**
// 	 * Datatable Ajax fetch
// 	 *
// 	 * @return
// 	 */
// 	public function dtajax()
// 	{
// 		$values = DB::table('costs')->select($this->listing_cols)->whereNull('deleted_at');
// 		$out = Datatables::of($values)->make();
// 		$data = $out->getData();

// 		$fields_popup = ModuleFields::getModuleFields('Costs');
		
// 		for($i=0; $i < count($data->data); $i++) {
// 			for ($j=0; $j < count($this->listing_cols); $j++) { 
// 				$col = $this->listing_cols[$j];
// 				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
// 					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
// 				}
// 				if($col == $this->view_col) {
// 					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/costs/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
// 				}
// 				// else if($col == "author") {
// 				//    $data->data[$i][$j];
// 				// }
// 			}
			
// 			if($this->show_action) {
// 				$output = '';
// 				if(Module::hasAccess("Costs", "edit")) {
// 					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/costs/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
// 				}
				
// 				if(Module::hasAccess("Costs", "delete")) {
// 					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.costs.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
// 					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
// 					$output .= Form::close();
// 				}
// 				$data->data[$i][] = (string)$output;
// 			}
// 		}
// 		$out->setData($data);
// 		return $out;
// 	}
}
