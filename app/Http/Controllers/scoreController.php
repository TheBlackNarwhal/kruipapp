<?php
 
namespace App\Http\Controllers;
use App\score;
use App\match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class scoreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = score::orderBy('kruipscore', 'desc')->get();
        $matches = match::orderBy('id', 'desc')->limit(10)->get();
        return view('scores.index', compact('scores', 'matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scores = score::all()->toArray();
        return view('scores.create', compact('scores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $score = $this->validate(request(),[
            'teamblauw_player1' => 'required',
            'teamblauw_player2' => 'required',
            'teamrood_player1' => 'required',
            'teamrood_player2' => 'required',
            'score_blauw' => 'required',
            'score_rood' => 'required'
        ]);
        
        if($score['score_blauw'] > $score['score_rood']){
            $this->updateGewonnen($score['teamblauw_player1'], $score['teamblauw_player2']);

            if ($score['score_blauw'] - $score['score_rood'] > 5){
                $this->updateKruipen($score['teamrood_player1'], $score['teamrood_player2']);
            } 
       }else if($score['score_blauw'] < $score['score_rood']){
            $this->updateGewonnen($score['teamrood_player1'], $score['teamrood_player2']);
            
            if($score['score_rood'] - $score['score_blauw'] > 5){
                $this->updateKruipen($score['teamblauw_player1'], $score['teamblauw_player2']);
            }
       }else{
           //error
       }
        
        match::create($score);
        return redirect('scores');
    }

    public function updateKruipen($i1, $i2)
    {
        $persoon1 = score::where('naam', $i1)->first();
        $persoon2 = score::where('naam', $i2)->first();
        
        $persoon1->kruipscore++;
        $persoon2->kruipscore++;
        $persoon1->save();
        $persoon2->save();

        
    }
   
    public function updateGewonnen($i1, $i2)
    {
        $persoon1 = score::where('naam', $i1)->first();
        $persoon2 = score::where('naam', $i2)->first();
        
        $persoon1->gewonnengames++;
        $persoon2->gewonnengames++;
        $persoon1->save();
        $persoon2->save();

        
    }

    public function maakGelijk($email, $name)
    {
        DB::table('score')->insert([
            'naam' => $name,
            'email' => $email
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public static function verloren($match)
    {
        $verloren = false;
        if($match['teamblauw_player1'] == Auth::user()->name || $match['teamblauw_player2'] == Auth::user()->name and $match['score_blauw'] < $match['score_rood']){
            $verloren = true;
        }elseif($match['teamrood_player1'] == Auth::user()->name || $match['teamrood_player2'] == Auth::user()->name and $match['score_rood'] < $match['score_blauw']){
            $verloren = true;
        }
        return $verloren;
    }

    public static function tegenstanderKruipen($match)
    {
        $gewonnen = false;
        if($match['teamblauw_player1'] == Auth::user()->name || $match['teamblauw_player2'] == Auth::user()->name and $match['score_blauw'] - $match['score_rood'] >= 5){
            $gewonnen = true;
        }elseif($match['teamrood_player1'] == Auth::user()->name || $match['teamrood_player2'] == Auth::user()->name and $match['score_rood'] - $match['score_blauw'] >= 5){
            $gewonnen = true;
        }
        return $gewonnen;
    }
}
