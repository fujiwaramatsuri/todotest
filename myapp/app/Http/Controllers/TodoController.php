<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()/*index表記*/
    {
        
        $items = DB::table('todos')->get();
        // dd($items);
        return view('index',['items'=>$items]);
        //
        
         /*return view('/index');*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $param = [
            'content' => $request->content,
            //  'timestamp' => $request->timestamp,
        ];
        //
        
        DB::table('todos')->insert($param);
        return redirect('/');
        $validate_rule = [
            'content' =>'required',
        ];
        //
        $this->validate($request, $validate_rule);
        $from =$request->all();
        TODO::create($form);
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // dd($request->id);
      $todo = Todos::find($request->id);
      $todo->delete();
    //   return view('delete',[form => $todos]);
      return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {Todos::find($request->id)->delete();
        return redirect('/');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit(Todos $todos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todos $todos)
    {
    $todo = Todos::where($request->id);
          $param = [
            'id' => $request->id,
            'content' => $request->content,
            // 'timestamp' => $request->timestamp,
        ];
         dd($param);
        //
        DB::table('todos')->where('id',$request->id)->update($param);
        return redirect('/');
        $validate_rule = [
            'content' =>'required',
            'id' =>'required',
        ];
        //
        $this->validate($request, $validate_rule);
        $from =$request->all();
        TODO::update($form);
        return redirect('/');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todos $todos)
    {
        //
    }
}
