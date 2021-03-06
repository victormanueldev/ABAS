<?php

namespace ABAS\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Notifications\DatabaseNotification;
use ABAS\User;

class NotificacionesController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        // 
        if(request()->ajax()){
            return Auth::user()->unreadNotifications;
        }   
        $notificaciones  = Auth::user()->notifications;
        return $notificaciones;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMany(Request $request)
    {
        if(request()->ajax()){;
            foreach ($request->notificaciones as $notificacion) {
                DatabaseNotification::find($notificacion['id'])->delete();
            }
            return Auth::user()->unreadNotifications;
        }
    }

    public function destroy($id)
    {
        //
        DatabaseNotification::find($id)->delete();
        if(request()->ajax()){
            return Auth::user()->unreadNotifications;
        }
    }
}
