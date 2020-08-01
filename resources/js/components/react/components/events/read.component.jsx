import React, { useState, useEffect } from "react";
import "./read.styles.scss";
import { faCalendar, faMapPin,faClock } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import Axios from "axios";
import Moment from "react-moment";

const EventRead = (props) => {
    const {match:{params:{categoryID,subCategoryID}}} = props;
    const [events, setevents] = useState(null);
    const [eventLoaded, seteventLoaded] = useState(false);

    useEffect(() => {
        const url = window.location.href.replace(props.location.pathname,'/')
        if (!eventLoaded) {
            Axios.get(`${url}api/events_and_experiences/${categoryID}/${subCategoryID}`)
                .then(res => {
                    setevents(res.data);
                    seteventLoaded(true);
                })
                .catch(error => console.log(error));
        }
    });
    return (
        <section
            className="eventRead animated slower wow fadeInUp"
            style={{ backgroundColor: "#361E12" }}
        >
            <div className="container-fluid py-3 mt-5">
                <div className="row d-flex justify-content-center align-items-center">
                    <div className="col-md-12 my-4">
                        <h2 className="text-center white-text">
                            {events && events.subCategory.name}
                        </h2>
                    </div>
                    <div className="events-wrapper row">
                        {events && events.events.map(element => (
                            <div key={element.id} className="col-md-4 my-4">
                                <div className="card">
                                    <div className="view overlay">
                                        <img
                                            className="card-img-top"
                                            style={{
                                                height: "350px",
                                                objectFit: "cover"
                                            }}
                                            src={element.image_url}
                                            alt={element.title}
                                        />

                                        <a href={`http://127.0.0.1:8000/events_and_experiences/${categoryID}/${subCategoryID}/${element.id}`}>
                                            <div className="mask rgba-white-slight" />
                                        </a>
                                    </div>
                                    <div className="card-body">
                                        <p className="card-title text-center short-border">
                                            {element.title}
                                        </p>
                                        <div className="event-details">
                                            <div className="location">
                                                <FontAwesomeIcon
                                                    icon={faMapPin}
                                                />
                                                {element.venue}
                                            </div>
                                            <div className="date">
                                                <FontAwesomeIcon
                                                    icon={faCalendar}
                                                />
                                                <Moment date={element.startDate} format="DD MMM YYYY"/>
                                            </div>
                                            <div className="time">
                                                <FontAwesomeIcon
                                                    icon={faClock}
                                                />
                                                <Moment utc={element.startTime} format="HH:mm"/>
                                            </div>
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
