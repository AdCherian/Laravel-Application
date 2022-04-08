<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class AdminController extends Controller
{
    public function get() {


        if(!(Auth::user()->role=='admin'))
            return abort(404);

        return view('admin');
    }


    public function dodajstrazak() {

        if(!(Auth::user()->role=='admin'))
        return abort(404);

        $users = DB::table('users')->get();

        return view('dodajstrazak', ['users' => $users]);
    }

    public function edytujstrazaka($id) {

        if(!(Auth::user()->role=='admin'))
        return abort(404);

        $users = DB::table('users')->where('id','=',$id)->first();
        //dd($users);

        return view('edytujstrazaka', ['users' => $users]);
    }

    public function edytujstrazakaput($id,Request $request) {

        if(!(Auth::user()->role=='admin'))
        return abort(404);
        
        //dd($request->all());
        $user=User::find($id);
        $user->role=$request->role;
        $user->save();
        return redirect('/dodajstrazak');
    }

    public function dodajsprzet() {

        if(!(Auth::user()->role=='admin'))
        return abort(404);

        $users = DB::table('sprzet')->get();

        return view('dodajsprzet', ['users' => $users]);
    }

    public function nowysprzet() {

        if(!(Auth::user()->role=='admin'))
        return abort(404);

        return view('nowysprzet');

    }

    public function nowysprzetpost(Request $request) {

        if(!(Auth::user()->role=='admin'))
        return abort(404);
        
        $validated = $request->validate(
            ['nazwa'=>'required',
            'ilosc' =>'required|integer|gt:0',
            'data' =>'required',
            ]);
        //dd($request->all());
        DB::table('sprzet')->insert([
           'nazwaSprzetu'=>$request->nazwa,
           'iloscSprzetu'=>$request->ilosc,
           'stopienZuzycia'=>$request->data 
        ]);


        return redirect('/edytujsprzet');
    }

    public function edytujsprzetid($id) {

        if(!(Auth::user()->role=='admin'))
        return abort(404);
        $sprzet = DB::table('sprzet')->where('id','=',$id)->first();

        return view('edytujsprzetid',['sprzet'=>$sprzet]);

    }

    public function edytujsprzetpost($id,Request $request) {

        if(!(Auth::user()->role=='admin'))
        return abort(404);
        
        $validated = $request->validate(
            ['nazwa'=>'required',
            'ilosc' =>'required|integer|gt:0',
            'data' =>'required',
            ]);
        //dd($request->all());
        DB::table('sprzet')->where('id',$id)->update([
            'nazwaSprzetu'=>$request->nazwa,
            'iloscSprzetu'=>$request->ilosc,
            'stopienZuzycia'=>$request->data 
        ]);


        return redirect('/edytujsprzet');
    }

    public function akcja() {

        if(!(Auth::user()->role=='admin'))
        return abort(404);
        $strazacy=DB::table('users')->where('role','strazak')->get();
        $sprzet=DB::table('sprzet')->get();
        //dd($strazacy);

        return view('misja',['strazacy'=>$strazacy, 'sprzety'=>$sprzet]);

    }

    public function dodajakcje(Request $request) {

        if(!(Auth::user()->role=='admin'))
        return abort(404);
       // dd($request->all());
        $validated = $request->validate(
            ['opis'=>'required',
            'miejsce' =>'required',
            'rodzaj' =>'required',
            'strazacy' =>'required',
            'sprzety' =>'required',
            ]);
        //dd($request->all());
        $id=DB::table('akcja')->insertGetId([
           'opis'=>$request->opis,
           'miejsce'=>$request->miejsce,
           'rodzaj'=>$request->rodzaj 
        ]);
        foreach($request->strazacy as $strazak){
        //    dd($strazak);
            DB::table('akcjastrazak')->insert([
               'idAkcji'=>$id, 
               'idStrazaka'=>$strazak 
            ]);
        }

        foreach($request->sprzety as $sprzet){
            //    dd($strazak);
                DB::table('akcjasprzet')->insert([
                   'idAkcji'=>$id, 
                   'idSprzetu'=>$sprzet 
                ]);
            }


        return redirect('/admin');
    }
    public function akcje() {

        if(!(Auth::user()->role=='admin' || Auth::user()->role=='strazak'))
        return abort(404);

        $users = DB::table('akcja')->get();

        return view('akcja', ['akcje' => $users]);
    }

    public function strazacy() {

        if(!(Auth::user()->role=='admin' || Auth::user()->role=='strazak'))
        return abort(404);

        $users = DB::table('users')->where('role', 'strazak')->get();

        return view('strazacy', ['strazacy' => $users]);
    }

    public function sprzety() {

        if(!(Auth::user()->role=='admin' || Auth::user()->role=='strazak'))
        return abort(404);

        $users = DB::table('sprzet')->get();

        return view('sprzety', ['sprzety' => $users]);
    }

    public function zobaczakcje($id) {

        if(!(Auth::user()->role=='admin' || Auth::user()->role=='strazak'))
        return abort(404);

        $akcja = DB::table('akcja')->where('id', $id)->first();
        $sprzetyA = DB::table('akcjasprzet')->where('idAkcji', $akcja->id)->get();
        $strazacyA = DB::table('akcjastrazak')->where('idAkcji', $akcja->id)->get();
        $sprzety = array();
        foreach($sprzetyA as $r){
            $g = DB::table('sprzet')->where('id', $r->idSprzetu)->first();
            array_push($sprzety, $g);
        }
        $strazacy = array();
        foreach($strazacyA as $r){
            $g = DB::table('users')->where('id', $r->idStrazaka)->first();
            array_push($strazacy, $g);
        }
        //dd($strazacy);
        return view('zobaczakcje', ['sprzety' => $sprzety, 'akcja'=>$akcja, 'strazacy'=>$strazacy]);
    }
}
