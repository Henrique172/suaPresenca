<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){

        $search = request('search');
        if($search){
            $events = Event::where([[
                'title', 'like', '%'.$search.'%' ]])->get();

        }else{
            
            $events = Event::all();
        }


        return view ('welcome',['events' => $events, 'search'=> $search]);
    }
    
    public function create(){
        return view ('events.create');
    }

    public function store(request $request){

        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->date = $request->date;  

        // image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension =$requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        }
        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento Criado com Sucesso!');

    }

    public function show($id){

        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);

    }

    public function destroy($id){

        Event::findOrFail($id)->delete();

        return redirect('/events')->with('msg', 'Evento Deletado com Sucesso!');

    }

}
