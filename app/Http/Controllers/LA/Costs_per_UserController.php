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

use Khill\Lavacharts\Lavacharts;

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

        // $lava = new Lavacharts; // See note below for Laravel

        $expenses = \Lava::DataTable();

        $expenses->addStringColumn('Expenses')
                ->addNumberColumn('Percent')
                ->addRow(['Books', 10])
                ->addRow(['Food', 35])
                ->addRow(['Sports', 25])
                ->addRow(['Pets', 30]);

        \Lava::PieChart('Outcome', $expenses, [
            'title'  => 'My Personal Accountant',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
            ]
        ]);

				return view('la.costs_per_user.show', [
          'user_costs' => $user_costs,
					'module' => $module,
					'no_header' => true,
          'no_padding' => "no-padding"
				])->render();
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

  public function charts() 
  {
    // $lava = new Lavacharts; // See note below for Laravel

    $reasons = Lava::DataTable();

    $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(['Check Reviews', 5])
            ->addRow(['Watch Trailers', 2])
            ->addRow(['See Actors Other Work', 4])
            ->addRow(['Settle Argument', 89]);

    Lava::PieChart('IMDB', $reasons, [
        'title'  => 'Reasons I visit IMDB',
        'is3D'   => true,
        'slices' => [
            ['offset' => 0.2],
            ['offset' => 0.25],
            ['offset' => 0.3]
        ]
    ]);
  }
}
