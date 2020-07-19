<template>           
  <div>
    <div class="row justify-content-center align-items-center">
       <div class="col">
          <i class="fas fa-plus-circle fa-2x mr-4 green p-1 white-text rounded hoverable myPointer mb-3" style="font-size: 30px" aria-hidden="true" v-on:click="getmymodal"></i>
                <FullCalendar 
                  height='700px'
                  :options="calendarOptions"
              />
          </div>
    </div>       
  </div>
</template>
<style lang='scss'>

@import '~@fullcalendar/common/main.css';
@import '~@fullcalendar/daygrid/main.css';

</style>
<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'

import datePicker from 'vue-bootstrap-datetimepicker';
    export default {
        components: {
            FullCalendar,  datePicker
          },
        props: ['requestparams'],
        mounted() {
                axios.get('/calendar/'+this.requestparams.moduleName+'/'+this.requestparams.objectId).then((response) => {
                this.calendarEvents = response.data;
            });
            },

        data () {
              return {


                calendarOptions: {
                  plugins: [ dayGridPlugin ],
                  initialView: 'dayGridMonth',
                  eventColor:"green",
                  eventTextColor:"white",
                  height:'686px',
                  header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                },
               calendarEvents:[],
                title: '',
                start: '',
                details: '',
                end: '',
                location: '',
                update: '',
                id: '',
                date: new Date(),
                options: {
                  format: 'YYYY-MM-DD HH:mm',
                  useCurrent: false,
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
                    },
                },
                myselectedevent: [],    
              }
            },
        methods: {
            getmymodal(e) {
              this.id = '';
              this.title = '';
              this.location = '';
              this.start = '';
              this.end = '';
              this.details = '';
              this.update = "";
               $('#editModal').modal();
            },
            formSubmit(e) {
                e.preventDefault();
                if(!this.title || this.title.trim() === '') {
                        $('#alertErrorModal').modal({backdrop: false});
                        return
                    }
                if(!this.location || this.location.trim() === '') {
                        $('#alertErrorModal').modal({backdrop: false});
                        return
                    }
                if(!this.start || this.start.trim() === '') {
                        $('#alertErrorModal').modal({backdrop: false});
                        return
                    }
                if(!this.end || this.end.trim() === '') {
                        $('#alertErrorModal').modal({backdrop: false});
                        return
                    }
              axios.post('/calendar', {
                    id: this.id,
                    title: this.title,
                    location: this.location,
                    start: this.start,
                    end: this.end,
                    details: this.details,
                    update: this.update,
                    /*add Attendees*/
                    module_name: this.requestparams.moduleName,
                    object_id: this.requestparams.objectId,
                    User_id: this.requestparams.userId
                    }).then((response) => {
                        this.calendarEvents = response.data;
                      $('#alertSuccessModal').modal({backdrop: false});
                    });
                    $('#editModal').modal('hide');
            },
        /*load edit update delete*/
        eventclicked(calEvent) {
              axios.get('/calendar/'+calEvent.event.id).then((response) => {
                var selectedEvent  = response.data;

              this.id = selectedEvent[0].id;
              this.title = selectedEvent[0].title;
              this.start = selectedEvent[0].start;
              this.location = selectedEvent[0].location;
              this.end = selectedEvent[0].end;
              this.details = selectedEvent[0].details;
              this.update = "true";
                });
          $('#editModal').modal();
          }
        },
    }
</script>

