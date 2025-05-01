<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheDemoController extends Controller
{
    //

    public function index()
    {
        // ✅ Store the value 'hi' under the key 'data' for 600 seconds (10 minutes)
        Cache::put('foo', 'hi', 600);

        // ✅ Retrieve the value of 'foo' from the cache
        $value = Cache::get('foo');

        // ✅ Retrieve 'foo'; if not found, return 'default' as fallback
        $value = Cache::get('foo', 'default');

        // ✅ Remove (delete) the 'foo' key from the cache
        Cache::forget('foo');


        // Removes everything from the cache
        Cache::flush();


        // ✅ Only store 'foo' if it doesn't already exist (stored for 5 minutes)
        Cache::add('foo', 'bar', 300);

        // ✅ Get 'foo' and remove it from the cache in one operation
        $value = Cache::pull('foo');

        // ✅ Store the key 'views' with value 0 for 1 hour
        Cache::put('views', 0, now()->addHour());

        // ✅ Increase the 'views' key value by 1
        Cache::increment('views');

        // ✅ Decrease the 'views' key value by 2
        Cache::decrement('views', 2);


        // ✅ Retrieve 'countries_with_cities' from cache or store it for 1 day if not found
        $countries = Cache::remember('countries_with_cities', 600, function () {
            return Countries::with('cities')->get()->toArray();
        });

        return $countries;
    }
}
