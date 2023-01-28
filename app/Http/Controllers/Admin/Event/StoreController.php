<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\Admin\Event\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        if(array_key_exists('image_preview', $data)){
            $data['image_preview'] = Storage::disk('public')->put('events', $data['image_preview']);
            $data['image_preview'] = 'storage/'.$data['image_preview'];
        }
        else{
            $data['image_preview'] = 'storage/events/0O0avWLNmiw9BNiR9hAcoO5Dvrd0iNb85B9N1iMV.png';
        }


        Event::create($data);
        $notification = 'Сохранено';
        return redirect()->route('event.index')->with(['notification' => $notification]);
    }
}
