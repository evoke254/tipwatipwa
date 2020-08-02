@extends('layouts.app_admin')
@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center">
        <h4 class="short-border font-weight-bold"> Calendar</h4>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center">
          <div class="card p-4">
            <div class="card-body" >
                <div class="row">
                    <div class="col-md-3">
                        <a href="/admin/schedule/create" class="btn btn-sm btn-success">
                        Add Event
                        </a>
                    </div>
                    <div class="col-md-3">

                        <a href="/admin/event/category" class="btn btn-sm btn-success">
                           Event Categories
                          </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id='calendar'></div>

                    </div>
                </div>

            </div>
          </div>
      </div>
  </div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100" id="myModalLabel">Edit Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" id="createEvent">
            <input type="hidden" name="eventId" id="eventId" />
            <input type="hidden" name="event_id" id="event_id" />
           <div class="row">
            <div class="col-md-12">
              <a href="" id="detailsPage" class="btn btn-md btn-warning">Details...</a>
            </div>
              <div class="col-md-6">
              <div class="form-group row">
                <label for='title' class="col-sm-3 col-form-label"> Title</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" id="title" name="title">
                </div>
              </div>
                <div class="form-group row" >
                  <div class="col-md-12">
                  <label for='start' class="col-sm-3 col-form-label"> Start</label>
                      <div class="input-group d" id="datetimepicker1" data-target-input="nearest">
                          <input type="text" name="start" id="start" class="form-control datetimepicker-input" data-target="#datetimepicker1" >
                          <div class="input-group-append" data-target="#datetimepicker1" id="startdiv" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for='status' class="col-sm-3 col-form-label"> Status</label>
                  <div class="col-md-12">
                    <select class="form-control" id="status" name="status">
                      <option value="Active">Active</option>
                      <option value="Cancelled">Cancelled</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for='image' class="col-sm-3 col-form-label"> Image</label>
                  <div class="col-md-12">
                    <a href="" data-lightbox="kahaki" id="lightboxImg">
                      <img src="" class="img-responsive" id="shImage" style="width: 150px;" alt="Kahaki Images">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group row">
                <label for='venue' class="col-sm-3 col-form-label"> Venue</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" id="venue" name="venue">
                </div>
              </div>
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for='start' class="col-sm-3 col-form-label"> Finish</label>
                      <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                          <input type="text" name="finish" id="finish" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                          <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                </div>
              <div class="form-group row">
                <label for='title' class="col-sm-3 col-form-label"> Cost</label>
                <div class="col-md-12">
                  <input type="number" class="form-control" id="cost" name="cost">
                </div>
              </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-12">
                <label for="desc" class="col-sm-3 col-form-label">Description</label>
                <div class="col-md-12">
                  <textarea id="desc" class="form-control" name="desc"></textarea>
                </div>
              </div>
           </div>
        </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-md btn-grey" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-md btn-dark-green" id="updateEvent">Update</button>
      </div>
    </div>
  </div>
</div>



    <div class="modal fade" id="alertSuccuessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100 text-center" id="myModalLabel">Success</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="text-center">
              <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
              <h6 id="controllerSuccess">Event Succesfully Generated.</h6>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="alertErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100 text-center" id="myModalLabel">Error</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="text-center">
              <i class="fas fa-times  fa-4x mb-3 animated rotateIn"></i>
              <h6 class="text-danger" id="controllerError">Something is not right. Check that all fields have been properly filled before submitting the form. <br>If this error persists please contact Kahaki on 0742968713</h6>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


