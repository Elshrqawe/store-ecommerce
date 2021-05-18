<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function editShippingMethods($type)
    {
        if ($type == 'free')
            return $shippingMethod = Setting::where('key', 'free_shipping_label')->first();

        elseif ($type == 'inner')
            return $shippingMethod = Setting::where('key', 'local_label')->first();

        elseif ($type == 'outer')
            return $shippingMethod = Setting::where('key', 'outer_label')->first();

        else
            return $shippingMethod = Setting::where('key', 'free_shipping_label')->first();

        return view('dashboard. settings.shippings.edit',compact('shippingMethod'));

    }

    public function updateShippingMethods(Request $request, $id)
    {


    }
}
