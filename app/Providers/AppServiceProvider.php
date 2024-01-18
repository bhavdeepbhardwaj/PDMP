<?php

namespace App\Providers;

use App\Models\IconWithPanel;
use App\Models\Modules;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view)
        {
            // $cart = Cart::where('user_id', Auth::user()->id);

            //...with this variable
            // $view->with('cart', $cart );
            // dd(Auth::user()->id);
            $notModArr=['13'];
            if(isset(Auth::user()->role_id)){
            $role_id = Auth::user()->role_id;
            $module = Modules::where('role_id', $role_id)->select('module_id')->first();
            // dd($module);
            $moduleIdArr = explode(',', $module->module_id);
            // $panelDataByRole = IconWithPanel::where('parent_id',0)->whereIn('id', $moduleIdArr)->whereNotIn('id', $notModArr)->get()->toArray();
            $panelDataByRole = IconWithPanel::where('parent_id',0)->whereIn('id', $moduleIdArr)->get()->toArray();
            // dd($panelDataByRole);
            $moduleArr = [];

            foreach($panelDataByRole as $key => $data){
                $moduleArr[$key]['id'] = $data['id'];
                $moduleArr[$key]['parent_id'] = $data['parent_id'];
                $moduleArr[$key]['module'] = $data['module'];
                $moduleArr[$key]['module_name'] = $data['module_name'];
                $moduleArr[$key]['icon'] = $data['icon'];
                $moduleArr[$key]['url'] = $data['url'];
                $moduleArr[$key]['mod_list_name'] = $data['mod_list_name'];
                $subpanelDataByRole = IconWithPanel::where('parent_id',$data['id'])->whereIn('id', $moduleIdArr)->get()->toArray();
                // $subpanelDataByRole = IconWithPanel::where('parent_id',$data['id'])->whereIn('id', $moduleIdArr)->whereNotIn('id', $notModArr)->get()->toArray();

                if(count($subpanelDataByRole) > 0)
                {
                    // dd($subpanelDataByRole);
                    $moduleArr[$key]['submodule'] = $subpanelDataByRole;
                }

            }
            // dd($panelDataByRole,$moduleArr);
            $view->with('panelDataByRole', $moduleArr );
            }
        });
    }
}
