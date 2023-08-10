<?php

namespace App\Http\Controllers;

use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PassportController extends Controller
{
    public function index() {
        $passports =  $this->getPassport();

        return view('passport', ['passports' => $passports]);
    }

    // this function return all passport
    public function getPassport() {
        return Passport::all();
    }

    public function create() {
        return view ('createPassport');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|min:8',
            'nationalty' => 'required|string',
            'expiry_date' => 'required|date',
            'birth_date' => 'required|date',
        ]);

        $requestData = $request->all() ;
        $requestData['user_id'] = auth()->user()->id;
        
        Passport::create($requestData);

        return redirect()->to('/passport');
    }

    public function destroy($id) {
        $passport = Passport::find($id);
        $passport->delete();
        return redirect()->to('/passport');
    }

    public function show($id) {
        $passport = Passport::find($id);
        return view ('editPassport', ['passport' => $passport ]);
    }

    public function update(Request $request, $id) {

        $passport = Passport::find($id);
        $passport->update($request->all());
        return redirect()->to('/passport');
    }


    public function getPassports() {

        $redis    = Redis::connection();
        // $redis->del('passports');
        // return Passport::all();
        if( $redis->exists("passports") ) {
            $response = $redis->get('passports');
            $response = json_decode($response);
        }else {
            $redis->set('passports', json_encode(Passport::all()));
            $response = $redis->get('passports');
            $response = json_decode($response);
        }
        return $response;
    }

}
