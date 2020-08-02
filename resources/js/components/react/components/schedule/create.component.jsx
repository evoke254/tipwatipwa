import React, { useState, useEffect } from "react";
import "./create.styles.scss";
import ReactQuill from "react-quill";
import "react-quill/dist/quill.snow.css";
import Axios from "axios";
import { DropzoneArea } from "material-ui-dropzone";
import SweetAlert from "react-bootstrap-sweetalert";

export const EventDetails = ({ onFormSubmit }) => {
    const [title, settitle] = useState("");
    const [location, setLocation] = useState("");
    const [startTime, setStartTime] = useState("");
    const [description, setDescription] = useState("");
    const [startDate, setStartDate] = useState("");
    const [endDate, setEndDate] = useState("");
    const [endTime, setEndTime] = useState("");
    const [formHasError, setformHasError] = useState(null);

    const handleResponse = event => {
        event.preventDefault();
        if (
            (title.length > 0,
            location.length > 0,
            startTime.length > 0,
            endTime.length > 0,
            startDate.length > 0,
            endDate.length > 0,
            description.length > 0)
        ) {
            const formData = {
                title,
                location,
                startTime,
                endTime,
                startDate,
                endDate,
                description
            };
            onFormSubmit(formData);
        } else {
            setformHasError(true);
        }
    };
    return (
        <div className="container-fluid">
            {formHasError && (
                <h3 style={{ color: "red", fontStyle: "italic" }}>
                    Please fill all fields to continue!
                </h3>
            )}
            <div className="row d-flex justify-content-center">
                <div className="col-md-12">
                    <form
                        onSubmit={event => handleResponse(event)}
                        method="post"
                        action="/admin/1/"
                        encType="multipart/form-data"
                    >
                        <div className="row d-flex justify-content-center">
                            <div className="col-md-8 form-group">
                                <label htmlFor="title">Title</label>
                                <input
                                    type="text"
                                    className="form-control"
                                    id="title"
                                    name="title"
                                    value={title}
                                    onChange={event =>
                                        settitle(event.target.value)
                                    }
                                    required
                                />
                            </div>
                            <div className="col-md-8 form-group">
                                <label htmlFor="location">Location</label>
                                <input
                                    type="text"
                                    className="form-control"
                                    id="location"
                                    name="location"
                                    value={location}
                                    onChange={event =>
                                        setLocation(event.target.value)
                                    }
                                    required
                                />
                            </div>
                            <div className="col-md-8">
                                <div className="row">
                                    <div className="col-md-6 form-group">
                                        <label htmlFor="start">
                                            {" "}
                                            Start date
                                        </label>
                                        <input
                                            type="date"
                                            className="form-control"
                                            id="startDate"
                                            name="startDate"
                                            value={startDate}
                                            onChange={event =>
                                                setStartDate(event.target.value)
                                            }
                                            required
                                        />
                                    </div>

                                    <div className="col-md-6 form-group">
                                        <label htmlFor="endDate">
                                            {" "}
                                            End date
                                        </label>
                                        <input
                                            type="date"
                                            className="form-control"
                                            id="endDate"
                                            name="endDate"
                                            value={endDate}
                                            onChange={event =>
                                                setEndDate(event.target.value)
                                            }
                                            required
                                        />
                                    </div>
                                </div>
                            </div>

                            <div className="col-md-8">
                                <div className="row">
                                    <div className="col-md-6 form-group">
                                        <label htmlFor="starttime">
                                            Start Time
                                        </label>
                                        <input
                                            type="time"
                                            className="form-control"
                                            id="startTime"
                                            name="startTime"
                                            value={startTime}
                                            onChange={event =>
                                                setStartTime(event.target.value)
                                            }
                                            required
                                        />
                                    </div>
                                    <div className="col-md-6 form-group">
                                        <label htmlFor="endTime">
                                            End Time
                                        </label>
                                        <input
                                            type="time"
                                            className="form-control"
                                            id="endTime"
                                            name="endTime"
                                            value={endTime}
                                            onChange={event =>
                                                setEndTime(event.target.value)
                                            }
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="col-md-8 form-group">
                                <label htmlFor="description">Description</label>
                                <ReactQuill
                                    id="description"
                                    value={description}
                                    onChange={setDescription}
                                    theme="snow"
                                />
                            </div>
                            <div className="col-md-12">
                                <button
                                    type="submit"
                                    className="btn btn-success btn-md text-center"
                                >
                                    Next Step
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
};
export const EventImages = ({ onFileChange }) => {
    const [pictures, setpictures] = useState([]);

    const handleSubmit = () => {
        onFileChange(pictures);
    };

    return (
        <div>
            <DropzoneArea
                acceptedFiles={["image/*"]}
                dropzoneText={"Drag and drop an image here or click"}
                onChange={files => setpictures(files)}
                filesLimit={1}

            />
            {pictures.length > 0 && (
                <button
                    onClick={handleSubmit}
                    className="waves-effect waves-dark btn next-step"
                >
                    Next Step
                </button>
            )}
        </div>
    );
};
export const EventCategorySelector = ({ onSelectALL,url }) => {
    const [selectedCategory, setSelectedCategory] = useState(null);
    const [selectedSubCategory, setSelectedSubCategory] = useState(null);
    const [categories, setcategories] = useState([]);
    const [isLoaded, setisLoaded] = useState(false);

    useEffect(() => {
        if (!isLoaded) {
            Axios.get(url+"/api/admin/event/category", {
                headers: { crossDomain: true }
            })

                .then(res => {
                    // console.log(res.data);
                    setcategories(res.data);
                    setisLoaded(true);
                })
                .catch(error => {
                    alert(
                        "Error fetching categories from server. Reason:" +
                            error.message
                    );
                });
        }

        // return () => {

        // }
    });

    const handleNextStep = () => {
        const data = { selectedCategory, selectedSubCategory };
        onSelectALL(data);
    };
    return (
        <div>
            <div className="form-group">
                <label htmlFor="category"> Category</label>

                {categories.categories && (
                    <select
                        name="category"
                        id="category"
                        className="form-control"
                        defaultValue='0'
                        onChange={event =>
                            setSelectedCategory(event.target.value)
                        }
                    >
                        <option value={0} disabled>
                            Event Category
                        </option>
                        {categories.categories.map(element => (
                            <option key={element.id} value={element.id}>{element.name}</option>
                        ))}
                    </select>
                )}
            </div>
            <br />
            <br />

            {selectedCategory && (
                <div className="form-group">
                    <select
                        name="category"
                        id="category"
                        className="form-control"
                        defaultValue='0'
                        onChange={event =>
                            setSelectedSubCategory(event.target.value)
                        }
                    >
                        <option value={0} disabled>
                            Event Sub Category
                        </option>
                        {categories.sub_categories
                            .filter(
                                sub_category => sub_category.category_id == selectedCategory
                            ).map(element => (
                                <option key={element.id} value={element.id}>
                                    {element.name}
                                </option>
                            ))}
                    </select>
                </div>
            )}
            {selectedCategory && selectedSubCategory && (
                <button
                    onClick={handleNextStep}
                    className="waves-effect waves-dark btn next-step"
                >
                    Next Step
                </button>
            )}
        </div>
    );
};
export const LoadingAnimation =()=>(
    <div className="d-flex justify-content-center">
    <div>
        <div
            className="spinner-grow text-primary"
            role="status"
        >
            <span className="sr-only">
                Loading...
            </span>
        </div>
        <div
            className="spinner-grow text-secondary"
            role="status"
        >
            <span className="sr-only">
                Loading...
            </span>
        </div>
        <div
            className="spinner-grow text-success"
            role="status"
        >
            <span className="sr-only">
                Loading...
            </span>
        </div>
        <div
            className="spinner-grow text-danger"
            role="status"
        >
            <span className="sr-only">
                Loading...
            </span>
        </div>
        <div
            className="spinner-grow text-warning"
            role="status"
        >
            <span className="sr-only">
                Loading...
            </span>
        </div>
        <div
            className="spinner-grow text-info"
            role="status"
        >
            <span className="sr-only">
                Loading...
            </span>
        </div>
        <div
            className="spinner-grow text-light"
            role="status"
        >
            <span className="sr-only">
                Loading...
            </span>
        </div>
        <div
            className="spinner-grow text-dark"
            role="status"
        >
            <span className="sr-only">
                Loading...
            </span>
        </div>
    </div>
</div>

)
const ScheduleCreate = (props) => {
    const [currentStep, setcurrentStep] = useState(1);
    const stepTitles = ["Category", "Details", "Images"];
    const [eventDetails, seteventDetails] = useState(null);
    const [eventCategory, seteventCategory] = useState(null);
    const [eventImages, seteventImages] = useState(null);
    const [serverResponse, setserverResponse] = useState(null);
    const [dataSubmitted, setdataSubmitted] = useState(false);
    const [issubmitting, setissubmitting] = useState(false);
    const submitAllData = () => {
        const data = new FormData();
        const category_id = parseInt(eventCategory.selectedCategory);
        const subCategory_id = parseInt(eventCategory.selectedSubCategory);

        data.append("category_id", category_id);
        data.append("subCategory_id", subCategory_id);
        for (const key in eventDetails) {
            data.append(key, eventDetails[key]);
        }
        eventImages.map(element => data.append("images[]", element));
        const url = window.location.href.replace(props.location.pathname,'')
        setissubmitting(true);
        Axios.post(url+'/api/admin/events', data, {
            crossDomain: true,

            headers: {
                "Access-Control-Allow-Origin": "*",
                "Access-Control-Allow-Methods":
                    "GET, POST, PATCH, PUT, DELETE, OPTIONS",
                "Access-Control-Allow-Headers":
                    "Origin, Content-Type, X-Auth-Token",
                "Content-Type": "multipart/form-data"
            }
        })
            .then(res => {
                // console.log(res);
                setdataSubmitted(true);
                setissubmitting(false);
            })
            .catch(error => {
                // console.log(error.response.data);
                setserverResponse(error.message);
                setissubmitting(false);
            });
    };
    const handleEventDetails = data => {
        if (data) {
            seteventDetails(data);
            setcurrentStep(3);
        }
    };
    const handleEventCategory = data => {
        if (data) {
            seteventCategory(data);
            setcurrentStep(2);
        }
    };
    const handleEventImages = data => {
        seteventImages(data);
        setcurrentStep(4);
    };
    return (
        <div className="ScheduleCreate">

            {dataSubmitted && (
                <SweetAlert
                    onConfirm={()=>{
                        // console.log('confim,called');
                       setcurrentStep(1)
                       setdataSubmitted(false)
                    }}
                    success
                    title="Event was created successfully"
                >
                    Page will now reload
                </SweetAlert>
            )}
            {serverResponse && (
                <SweetAlert
                    onConfirm={() => {
                        setserverResponse(null);
                        setdataSubmitted(false)

                    }}
                    danger
                    title="We encountered an error"
                >
                    {serverResponse}
                </SweetAlert>
            )}

            <div
                className="container mt-4"
                data-animation="true"
                data-animation-type="fadeInUp"
            >
                <div className="row d-flex justify-content-center">
                    <div className="col-md-12 col-lg-12 col-sm-12 text-center">
                        <h4 className="deep-orange-text">
                            Add Event to Calendar
                            <p />
                        </h4>
                    </div>
                </div>
                {
                    <div className="step-title waves-effect">
                        {currentStep < 4 &&
                            "Event " + stepTitles[currentStep - 1]}
                        {issubmitting && (<LoadingAnimation/>)}
                    </div>
                }
                <div className="step-content">
                    <div className="form-group row">
                        <div className="col-md-12">
                            {currentStep == 1 && (
                                <EventCategorySelector url={window.location.href.replace(props.location.pathname,'')}
                                    onSelectALL={event =>
                                        handleEventCategory(event)
                                    }
                                />
                            )}
                            {eventCategory && currentStep === 2 && (
                                <EventDetails
                                    onFormSubmit={data =>
                                        handleEventDetails(data)
                                    }
                                />
                            )}
                            {currentStep === 3 && (
                                <EventImages
                                    onFileChange={data =>
                                        handleEventImages(data)
                                    }
                                />
                            )}
                            {/* {currentStep === 4 && (
                                        <div>{serverResponse}</div>
                                    )} */}
                        </div>
                    </div>
                    <div className="step-actions">
                        {/* Here goes your actions buttons */}

                        {currentStep > 1 && (
                            <button
                                onClick={() => {
                                    setcurrentStep(currentStep - 1);
                                }}
                                className={`waves-effect waves-dark btn next-step `}
                            >
                                Previous Step
                            </button>
                        )}
                        {eventDetails &&
                            eventCategory &&
                            eventImages != null &&
                            currentStep === 4 && !issubmitting &&  (
                                <button
                                    onClick={submitAllData}
                                    className={`waves-effect waves-dark btn next-step  btn-success`}
                                >
                                    Submit Event
                                </button>
                            )}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ScheduleCreate;
