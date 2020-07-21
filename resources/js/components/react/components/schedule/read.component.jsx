import React,{useEffect,useState} from "react";
import MainLayout from "../main/MainLayout.component";

import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import Axios from "axios";


const SchedulesRead = () => {
    const [events, setevents] = useState(null)
    const [calendaEvents, setcalendaEvents] = useState([])
    useEffect(() => {
        Axios.get('http://localhost:8000/api/admin/events').then(
            res=>{
                if(!events){
                     setevents(res.data);
                const data = res.data
                // console.log(typeof data, data);
                data.data.map(element=>{
                    const format = {
                        'title':element.title,
                        'start':element.startDate,
                        'end':element.endDate
                    }
                    setcalendaEvents([...calendaEvents,format])
                })
                }

            }
        )
        return () => {

        }
    })
    console.log(events)
  return (
    <MainLayout>
      <div className="container">
        <div className="row d-flex justify-content-center">
          <div className="col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center">
            <h4 className="short-border font-weight-bold"> Calendar</h4>
          </div>
          <div className="col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center">
            <div style={{width:'100%'}} className="card p-4">
              <div className="card-body">
                <a
                  href="/admin/schedule/create"
                  className="btn btn-sm btn-success"
                >
                  Add Event
                </a>
                <FullCalendar
                  eventColor="green"
                  eventTextColor="white"
                  timeFormat="HH(:mm)"
                  header={{
                    right: "prev,next",
                    center: "title",
                    left: "month,agendaWeek,agendaDay,listMonth",
                  }}
                  defaultValue="listDay"
                  plugins={[dayGridPlugin]}
                  initialView="dayGridMonth"
                  events={calendaEvents? calendaEvents:[]}
                />
              </div>
            </div>
          </div>
        </div>
        <div
          className="modal fade"
          id="editModal"
          tabIndex={-1}
          role="dialog"
          aria-labelledby="myModalLabel"
          aria-hidden="true"
        >
          <div className="modal-dialog modal-lg" role="document">
            <div className="modal-content">
              <div className="modal-header text-center">
                <h4 className="modal-title w-100" id="myModalLabel">
                  Edit Event
                </h4>
                <button
                  type="button"
                  className="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">
                <form method="POST" action id="createEvent">
                  <input type="hidden" name="eventId" id="eventId" />
                  <input type="hidden" name="event_id" id="event_id" />
                  <div className="row">
                    <div className="col-md-12">
                      <a
                        href
                        id="detailsPage"
                        className="btn btn-md btn-warning"
                      >
                        Details...
                      </a>
                    </div>
                    <div className="col-md-6">
                      <div className="form-group row">
                        <label
                          htmlFor="title"
                          className="col-sm-3 col-form-label"
                        >
                          {" "}
                          Title
                        </label>
                        <div className="col-md-12">
                          <input
                            type="text"
                            className="form-control"
                            id="title"
                            name="title"
                          />
                        </div>
                      </div>
                      <div className="form-group row">
                        <div className="col-md-12">
                          <label
                            htmlFor="start"
                            className="col-sm-3 col-form-label"
                          >
                            {" "}
                            Start
                          </label>
                          <div
                            className="input-group d"
                            id="datetimepicker1"
                            data-target-input="nearest"
                          >
                            <input
                              type="text"
                              name="start"
                              id="start"
                              className="form-control datetimepicker-input"
                              data-target="#datetimepicker1"
                            />
                            <div
                              className="input-group-append"
                              data-target="#datetimepicker1"
                              id="startdiv"
                              data-toggle="datetimepicker"
                            >
                              <div className="input-group-text">
                                <i className="fa fa-calendar" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="form-group row">
                        <label
                          htmlFor="status"
                          className="col-sm-3 col-form-label"
                        >
                          {" "}
                          Status
                        </label>
                        <div className="col-md-12">
                          <select
                            className="form-control"
                            id="status"
                            name="status"
                          >
                            <option value="Active">Active</option>
                            <option value="Cancelled">Cancelled</option>
                          </select>
                        </div>
                      </div>
                      <div className="form-group row">
                        <label
                          htmlFor="image"
                          className="col-sm-3 col-form-label"
                        >
                          {" "}
                          Image
                        </label>
                        <div className="col-md-12">
                          <a href data-lightbox="kahaki" id="lightboxImg">
                            <img
                              src
                              className="img-responsive"
                              id="shImage"
                              style={{ width: 150 }}
                              alt="Kahaki Images"
                            />
                          </a>
                        </div>
                      </div>
                    </div>
                    <div className="col-md-6">
                      <div className="form-group row">
                        <label
                          htmlFor="venue"
                          className="col-sm-3 col-form-label"
                        >
                          {" "}
                          Venue
                        </label>
                        <div className="col-md-12">
                          <input
                            type="text"
                            className="form-control"
                            id="venue"
                            name="venue"
                          />
                        </div>
                      </div>
                      <div className="form-group row">
                        <div className="col-md-12">
                          <label
                            htmlFor="start"
                            className="col-sm-3 col-form-label"
                          >
                            {" "}
                            Finish
                          </label>
                          <div
                            className="input-group date"
                            id="datetimepicker2"
                            data-target-input="nearest"
                          >
                            <input
                              type="text"
                              name="finish"
                              id="finish"
                              className="form-control datetimepicker-input"
                              data-target="#datetimepicker2"
                            />
                            <div
                              className="input-group-append"
                              data-target="#datetimepicker2"
                              data-toggle="datetimepicker"
                            >
                              <div className="input-group-text">
                                <i className="fa fa-calendar" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="form-group row">
                        <label
                          htmlFor="title"
                          className="col-sm-3 col-form-label"
                        >
                          {" "}
                          Cost
                        </label>
                        <div className="col-md-12">
                          <input
                            type="number"
                            className="form-control"
                            id="cost"
                            name="cost"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="row">
                    <div className="col-md-12">
                      <label htmlFor="desc" className="col-sm-3 col-form-label">
                        Description
                      </label>
                      <div className="col-md-12">
                        <textarea
                          id="desc"
                          className="form-control"
                          name="desc"
                          defaultValue={""}
                        />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div className="modal-footer">
                <button
                  type="button"
                  className="btn btn-md btn-grey"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button
                  type="submit"
                  className="btn btn-md btn-dark-green"
                  id="updateEvent"
                >
                  Update
                </button>
              </div>
            </div>
          </div>
        </div>
        <div
          className="modal fade"
          id="alertSuccuessModal"
          tabIndex={-1}
          role="dialog"
          aria-labelledby="myModalLabel"
          aria-hidden="true"
        >
          <div
            className="modal-dialog modal-sm modal-notify modal-success"
            role="document"
          >
            <div className="modal-content">
              <div className="modal-header">
                <h4 className="modal-title w-100 text-center" id="myModalLabel">
                  Success
                </h4>
                <button
                  type="button"
                  className="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">
                <div className="text-center">
                  <i className="fas fa-check fa-4x mb-3 animated rotateIn" />
                  <h6 id="controllerSuccess">Event Succesfully Generated.</h6>
                </div>
              </div>
              <div className="modal-footer">
                <button
                  type="button"
                  className="btn btn-success btn-sm"
                  data-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <div
          className="modal fade"
          id="alertErrorModal"
          tabIndex={-1}
          role="dialog"
          aria-labelledby="myModalLabel"
          aria-hidden="true"
        >
          <div
            className="modal-dialog modal-sm modal-notify modal-danger"
            role="document"
          >
            <div className="modal-content">
              <div className="modal-header">
                <h4 className="modal-title w-100 text-center" id="myModalLabel">
                  Error
                </h4>
                <button
                  type="button"
                  className="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">
                <div className="text-center">
                  <i className="fas fa-times  fa-4x mb-3 animated rotateIn" />
                  <h6 className="text-danger" id="controllerError">
                    Something is not right. Check that all fields have been
                    properly filled before submitting the form. <br />
                    If this error persists please contact Kahaki on 0742968713
                  </h6>
                </div>
              </div>
              <div className="modal-footer">
                <button
                  type="button"
                  className="btn btn-danger btn-sm"
                  data-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <div
          className="modal fade"
          id="createKahakiEvent"
          tabIndex={-1}
          role="dialog"
          aria-labelledby="myModalLabel"
          aria-hidden="true"
        >
          <div className="modal-dialog modal-lg" role="document">
            <div className="modal-content">
              <div className="modal-header text-center">
                <h4 className="modal-title w-100" id="myModalLabel">
                  Create New Calendar Event
                </h4>
                <button
                  type="button"
                  className="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div className="modal-body">
                <form method="POST" action id="createEvent22">
                  <div className="row">
                    <div className="col-md-6">
                      <div className="form-group row">
                        <label className="col-sm-6 col-form-label">
                          Select Category
                        </label>
                        <div className="col-md-12">
                          <select
                            name="classOrEvent"
                            id="classOrEvent"
                            className="form-control"
                          >
                            <option value={0} selected="selected" disabled>
                              Type of Event
                            </option>
                            <option value="Fit">Fitness For All</option>
                            <option value="Explore">
                              Explore &amp; Discover
                            </option>
                            <option value="Train">Train &amp; Motivate</option>
                          </select>
                        </div>
                      </div>
                      <div id="ctitle" className="form-group row">
                        <label className="col-sm-3 col-form-label">
                          Select Class
                        </label>
                        <div className="col-md-12">
                          <select
                            id="getTitle"
                            name="getTitle"
                            className="form-control"
                          >
                            <option value={0} selected="selected" disabled>
                              Pick the class type
                            </option>
                            @foreach ($services as $service)
                            <option value="{{$service->id}}">
                              {"{"}
                              {"{"}$service-&gt;title{"}"}
                              {"}"}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div id="trainer" className="form-group row">
                        <label className="col-sm-3 col-form-label">
                          Trainer
                        </label>
                        <div className="col-md-12">
                          <select
                            id="trainer"
                            name="trainer"
                            className="form-control"
                          >
                            <option selected="N">Pick a Trainer</option>
                            @foreach ($trainers as $trainer)
                            <option value="{{$trainer->fname}} {{$trainer->lname}}">
                              {"{"}
                              {"{"}$trainer-&gt;fname{"}"}
                              {"}"} {"{"}
                              {"{"}$trainer-&gt;lname{"}"}
                              {"}"}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div id="etitle" className="form-group row">
                        <label className="col-sm-3 col-form-label">
                          Event Title
                        </label>
                        <div className="col-md-12">
                          <input
                            type="text"
                            name="geteTitle"
                            id="geteTitle"
                            className="form-control"
                            placeholder="Event Name"
                          />
                        </div>
                      </div>
                      <div className="form-group row">
                        <div className="col-md-12">
                          <label
                            htmlFor="start"
                            className="col-sm-3 col-form-label"
                          >
                            {" "}
                            Start{" "}
                          </label>
                          <div
                            className="input-group date"
                            id="datetimepicker3"
                            data-target-input="nearest"
                          >
                            <input
                              type="text"
                              name="getStart"
                              id="getStart"
                              className="form-control picker-input"
                              data-target="#datetimepicker3"
                            />
                            <div
                              className="input-group-append"
                              data-target="#datetimepicker3"
                              id="startdiv"
                              data-toggle="datetimepicker"
                            >
                              <div className="input-group-text">
                                <i className="fa fa-calendar" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="form-group row">
                        <label
                          htmlFor="status"
                          className="col-sm-3 col-form-label"
                        >
                          {" "}
                          Status
                        </label>
                        <div className="col-md-12">
                          <select
                            className="form-control"
                            id="getStatus"
                            name="getStatus"
                          >
                            <option value="Active">Active</option>
                            <option value="Cancelled">Cancelled</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div className="col-md-6">
                      <div className="form-group row " id="evenue">
                        <label
                          htmlFor="venue"
                          className="col-sm-3 col-form-label"
                        >
                          {" "}
                          Venue
                        </label>
                        <div className="col-md-12">
                          <input
                            type="text"
                            className="form-control"
                            id="getVenue"
                            name="getVenue"
                          />
                        </div>
                      </div>
                      <div className="form-group row">
                        <div className="col-md-12">
                          <label
                            htmlFor="start"
                            className="col-sm-3 col-form-label"
                          >
                            {" "}
                            Finish
                          </label>
                          <div
                            className="input-group date"
                            id="datetimepicker4"
                            data-target-input="nearest"
                          >
                            <input
                              type="text"
                              name="getFinish"
                              id="getFinish"
                              className="form-control datetimepicker-input"
                              data-target="#datetimepicker4"
                            />
                            <div
                              className="input-group-append"
                              data-target="#datetimepicker4"
                              data-toggle="datetimepicker"
                            >
                              <div className="input-group-text">
                                <i className="fa fa-calendar" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div className="form-group row">
                        <label
                          htmlFor="title"
                          className="col-sm-3 col-form-label"
                        >
                          {" "}
                          Cost
                        </label>
                        <div className="col-md-12">
                          <input
                            type="number"
                            className="form-control"
                            id="getCost"
                            name="getCost"
                          />
                        </div>
                      </div>
                      <div className="form-group row" id="monthly">
                        <label
                          htmlFor="mothly"
                          className="col-sm-3 col-form-label"
                        >
                          Monthly
                        </label>
                        <div className="col-md-12">
                          <div className="custom-control custom-checkbox">
                            <input
                              type="checkbox"
                              className="custom-control-input"
                              id="repeatClass"
                              name="repeatClass"
                              defaultValue="true"
                            />
                            <label
                              className="custom-control-label text-danger"
                              htmlFor="repeatClass"
                            >
                              Reiterate Class/Event same day and time this
                              month.
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="row">
                    <div className="col-md-12">
                      <label htmlFor="desc" className="col-sm-3 col-form-label">
                        Description
                      </label>
                      <div className="col-md-12">
                        <textarea
                          id="getDesc"
                          name="getDesc"
                          className="form-control"
                          defaultValue={""}
                        />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div className="modal-footer">
                <button
                  type="button"
                  className="btn btn-md btn-grey"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button
                  type="button"
                  className="btn btn-md btn-dark-green"
                  id="createClassEvent"
                >
                  Create Event
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </MainLayout>
  );
};

export default SchedulesRead;
