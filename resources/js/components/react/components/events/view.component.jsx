import React, { useEffect, useState } from "react";
import "./view.styles.scss";
import ReactHtmlParser from "react-html-parser";
import {
    faCalendar,
    faClock,
    faMapPin
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import Axios from "axios";
import Moment from "react-moment";

const EventView = (props) => {
    const {
        match: {
            params: { eventId,categoryID,subCategoryID }
        }
    } = props
    const [event, setEvent] = useState("");
    const [dataIsLoaded, setDataIsLoaded] = useState(false);
    useEffect(() => {
        if (!dataIsLoaded) {
            const url = window.location.href.replace(props.location.pathname,'')
            Axios.get(
                `${url}/api/events_and_experiences/${categoryID}/${subCategoryID}/${eventId}`
            ).then(res => {
                setEvent(res.data);
                setDataIsLoaded(true);
            });
        }

        // return () => {
        //     cleanup
        // }
    });
    console.log(event);
    return (
        <section
            className="eventView animated slower wow fadeInUp"
            style={{backgroundColor:'#78845D'}}

        >
            {event && (
                <div className="container-fluid py-3 mt-5">
                    <div className="row d-flex justify-content-center align-items-center">
                        <div className="col-md-12 my-4">
                            <h2 className="text-center white-text">
                                {event.title}
                            </h2>
                        </div>
                        <div className="event-wrapper">
                            <div className="event-image-wrapper">
                                <img
                                    className="img img-responsive"
                                    src={event.image_url}
                                    alt="Event Image"
                                />
                            </div>
                            <div className="event-details">
                                <div className="price-wrapper">
                                    <span>KES {event.cost}</span>
                                </div>
                                <div className="event-title">
                                    <p className="h1 title">{event.title}</p>
                                </div>
                                <div className="event-small-details">
                                    <div className="detail-item date-wrapper">
                                        <FontAwesomeIcon icon={faCalendar} />
                                        <span>
                                            <Moment format="D MMM YYYY" date={event.startDate} />
                                        </span>
                                    </div>
                                    <div className="detail-item time">
                                        <FontAwesomeIcon icon={faClock} />
                                        <span><Moment utc={event.startTime} format="HH mm"/></span>
                                    </div>
                                    <div className="detail-item location-wrapper">
                                        <FontAwesomeIcon icon={faMapPin} />{" "}
                                        <span>{' '+event.venue}</span>
                                    </div>
                                </div>
                                <div className="event-description-wrapper">
                                    {ReactHtmlParser(event.desc)}
                                </div>
                                <div className="event-action">
                                    <button className="btn btn-success"> Buy Ticket</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )}{" "}
        </section>
    );
};

export default EventView;
