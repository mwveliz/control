<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comando;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class ComandoController.
 *
 * @author  The scaffold-interface created at 2017-02-26 12:34:15am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ComandoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - comando';
        $comandos = Comando::paginate(6);
        return view('comando.index',compact('comandos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - comando';

        return view('comando.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comando = new Comando();


        $comando->orden = $request->orden;


        $comando->fecha = $request->fecha;


        $comando->mac = $request->mac;



        $comando->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new comando has been created !!']);

        return redirect('comando');
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
        $title = 'Show - comando';

        if($request->ajax())
        {
            return URL::to('comando/'.$id);
        }

        $comando = Comando::findOrfail($id);
        return view('comando.show',compact('title','comando'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - comando';
        if($request->ajax())
        {
            return URL::to('comando/'. $id . '/edit');
        }


        $comando = Comando::findOrfail($id);
        return view('comando.edit',compact('title','comando'  ));
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
        $comando = Comando::findOrfail($id);

        $comando->orden = $request->orden;

        $comando->fecha = $request->fecha;

        $comando->mac = $request->mac;


        $comando->save();

        return redirect('comando');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/comando/'. $id . '/delete');

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
     	$comando = Comando::findOrfail($id);
     	$comando->delete();
        return URL::to('comando');
    }
}