<div class="modal fade" id="createKahakiEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100" id="myModalLabel">Create New Calendar Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" id="createEvent22">

           <div class="row">
              <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-6 col-form-label">Select Category</label>
                      <div class="col-md-12">
                          <select name="classOrEvent" id="classOrEvent" class="form-control">
                              <option value="0" selected="selected" disabled>Type of Event</option>
                              <option value="Fit">Fitness For All</option>
                              <option value="Explore">Explore & Discover</option>
                              <option value="Train">Train & Motivate</option>
                          </select>
                      </div>
                    </div>
                    <div id="ctitle" class="form-group row">
                      <label class="col-sm-3 col-form-label">Select Class</label>
                      <div class="col-md-12">
                        <select id="getTitle" name="getTitle" class="form-control">
                          <option value="0" selected="selected" disabled>Pick the class type</option>
                          @foreach ($services as $service)
                            <option value="{{$service->id}}">{{$service->title}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div id="trainer" class="form-group row">
                      <label class="col-sm-3 col-form-label">Trainer</label>
                      <div class="col-md-12">
                        <select id="trainer" name="trainer" class="form-control">
                          <option selected="N">Pick a Trainer</option>
                          @foreach ($trainers as $trainer)
                            <option value="{{$trainer->fname}} {{$trainer->lname}}">{{$trainer->fname}} {{$trainer->lname}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div id="etitle" class="form-group row">
                        <label class="col-sm-3 col-form-label">Event Title</label>
                        <div class="col-md-12">
                            <input type="text" name="geteTitle" id="geteTitle" class="form-control" placeholder="Event Name"/>
                        </div>
                    </div>
                <div class="form-group row" >
                  <div class="col-md-12">
                  <label for='start' class="col-sm-3 col-form-label"> Start </label>
                      <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                          <input type="text" name="getStart" id="getStart" class="form-control picker-input" data-target="#datetimepicker3" >
                          <div class="input-group-append" data-target="#datetimepicker3" id="startdiv" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                </div>
                    <div class="form-group row">
                <label for='status' class="col-sm-3 col-form-label"> Status</label>
                <div class="col-md-12">
                  <select class="form-control" id="getStatus" name="getStatus">
                    <option value="Active">Active</option>
                    <option value="Cancelled">Cancelled</option>
                  </select>

                </div>
                    </div>
              </div>
            <div class="col-md-6">
              <div class="form-group row " id="evenue">
                <label for='venue' class="col-sm-3 col-form-label"> Venue</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" id="getVenue" name="getVenue">
                </div>
              </div>
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for='start' class="col-sm-3 col-form-label"> Finish</label>
                      <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                          <input type="text" name="getFinish" id="getFinish" class="form-control datetimepicker-input" data-target="#datetimepicker4"/>
                          <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                </div>
              <div class="form-group row">
                <label for='title' class="col-sm-3 col-form-label"> Cost</label>
                <div class="col-md-12">
                  <input type="number" class="form-control" id="getCost" name="getCost">
                </div>
              </div>
              <div class="form-group row" id="monthly">
                <label for="mothly" class="col-sm-3 col-form-label">Monthly</label>
                <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="repeatClass" name="repeatClass" value="true">
                      <label class="custom-control-label text-danger" for="repeatClass">Reiterate Class/Event same day and time this month.</label>
                    </div>
                </div>
              </div>
            </div>
           </div>
           <div class="row">
              <div class="col-md-12">
                <label for="desc" class="col-sm-3 col-form-label">Description</label>
                <div class="col-md-12">
                  <textarea id="getDesc" name="getDesc" class="form-control"></textarea>
                </div>
              </div>
           </div>
        </form>
      </div>
      <div class="modal-footer">

            <button type="button" class="btn btn-md btn-grey" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-md btn-dark-green" id="createClassEvent">Create Event</button>
      </div>
    </div>
  </div>
</div>
</div>


@endsection
@section('scripts')
        $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
            icons: {
                time: 'icon ion-ios-time',
                date: 'icon ion-ios-calendar',
                up: 'icon ion-ios-arrow-dropup',
                down: 'icon ion-ios-arrow-dropdown',
                previous: 'icon ion-ios-arrow-dropleft',
                next: 'icon ion-ios-arrow-dropright',
                today: 'icon ion-ios-calendar',
                clear: 'icon ion-ios-trash',
                close: 'icon ion-ios-close-circle-outline'
            } });

      $('#calendar').fullCalendar({
            // put your options and callbacks here
            //defaultView: 'listDay',
            eventColor: 'green',
            eventTextColor: 'white',
            timeFormat: 'HH(:mm)',
              header: {
            right: 'prev,next',
            center: 'title',
            left: 'month,agendaWeek,agendaDay,listMonth'
          },
            events : [
                @foreach($class_events as $class_event)
                {
                    eventId: '{{$class_event->id}}',
                    title : '{{ $class_event->title }}',
                    image : '{{ $class_event->image }}',
                    desc : '{{ $class_event->desc }}',
                    venue : '{{ $class_event->venue }}',
                    start : '{{ $class_event->start }}',
                    cost : '{{ $class_event->cost }}',
                    @if ($class_event->finish)
                            end: '{{ $class_event->finish }}',
                    @endif
                },
                @endforeach
            ],
            eventClick: function(calEvent, jsEvent, view, el) {

              $('#event_id').val(calEvent._id);
              $('#eventId').val(calEvent.eventId);
              $('#cost').val(calEvent.cost);
              $('#title').val(calEvent.title);
              $('#desc').val(calEvent.desc);
              $('#venue').val(calEvent.venue);
              $('#cost').val(calEvent.cost);
              $('#detailsPage').attr('href', '/admin/class-events/'+calEvent.eventId+'/edit')
              $('#shImage').attr('src', '/storage/'+calEvent.image);
              $('#lightboxImg').attr('href', '/storage/'+calEvent.image);
            $('#start').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss'));
            $('#finish').val(moment(calEvent.end).format('YYYY-MM-DD HH:mm:ss'));
            $('#editModal').modal({backdrop: false});

        }
        });

      $('#createEvent').click(function(){

        $('#evenue').hide();
        $('#monthly').hide();
        $('#etitle').hide();
        $('#ctitle').hide();
        $('#trainer').hide();
        $('#recurrence').hide();

            $('#classOrEvent').change(function(){
            var x = document.getElementById('classOrEvent').value;
            if(x==='Event'){
                  $('#evenue').show();
                  $('#etitle').show();
                  $('#ctitle').hide();
                  $('#monthly').hide();
                  $('#trainer').hide();
                  $('#recurrence').hide();

                }
              else if(x==='Class')
                {
                  $('#evenue').hide();
                  $('#etitle').hide();
                  $('#monthly').show();
                  $('#ctitle').show();
                  $('#trainer').show();
                  $('#recurrence').show();
                }
            else if(x==='0')
            {
              $('#evenue').hide();
              $('#etitle').hide();
              $('#ctitle').hide();
              $('#recurrence').hide();
              $('#trainer').hide();
              $('#monthly').hide();
            }
            });

            /*  $('#title').val('');
              $('#cost').val('');
              $('#desc').val('');
              $('#venue').val('');
              $('#cost').val('');
            $('#start').val('');
            $('#finish').val(''); */
            $('#createEvent22')[0].reset();
            $('#createKahakiEvent').modal({backdrop: false});
      });


       $(function () {
                $('#datetimepicker1').datetimepicker({
                  format : 'YYYY-MM-DD HH:mm:ss',
                });
            });

         $(function () {
                $('#datetimepicker2').datetimepicker({
                  format : 'YYYY-MM-DD HH:mm:ss',
                });
            });
         $(function () {
                $('#datetimepicker3').datetimepicker({
                  format : 'YYYY-MM-DD HH:mm:ss',
                });
            });
         $(function () {
                $('#datetimepicker4').datetimepicker({
                  format : 'YYYY-MM-DD HH:mm:ss',
                });
            });

      $('#updateEvent').click(function(e) {
              e.preventDefault();
              $.ajax({
                type: 'POST',
                url : '/schedule_editor',
                data: {
                  ajaxUpdateEvent : 'ajaxupdateEvent',
                    _token: '{{ csrf_token() }}',
                    eventId: $('#eventId').val(),
                    title: $('#title').val(),
                    desc: $('#desc').val(),
                    venue: $('#venue').val(),
                    start: $('#start').val(),
                    cost: $('#cost').val(),
                    finish: $('#finish').val(),
                    status: $('#status').val(),
              },
                success: function (response, status, xhr) {
                      $('#controllerSuccess').text(response.success);
                      $('#alertSuccuessModal').modal({backdrop: false});
                    location.reload();
                },
                error: function (response, status, xhr) {
                      $('#controllerError').text(response.error);
                      $('#alertErrorModal').modal({backdrop: false});
                }
              });
              $('#editModal').modal('hide');

          });


        $('#createClassEvent').click(function(e) {
              e.preventDefault();
              var repeatClass =  $('#repeatClass').is(':checked');
              $.ajax({
                type: 'POST',
                url : 'schedule',
                data: {
                  ajaxCreateEvent : 'ajaxCreateEvent',
                    _token: '{{ csrf_token() }}',
                    classOrEvent: $('#classOrEvent').val(),
                    repeatClass,
                    title: $('#getTitle').val(),
                    etitle: $('#geteTitle').val(),
                    desc: $('#getDesc').val(),
                    venue: $('#getVenue').val(),
                    start: $('#getStart').val(),
                    cost: $('#getCost').val(),
                    trainer: $('#trainer').val(),
                    finish: $('#getFinish').val(),
                    status: $('#getStatus').val(),
            },
                success: function (response, status, xhr) {
                      $('#controllerSuccess').text(response.success);
                      $('#alertSuccuessModal').modal({backdrop: false});
                  location.reload();
                },
                error: function (response, status, xhr) {
                      $('#controllerError').text(response.error);
                      $('#alertErrorModal').modal({backdrop: false});
                }
              });
              $('#createKahakiEvent').modal('hide');

          });

@endsection
