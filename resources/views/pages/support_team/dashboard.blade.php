@extends('layouts.master')
@section('page_title', 'My Dashboard')
@section('content')

    @if(Qs::userIsTeamSA())
       <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-blue-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-bold">Total Students</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users4 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-danger-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Teachers</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-success-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-pointer icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'admin')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Administrators</span>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-indigo-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-user icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'parent')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Parents</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       @endif

    {{--Events Calendar Begins--}}
    <div class="card">
        <div class="create-event">
    <a href="javascript:;" data-toggle="modal" data-target="#modal" class="btn btn-primary"> + Add Event</a>
        </div>
        <div class="card-header header-elements-inline">
            <h5 class="card-title">School Events Calendar</h5>
         {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <div class="fullcalendar-basic"></div>
        </div>
    </div>

    <div id="modal" class="modal">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
      	<form id="addevent" method="post" action="{{route('add-event')}}">
          @csrf @method('POST')
        <h5 class="modal-title font-weight-bold h4">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body font-weight-bold h5">
        <div class="row">
            <div class="form-group col-md">
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" id="name">
            </div>
          </div>
          <div class="row">
              <div class="form-group col-md">
                <label for="time_from" class="d-block">Time From:</label>
                <input type="datetime-local" id="time_from" name="time_from" >
                <!-- <input type="text" class="form-control" name="time_from" id="club"> -->
              </div>
          </div>
          <div class="row">
             <div class="form-group col-md">
                <label for="time_to" class="d-block">Time To:</label>
                <input type="datetime-local" id="time_to" name="time_to" >
              </div>
          </div>
          <div class="row">
            <div class="form-group col-md">
              <label for="color" class="d-block">Color:</label>
              <select name="color" id="color_code">
                <option value="#EF5350">Red</option>
                <option value="#6ef06e">Green</option>
                <option value="#2596be">Blue</option>
                <option value="#eecb56">Yellow</option>
              </select>
            </div>
          </div>
      
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
        </div>
</form>
    </div>
  </div>
</div>
    </div>
    <script type="text/javascript">

    $(document).ready(function() {
    //     var eventColors = [
    //   {
    //     title: "All Day Event",
    //     start: "2024-02-11",
    //     color: "#EF5350",
    //   },
    //   {
    //     title: "Long Event",
    //     start: "2024-02-07",
    //     end: "2024-02-10",
    //     color: "#26A69A",
    //   },
    //   {
    //     id: 999,
    //     title: "Repeating Event",
    //     start: "2024-02-09T16:00:00",
    //     color: "#26A69A",
    //   },
      
    // ];

    var events = {!! json_encode($events->toArray(), JSON_HEX_TAG) !!};

    var eventColors = [];

    @foreach($events as $event )
        eventColors.push({ 
            title: '{{ $event->name }}', 
            start: '{{ $event->time_from }}',
            end: '{{ $event->time_to }}', 
            color: '{{ $event->color_code}}' });
    @endforeach

    // @foreach ($events as $k => $v)
    // eventColors.push(
    //     {
    //     title: $v->name,
    //     start: "2024-02-07",
    //     end: "2024-02-10",
    //     color: "#26A69A",
    //     }
    // )
    // @endforeach


        $(".fullcalendar-basic").fullCalendar({
      header: {
        left: "prev,next today",
        center: "title",
        right: "month,basicWeek,basicDay",
      },
        // defaultDate: "today",
    //   editable: true,
      events: eventColors,
      eventLimit: true,
      isRTL: $("html").attr("dir") == "rtl" ? true : false,
    });
    })
    // Event colors
    
    </script>
    {{--Events Calendar Ends--}}
    @endsection
