@if (empty($monthf)) 
<div id="schedule" class="content" style="margin-top: 2%">
  <div class="row d-flex justify-content-center">
    <h4 class="text-danger">Updating Events Database, check back soon.</h4>
  </div>
</div>
@else

<div id="schedule" class="content" style="margin-top: 2%">
  <div class="container">  
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 text-center">
              <h6 class="text-danger"> Click on a class/Event to book</h6>
              <h3> TipwaTipwa Schedule for:</h3> <!--
              <h5 class="lead font-10">Our classes are conveniently scheduled and flexible. </h5>
              <p>Filter Classes</p>
              <form action="/schedule" method="post" role="search">
                @csrf
                <div class="col-md-12 form-row justify-content-center">
                    <div class="col-sm-3 my-auto py-2">
                        <label class="sr-only" for="inlineFormInputName">Class/Event</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></div>
                            </div>
                            <select class="form-control custom-select mr-sm-2" name="location" id="inlineFormCustomSelect">
                                <option>Class/Event</option>
                                @foreach ($services as $service)
                                <option value="{{$service->id }}">{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 my-auto py-2">
                        <label class="sr-only" for="inlineFormInputName">Location</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-ellipsis-v"></i></div>
                            </div>
                            <select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" name="cat">
                                <option selected>Location</option>
                                    <option value=""></option>
                        
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 my-auto py-2">
                        <label class="sr-only" for="inlineFormInputName">Day | Time</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-ellipsis-v"></i></div>
                            </div>
                            <select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect" name="cat">
                                <option selected>Day | Time</option>
                                    <option value=""></option>
                        
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-md btn-dark-green"><i class="fas fa-search"> </i> Find a Class</button>
                    </div>
                   
                </div>
              </form> -->
        </div>
      </div>

        <!-- Arrrows Weekly-->
        <div class=" d-flex justify-content-between mt-1">
           
              <div class="">
                @if ( date('W') < $monthf['week'] ) 
                  <form id="getPrevWeek" action="/schedule" method="post">
                    @csrf
                    <input type="hidden" name="getPrevWeek" id="getPrevWeek" value="true">
                    <input type="hidden" name="week" id="week" value="{{$monthf['week'] }}">
                    <input type="hidden" name="year" id="year" value="{{$monthf['year'] }}">
                    <a href="#" id="prevWeek" class="scheduleIcons" style="font-size: 30px;"><i class=" ion-ios-arrow-dropleft"></i>
                    </a>
                  </form>
                @endif
              </div>

            <div class="">
              <h4 class="text-center">{{$monthf['month'] }} week  {{$monthf['week'] }} of {{$monthf['year'] }}</h4>
            </div>

            <div class="">
              <form id="getNextWeek" action="/schedule" method="post">
                @csrf
                <input type="hidden" name="getNextWeek" id="getNextWeek" value="true">
                <input type="hidden" name="week1" id="week1" value="{{$monthf['week'] }}">
                <input type="hidden" name="year1" id="year1" value="{{$monthf['year'] }}">
                <a href="#" id="nextWeek" class="scheduleIcons" style="font-size: 30px;"><i class=" ion-ios-arrow-dropright"></i>
                </a>
              </form>
            </div>
        </div>
      <div class="row d-flex justify-content-center w-100 mt-n2">
             
        @php
        $count = count($class_events);
        $dateToday = date('D jS');
        date_default_timezone_set('Africa/Nairobi');
        $dateToday1 = date('Y-m-d');
        @endphp

          @for ($i=0; $i<$count; $i++)
              @if ($dateToday1 == $daysArr[$i])
              <div class="d-none order-1 prev" id="{{$daysArr[$i]}}">
                <form>
                  <input type="hidden" name="begin" id="begin" value="{{$daysArr[$i]}}">
                  <a href="#" id="getPrevDayEvents" class="addRemoveIcon" style="font-size: 30px;"><i class=" ion-ios-arrow-dropleft"></i>
                  </a>
                </form>
              </div> 


              <div class="d-none order-3 {{$daysArr[$i]}} ">
                <form>
                  <input type="hidden" name="begin1" id="begin1" value="{{$daysArr[$i]}}">
                  <a href="#" id="getNextDayEvents" class="addRemoveIcon {{$daysArr[$i]}}" style="font-size: 30px;"><i class=" ion-ios-arrow-dropright"></i>
                  </a>
                </form>
              </div>
              
              @endif
                    <div id="ajaxAppend" class="order-2 text-center"></div>
                    @if( $dateToday == $datef[$i] ) 
                    <div  class="col-md-1_5 text-center wideScreen {{$dateToday1}}" id="wideScreen">  
                    @else
                    <div  class="col-md-1_5 text-center wideScreen" id="wideScreen">
                      @endif
                       <div id="thisDate">
                        @if( $dateToday == $datef[$i] ) 
                          <h5 class="today" id="today"> <strong>{{$datef[$i]}}</strong> </h5>
                          @else
                          <h5 class="allDays" id="allDays{{$i}}"><strong>{{$datef[$i]}}</strong> </h5>
                        @endif
                        @foreach ($class_events as $key => $classevent)

                          @foreach ($classevent as $class)  
                            @if($key == $daysArr[$i])

                              @if( $dateToday1 == $daysArr[$i] ) 
                                <div class="today" id="todayClass">
                                      
                                    <a href="/schedule_editor/{{ $class->id }}" class="d-block" >
                                      <div class="col-md-auto" id="myTooltip" data-toggle="tooltip" data-placement="right" title=" {{$class->desc}} ">
                                        {{ $class->title }}
                                        @php
                                           $getstartTime = new DateTime($class->start);
                                           $getfinishTime = new DateTime($class->finish);
                                           $startTimeF = $getstartTime->format('H:i');
                                           $duration = (int)(((strtotime($class->finish) - strtotime($class->start))/60));
                                        @endphp
                                        @if ($duration > 1)
                                        @endif
                                      {{ $startTimeF }} <br>
                                      {{$class->code}}
                                      </div>
                                    </a>
                                    <hr>
                                </div>
                                @else
                                <div id="notTodayClass{{$i}}" class="notTodayClass">
                                  @if(strtotime($daysArr[$i]) < strtotime($dateToday1))
                                    <a class="cantBook" >
                                      <div class="col-md-auto" id="myTooltip" data-toggle="tooltip" data-placement="right" title=" {{$class->desc}} ">
                                        {{ $class->title }}
                                        @php
                                           $getstartTime = new DateTime($class->start);
                                           $getfinishTime = new DateTime($class->finish);
                                           $startTimeF = $getstartTime->format('H:i');
                                           $duration = (int)(((strtotime($class->finish) - strtotime($class->start))/60));
                                        @endphp
                                      {{ $startTimeF }} <br>
                                      {{$class->code}}
                                      </div>
                                    </a>
                                    <hr>
                                    @else
                                     <a href="/schedule_editor/{{ $class->id }}" class="d-block" >
                                      <div class="col-md-auto" id="myTooltip" data-toggle="tooltip" data-placement="right" title=" {{$class->desc}} ">
                                        {{ $class->title }}
                                        @php
                                           $getstartTime = new DateTime($class->start);
                                           $getfinishTime = new DateTime($class->finish);
                                           $startTimeF = $getstartTime->format('H:i');
                                           $duration = (int)(((strtotime($class->finish) - strtotime($class->start))/60));
                                        @endphp
                                      {{ $startTimeF }} <br>
                                       {{$class->code}}
                                      </div>
                                    </a>
                                    <hr>
                                    @endif

                                </div>
                              @endif


                            @endif
                          @endforeach

                        @endforeach
                       </div>
                    </div> 
          @endfor
      </div>
  </div>
</div>  

@include('partials.modalSuccess')   
@include('partials.modalError')       

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {    
        $('.cantBook').click(function(xee){
            xee.preventDefault();
            $('#controllerError').text('Sorry this event or class cannot be booked.');
            $('#alertErrorModal').modal({backdrop: false});
    });     
        
/*
        $(window).resize(function() {
            if ($(this).width() < 749) {
                    $("div.col-md-1_5").removeClass('col-md-1_5');
                }
            else if ($(this).width() >= 750) {
                    $("div.col-md-1_5").addClass('col-md-1_5');
            }
        });
*/


var currentDate = moment().format("YYYY-MM-DD");



if ($(window).width() < 749) {
      $('div.'+currentDate).removeClass('d-none').addClass('d-inline-flex align-items-center flex-wrap');
      $('div#wideScreen').not('.'+currentDate).remove();
    }

});

    $('#nextWeek').click(function(zee){
      zee.preventDefault();
      $('#getNextWeek').submit();
    });
    $('#prevWeek').click(function(yee){
      yee.preventDefault();
      $('#getPrevWeek').submit();
    });


    $('#getPrevDayEvents').click(function(f){
      f.preventDefault();

          var currentDate = moment().format('YYYY-MM-DD'); 
          
          var checkDate = moment($('#begin').val()).subtract(1, 'days').format('YYYY-MM-DD');
          if ( moment(checkDate).isSameOrBefore(currentDate)) {
            $('div.prev').removeClass('d-inline-flex align-items-center').addClass('d-none');
          } else {
            $('div.prev').removeClass('d-none').addClass('d-inline-flex align-items-center flex-wrap');
          }
                var newBegin = moment($('#begin1').val()).subtract(1, 'days').format('YYYY-MM-DD');
                  $.ajax({
                    type: 'get',
                    url : '/schedule',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        mobile: 'true',
                        prev : 'true',
                        begin: $('#begin').val(),
                },
                    success: function (response, status, xhr) {
                      $('#begin1').val(newBegin);
                      $('#begin').val(newBegin);
                      $('div#wideScreen').remove();
                      var count = Object.keys(response).length;
                      if (count == 0) {
                            $('#controllerSuccess').text('There are no events scheduled for this day. Please call us for enquiries or click on next to check what we have tomorrow. Asante');
                            $('#alertSuccuessModal').modal({backdrop: false});
                      } else {

                          var firstElement = response[0];
                          var eventStart = moment(firstElement.start).format('ddd Do');
                          $('#ajaxAppend').empty();
                          $('#ajaxAppend').append('<h5> <strong> '+eventStart+' </strong> </h5>')
                          $.each( response, function( key, value ) {
                            var start = moment(value.start);
                            var finish = moment(value.finish);
                            var duration = finish.diff(start, 'minutes');
                            $('#ajaxAppend').append('<div class="col-sm-1 w-100 text-center"><a href="/schedule_editor/'+value.id+'" class="" ><div class="col-sm-auto" id="myTooltip" data-toggle="tooltip" data-placement="right" title="'+value.desc+'">'+ value.title +' <br>'+ value.code+' </div></a><hr></div>');
                          });
                      }
                    },
                    error: function (response, status, xhr) {
                        $('#controllerError').text(response.error);
                        $('#alertErrorModal').modal({backdrop: false});
                    }
                  });
      
    });

        $('#getNextDayEvents').click(function(g){
          g.preventDefault();
          
          var currentDate = moment().format('YYYY-MM-DD');
        
          if ( moment($('#begin1').val()).isSameOrAfter(currentDate)) {
            $('div.prev').removeClass('d-none').addClass('d-inline-flex align-items-center flex-wrap');
          } else {
            $('div.prev').removeClass('d-inline-flex align-items-center').addClass('d-none');
          }

          var newBegin = moment($('#begin1').val()).add(1, 'days').format('YYYY-MM-DD');
          
                  $.ajax({
                    type: 'get',
                    url : '/schedule',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        mobile: 'true',
                        next : 'true',
                        begin: $('#begin1').val(),
                },
                    success: function (response, status, xhr) {
                      $('#begin1').val(newBegin);
                      $('#begin').val(newBegin);
                      $('div#wideScreen').remove();
                      var count = Object.keys(response).length;
                      if (count == 0) {
                            $('#controllerSuccess').text('There are no events scheduled for this day. Please call us for enquiries or click on next to check what we have tomorrow. Asante');
                            $('#alertSuccuessModal').modal({backdrop: false});
                      } else {

                          var firstElement = response[0];
                          var eventStart = moment(firstElement.start).format('ddd Do');
                          $('#ajaxAppend').empty();
                          $('#ajaxAppend').append('<h5> <strong> '+eventStart+' </strong> </h5>')
                          $.each( response, function( key, value ) {
                            var start = moment(value.start);
                            var finish = moment(value.finish);
                            var duration = finish.diff(start, 'minutes');
                            $('#ajaxAppend').append('<div class="col-sm-1 w-100 text-center"><a href="/schedule_editor/'+value.id+'" class="" ><div class="col-sm-auto" id="myTooltip" data-toggle="tooltip" data-placement="right" title="'+value.desc+'">'+ value.title +' <br>'+ moment(value.start).format('HH:mm') +' <br>'+ value.code +' </div></a><hr></div>');
                          });
                      }
                    },
                    error: function (response, status, xhr) {
                        $('#controllerError').text('Sorry you can only view current week\'s classes or events on Mobile.');
         //               $('#controllerError').text(response.error);
                        $('#alertErrorModal').modal({backdrop: false});
                    }
                  });

    });

//moment(value.start).format('HH:mm') +' <br>'+ duration +
</script>
@endsection

@endif