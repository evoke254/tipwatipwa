import React from "react";
import "./read.styles.scss";
import {faCalendar,faMapPin} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'

const EventRead = props => {
    const elements = [1, 2, 3, 4];
    return (
        <section
            className="eventRead animated slower wow fadeInUp"
            style={{ backgroundColor: "#361E12" }}
        >
            <div className="container-fluid py-3 mt-5">
                <div className="row d-flex justify-content-center align-items-center">
                    <div className="col-md-12 my-4">
                        <h2 className="text-center white-text">
                            List of All Events
                        </h2>
                    </div>
                    <div className="events-wrapper">
                        {elements.map(element => (
                            <div className="col my-4">
                                <div className="card">
                                    <div className="view overlay">
                                        <img
                                            className="card-img-top"
                                            style={{
                                                height: "350px",
                                                objectFit: "cover"
                                            }}
                                            src={window.location.host+"/images/woman-abs-workout-dumbbell.jpg"}
                                            alt="Swift Apps Africa"
                                        />

                                        <a href="#!">
                                            <div className="mask rgba-white-slight" />
                                        </a>
                                    </div>
                                    <div className="card-body">
                                        <p className="card-title text-center short-border">
                                            Virtual Fitness Sessions
                                        </p>
                                        <div className="event-details">
                                            <div className="location"><FontAwesomeIcon icon={faMapPin}/> Nairobi</div>
                                            <div className="date"><FontAwesomeIcon icon={faCalendar}/> 31 05 2000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </section>
    );
};
export default EventRead;
