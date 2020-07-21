import React from "react";
import "./view.styles.scss";
import {
    faCalendar,
    faClock,
    faMapPin
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

const EventView = () => {
    return (
        <section
            className="eventView animated slower wow fadeInUp"
            style={{ backgroundColor: "#78845D" }}
        >
            <div className="container-fluid py-3 mt-5">
                <div className="row d-flex justify-content-center align-items-center">
                    <div className="col-md-12 my-4">
                        <h2 className="text-center white-text">Event Title</h2>
                    </div>
                    <div className="event-wrapper">
                        <div className="event-image-wrapper">
                            <img src="#" alt="Event Image" />
                        </div>
                        <div className="event-details">
                            <div className="price-wrapper">
                                <span> KES. 2,000</span>
                            </div>
                            <div className="event-title">
                                <p className="h1 title">Event title</p>
                            </div>
                            <div className="event-small-details">
                                <div className="detail-item date-wrapper">
                                    <FontAwesomeIcon icon={faCalendar} />
                                    <span> 11 - 11 - 2020</span>
                                </div>
                                <div className="detail-item time">
                                    <FontAwesomeIcon icon={faClock} />
                                    <span> 11:20 AM</span>
                                </div>
                                <div className="detail-item location-wrapper">
                                    <FontAwesomeIcon icon={faMapPin} />{" "}
                                    <span> Nairobi</span>
                                </div>
                            </div>
                            <div className="event-description-wrapper">
                                <p>
                                    Sed ut perspiciatis unde omnis iste natus
                                    error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa
                                    quae ab illo inventore veritatis et quasi
                                    architecto beatae vitae dicta sunt
                                    explicabo. Nemo enim ipsam voluptatem quia
                                    voluptas sit aspernatur aut odit aut fugit
                                    sed quia consequuntur magni dolores eos qui
                                    ratione voluptatem sequi nesciunt. Neque
                                    porro quisquam est qui dolorem ipsum quia
                                    dolor sit amet, consectetur, adipisci velit,
                                    sed quia non numquam eius modi tempora
                                    incidunt ut labore et dolore magnam aliquam
                                    quaerat voluptatem. Ut enim ad minima veniam
                                    quis nostrum exercitationem ullam corporis
                                    suscipit laboriosam Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut
                                    odit aut fugit sed quia consequuntur magni
                                    dolores eos qui ratione luptatem sequi
                                    nesciunt. Neque porro quisquam est qui
                                    dolorem ipsum quia dolor sit amet
                                    consectetur
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default EventView;
