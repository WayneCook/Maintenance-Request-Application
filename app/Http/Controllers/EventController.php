<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Storage;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use Auth;
// use App\Event;
use Response;
use Flash;

class EventController extends AppBaseController
{

    private $eventRepository;

    public function __construct(EventRepository $eventRepo)
    {
        $this->eventRepository = $eventRepo;
    }


    public function index(Request $request)
    {
        $this->eventRepository->pushCriteria(new RequestCriteria($request));
        $events = $this->eventRepository->all();

        foreach ($events as $event) {

        $signUps = DB::table('signups')
              ->where('event_id', '=', $event->id)
              ->count();


              $event->signups = $signUps;
            }

        return view('events.index')->with('events', $events);
    }


    public function userIndex() {

      $events = $this->eventRepository->all();

      foreach ($events as $event) {

        $check = DB::table('signups')
            ->where('username', '=', Auth::user()->username)
            ->where('event_id', '=', $event->id)
            ->exists();

        if ($check) {
          $event->status = 'isSignedUp';
        } else {
          $event->status = 'notSignedUp';
        }
      }

      return view('events.user_index')
          ->with('events', $events);

    }


    public function create()
    {
        return view('events.create');
    }


    public function store(CreateEventRequest $request)
    {
      $input = $request->all();

      // Validation
      request()->validate([

        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'title' => 'required|max:15',
        'start_date' => 'required',
        'end_date' => 'required',
        'description' => 'required|max:250',
        'details' => 'max:1000'

      ]);


      // Handle image
      if (isset(request()->image)) { //If new image file is submitted

        $imageName = rand(1000, 9999) . str_replace(' ', '_', trim(request()->image->getClientOriginalName()));
        $request->image->storeAs('public/event_images',$imageName);

        $input['image'] = $imageName;

      } else {
        $input['image'] = 'default_event_image.jpg';

      }

      //format date
      $start_date = $input['start_date'];
      $end_date = $input['end_date'];

      $input['start_date'] = date("Y-m-d H:i:s", strtotime($start_date));
      $input['end_date'] = date("Y-m-d H:i:s", strtotime($end_date));


      $event = $this->eventRepository->create($input);

      Flash::success('Event saved successfully.');

      return redirect(route('events.index'));

    }

    public function show($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        $users = DB::table('signups')
            ->where('event_id', '=', $event->id)
            ->get();

        if ($users->isNotEmpty()) {

          $event->users = $users;
        }

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.show')->with('event', $event);
    }


    public function edit($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.edit')->with('event', $event);
    }


    public function update($id, UpdateEventRequest $request)
    {

      // Validation
      request()->validate([

        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'title' => 'required|max:15',
        'start_date' => 'required',
        'end_date' => 'required',
        'description' => 'required|max:250',
        'details' => 'max:1000'

      ]);

        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $input = $request->all();
        //format date
        $start_date = $input['start_date'];
        $end_date = $input['end_date'];

        $input['start_date'] = date("Y-m-d H:i:s", strtotime($start_date));
        $input['end_date'] = date("Y-m-d H:i:s", strtotime($end_date));


        // Image handling
        if (isset(request()->image)) { //If new image file is submitted

        if ($event->image != 'default_event_image.jpg') {

          Storage::delete('public/event_images/' . $event->image);
        }

          $imageName = rand(1000, 9999) . str_replace(' ', '_', trim(request()->image->getClientOriginalName()));

          $request->image->storeAs('public/event_images',$imageName);
          $input['image'] = $imageName;

          $event = $this->eventRepository->update($input, $id);
          Flash::success('Event updated successfully.');
          return redirect(route('events.index'));
        }

        //If image file is not changed

        $event = $this->eventRepository->update($input, $id);
        Flash::success('Event updated successfully.');
        return redirect(route('events.index'));
    }


    public function destroy($id)
    {
        $event = $this->eventRepository->findWithoutFail($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        if ($event->image != 'default_event_image.jpg') {

          Storage::delete('public/event_images/' . $event->image);
        }
        $this->eventRepository->delete($id);

        Flash::success('Event deleted successfully.');

        return redirect(route('events.index'));
    }
}
