<?php
 
namespace App\Http\Controllers;
use App\score;
use App\match;
use Illuminate\Http\Request;

class scoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = score::orderBy('kruipscore', 'desc')->get();
        return view('scores.index', compact('scores'));
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
        $blauw;
        $rood;

        $score = $this->validate(request(),[
            'teamblauw_player1' => 'required',
            'teamblauw_player2' => 'required',
            'teamrood_player1' => 'required',
            'teamrood_player2' => 'required',
            'score_blauw' => 'required',
            'score_rood' => 'required'
        ]);
        
      //  $antwoord = $score['standblauw'] + $score['standrood'];
        

        if ($score['score_blauw'] - $score['score_rood'] > 5) {
            //Rood team moet ++ krijgen
            
            $this->updateKruipen($score['teamrood_player1'], $score['teamrood_player2']);
           
        } else if($score['score_rood'] - $score['score_blauw'] > 5){
            //Blouw team moet ++ krijgen
            
            $this->updateKruipen($score['teamblauw_player1'], $score['teamblauw_player2']);
            
        }else{
            
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


        // if ($score['standblauw'] - $score['standrood'] > 5) {   
        // } else if($score['standrood'] - $score['standblauw'] > 5){
        //     $rood = true;
        //     $blauw = true;
        // }else{
            
        // }
        // if ($score['standblauw'] > $score['standrood']) {
        //     $blauw = true;
        //     $rood = false;
    
        //     if ($blauw == true) { echo "Blouw wint"; } 
        //     else if($rood == true){ echo "Rood wint"; }
        //     else{ echo "gelijk"; }
        // }


        
        // if ($score['standblauw'] - $score['standrood'] > 5) {
        //     $blauw = true;
        //     $rood = false;

        //     if ($blauw == true) {
        //         echo "Blouw wint";
        //      } else if($rood == true){
        //          echo "Rood wint";
        //      }else{
        //          echo "gelijk";
        //      }
        // } else if($score['standrood'] - $score['standblauw'] > 5){
        //     $rood = true;
        //     $blauw = true;
        // }else{
            
        // }
        

        
        
        // if ($score['standblauw'] - $score['standrood'] > 5 || $score['standrood'] - $score['standblauw'] > 5) {
      
        // } else{
            
        // }
        
        // print_r($antwoord);
        // print_r($score);
        

        
    

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
}
