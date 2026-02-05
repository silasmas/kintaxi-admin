<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use App\Http\Resources\Vehicle as ResourcesVehicle;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class HomeController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Change language
     *
     * @param  string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }

    /**
     * GET: Generate symbolic link for images
     *
     * @return \Illuminate\View\View
     */
    public function symlink()
    {
        return view('symlink');
    }

    /**
     * GET: Home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $passenger_role = UserRole::where('role_name', 'Passenger')->first();
        $driver_role = UserRole::where('role_name', 'Driver')->first();
        $professional_role = UserRole::where('role_name', 'Professional')->first();
        $count_members = User::where('role_id', $passenger_role?->id)->orWhere('role_id', $driver_role?->id)->orWhere('role_id', $professional_role?->id)->count();
        $count_vehicles = Vehicle::count();
        $vehicles_collection = Vehicle::limit(5)->orderByDesc('updated_at')->get();
        $vehicles_data = ResourcesVehicle::collection($vehicles_collection)->toArray(request());
        $users_collection = User::where('id', '<>', Auth::user()->id)->limit(5)->orderByDesc('updated_at')->get();
        $users_data = ResourcesUser::collection($users_collection)->toArray(request());

        return view('dashboard', [
            'count_members' => $count_members,
            'count_vehicles' => $count_vehicles,
            'vehicles' => $vehicles_data,
            'users' => $users_data,
        ]);
    }

    /**
     * GET: About page
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * GET: Search page
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        return view('search');
    }
}
