<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\Admin\Event\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Event $event){
        $data = $request->validated();
        if(array_key_exists('image_preview', $data)){
            if($event->image_preview !== 'events/0O0avWLNmiw9BNiR9hAcoO5Dvrd0iNb85B9N1iMV.png'){
                Storage::disk('public')->delete($event->image_preview);
                $data['image_preview'] = Storage::disk('public')->put('events', $data['image_preview']);
            }
            else{
                $data['image_preview'] = Storage::disk('public')->put('events', $data['image_preview']);
            }
        }

        $event->update($data);
        $notification = 'Изменено';
        return redirect()->route('event.index')->with(['notification' => $notification]);
    }
}
