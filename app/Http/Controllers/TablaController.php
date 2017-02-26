<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tabla;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class TablaController.
 *
 * @author  The scaffold-interface created at 2017-02-26 12:34:15am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class TablaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - tabla';
        $tablas = Tabla::paginate(6);
        return view('tabla.index',compact('tablas','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - tabla';
        
        return view('tabla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tabla = new Tabla();

        
        $tabla->orden = $request->orden;

        
        $tabla->fecha = $request->fecha;

        
        $tabla->mac = $request->mac;

        
        
        $tabla->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new tabla has been created !!']);

        return redirect('tabla');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - tabla';

        if($request->ajax())
        {
            return URL::to('tabla/'.$id);
        }

        $tabla = Tabla::findOrfail($id);
        return view('tabla.show',compact('title','tabla'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - tabla';
        if($request->ajax())
        {
            return URL::to('tabla/'. $id . '/edit');
        }

        
        $tabla = Tabla::findOrfail($id);
        return view('tabla.edit',compact('title','tabla'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $tabla = Tabla::findOrfail($id);
    	
        $tabla->orden = $request->orden;
        
        $tabla->fecha = $request->fecha;
        
        $tabla->mac = $request->mac;
        
        
        $tabla->save();

        return redirect('tabla');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/tabla/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$tabla = Tabla::findOrfail($id);
     	$tabla->delete();
        return URL::to('tabla');
    }
}
