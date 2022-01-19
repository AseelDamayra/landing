<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios=portfolio::all();
        return view('layouts.backend.portfolio.index',compact('portfolios'));
    }


    public function getData(){
        $portfolio=portfolio::all();
        return response()->json([
        'portfolios'=>$portfolio,
        ]);

    }

    public function editData(Request $request){
        $portfolio=portfolio::findOrFail($request->id);
        return response()->json([
        'name_en'=>$portfolio->getTranslation('name','en'),
        'name_ar'=>$portfolio->getTranslation('name','ar'),
        'description'=>$portfolio->description,
        'port_id'=>$portfolio->id,
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //الطريقة الاولى 
    //     try{
    //           portfolio::create([
          
    //         'name'=>['en'=>$request->name_en , 'ar'=>$request->name],
    //         'description'=>$request->description,

    //     ]);

    //     session()->flash('add',trans('backend/message.success'));
    //     return redirect('portfolios');
    //     }
    //   catch(Exception $e){
    //     return redirect()->back()->withError(['error'=>$e->getMessage()]);
    //   }


    // الطريقة الثانية باستخدام ajax 
      // return $request;
      try{
                  portfolio::create([
              
                'name'=>['en'=>$request->name_en , 'ar'=>$request->name],
                'description'=>$request->description,
    
            ]);
    
            session()->flash('add',trans('backend/message.success'));
          return response()->json([
              'done'=>'done'
          ]); // لارسال البيانات ل ajax
            }
          catch(Exception $e){
            return response()->json([
                'done'=>'error',
                'error'=>$e->getMessage(),
            ]);
          }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        
       try{
        $portfolio=portfolio::findOrFail($request->port_id);

        $portfolio->update([
        'name'=>['en'=>$request->name_en , 'ar'=>$request->name],
        'description'=>$request->description,
        'port_id'=>$request->port_id,
        ]);


       session()->flash('add',trans('backend/message.success'));
       return response()->json([
         'done'=>'done'
            ]); // لارسال البيانات ل ajax
     } 
        catch(Exception $e){
          return response()->json([
          'done'=>'error',
          'error'=>$e->getMessage(),
         ]);
       }

     }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $portfolio=portfolio::findOrFail($request->id);
    
            $portfolio->delete();

           session()->flash('add',trans('backend/message.success'));
           return response()->json([
             'done'=>'done',
             'id'=>$portfolio->id,
                ]); // لارسال البيانات ل ajax
         } 
            catch(Exception $e){
              return response()->json([
              'done'=>'error',
              'error'=>$e->getMessage(),
             ]);
           }
    
    }
}
