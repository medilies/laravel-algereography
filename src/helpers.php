<?php

use TheHocineSaad\LaravelAlgereography\Models\Daira;
use TheHocineSaad\LaravelAlgereography\Models\Wilaya;

/*
|--------------------------------------------------------------------------
| Getting all Wilayas
|--------------------------------------------------------------------------
|
* Calling it without parameters will return a collection of all Wilayas in all languages.
* You can specify the 'lang' parameter, 'ar' or 'fr' to return a collection of all Wilayas in the desired language.
* Calling it with a parametre that is not 'ar' neither 'fr' will return a collection of all Wilayas in all languages.
*ex: wilayas(), wilayas('ar'), wilayas('fr').
|
*/

if (! function_exists('wilayas')) {
    function wilayas(string $lang = ''): Illuminate\Database\Eloquent\Collection
    {
        return match ($lang) {
            'ar' => Wilaya::select('id', 'ar_name as name')->get(),
            'fr' => Wilaya::select('id', 'name')->get(),
            default => Wilaya::all(),
        };
    }
}

/*
|--------------------------------------------------------------------------
| Getting one Wilaya
|--------------------------------------------------------------------------
|
* Calling it with just the required 'id' parameter will return a single model instance (Wilaya) in all languages.
* You can specify the 'lang' parameter, 'ar' or 'fr' to return a single model instance (Wilaya) in the desired language.
* Calling it with a 'lang' parameter that is not 'ar' neither 'fr' will return a single model instance (Wilaya) in all languages.
*ex: wilaya(15), wilaya(15, 'ar'), wilaya(15, 'fr').
|
*/
if (! function_exists('wilaya')) {
    function wilaya(int $wilaya_id, string $lang = ''): TheHocineSaad\LaravelAlgereography\Models\Wilaya
    {
        return match ($lang) {
            'ar' => Wilaya::findOrFail($wilaya_id, ['id', 'ar_name as name']),
            'fr' => Wilaya::findOrFail($wilaya_id, ['id', 'name']),
            default => Wilaya::findOrFail($wilaya_id),
        };
    }
}

/*
|--------------------------------------------------------------------------
| Getting all Dairas
|--------------------------------------------------------------------------
|
* Calling it without parameters will return a collection of all Dairas in all languages.
* You can specify the 'lang' parameter, 'ar' or 'fr' to return a collection of all Dairas in the desired language.
* Calling it with a parametre that is not 'ar' neither 'fr' will return a collection of all Dairas in all languages.
*ex: dairas(), dairas('ar'), dairas('fr').
|
*/
if (! function_exists('dairas')) {
    function dairas(string $lang = ''): Illuminate\Database\Eloquent\Collection
    {
        return match ($lang) {
            'ar' => Daira::select('id', 'ar_name as name', 'wilaya_id')->get(),
            'fr' => Daira::select('id', 'name', 'wilaya_id')->get(),
            default => Daira::all(),
        };
    }
}

/*
|--------------------------------------------------------------------------
| Getting Dairas of a Wilaya
|--------------------------------------------------------------------------
|
* Calling it with just the required 'id' will return a collection of all Dairas of the specified Wilaya in all languages.
* You can specify the 'lang' parameter, 'ar' or 'fr' to return a collection of all Dairas of the specified Wilaya in the desired language.
* Calling it with a parametre that is not 'ar' neither 'fr' will return a collection of all Dairas of the specified Wilaya in all languages.
* ex: dairasOf(15), dairasOf(15, 'ar'), dairasOf(15, 'fr').
|
*/
if (! function_exists('dairasOf')) {
    function dairasOf(int $wilaya_id, string $lang = ''): Illuminate\Database\Eloquent\Collection
    {
        return match ($lang) {
            'ar' => Daira::select('id', 'ar_name as name')->where('wilaya_id', $wilaya_id)->get(),
            'fr' => Daira::select('id', 'name')->where('wilaya_id', $wilaya_id)->get(),
            default => Daira::where('wilaya_id', $wilaya_id)->get(),
        };
    }
}
