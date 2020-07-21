import React, { useState } from "react";
import MainLayout from "../main/MainLayout.component";
import "./create.styles.scss";
import ReactQuill from "react-quill";
import "react-quill/dist/quill.snow.css";
import Axios from "axios";
import { DropzoneArea } from "material-ui-dropzone";

export const EventDetails = ({ onFormSubmit }) => {
    const [title, settitle] = useState(null);
    const [location, setLocation] = useState(null);
    const [startTime, setStartTime] = useState(null);
    const [description, setDescription] = useState(null);
    const [startDate, setStartDate] = useState(null);
    const [endDate, setEndDate] = useState(null);
    const [endTime, setEndTime] = useState(null);
    const [formHasError, setformHasError] = useState(null);

    const handleResponse = event => {
        event.preventDefault();
        if (
            (title,
            location,
            startTime,
            endTime,
            startDate,
            endDate,
            description)
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
export const EventCategorySelector = ({ onSelectALL }) => {
    const [selectedCategory, setSelectedCategory] = useState(null);
    const [selectedSubCategory, setSelectedSubCategory] = useState(null);

    const categories = [
        {
            id: 1,
            name: "fitness for all",
            subCategories: [
                {
                    id: 2,
                    name: "fi subcategory name"
                }
            ]
        },
        {
            id: 3,
            name: "explore and discover",
            subCategories: [
                {
                    id: 4,
                    name: "f2 subcategory name"
                }
            ]
        },
        {
            id: 5,
            name: "train and motivate",
            subCategories: [
                {
                    id: 5,
                    name: "f3subcategory name"
                }
            ]
        }
    ];

    const handleNextStep = () => {
        const data = { selectedCategory, selectedSubCategory };
        onSelectALL(data);
    };
    return (
        <div>
            <div className="form-group">
                <label htmlFor="category"> Category</label>

                <select
                    name="category"
                    id="category"
                    className="form-control"
                    onChange={event => setSelectedCategory(event.target.value)}
                >
                    <option value={0} selected="selected" disabled>
                        Event Category
                    </option>
                    {categories.map(element => (
                        <option value={element.id}>{element.name}</option>
                    ))}
                </select>
            </div>
            <br />
            <br />

            {selectedCategory && (
                <div className="form-group">
                    <select
                        name="category"
                        id="category"
                        className="form-control"
                        onChange={event =>
                            setSelectedSubCategory(event.target.value)
                        }
                    >
                        <option value={0} selected="selected" disabled>
                            Event Sub Category
                        </option>
                        {categories
                            .filter(
                                category => (category.id = selectedCategory)
                            )[0]
                            .subCategories.map(element => (
                                <option value={element.id}>
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
const ScheduleCreate = () => {
    const [currentStep, setcurrentStep] = useState(1);
    const stepTitles = [
        "Category",
        "Details",
        "Images",
        "Now Subitting to database"
    ];
    const [eventDetails, seteventDetails] = useState(null);
    const [eventCategory, seteventCategory] = useState(null);
    const [eventImages, seteventImages] = useState(null);
    const [serverResponse, setserverResponse] = useState(null);
    const submitAllData = () => {
        const data = new FormData();
        const category_id = parseInt(eventCategory.selectedCategory);
        const subCategory_id = parseInt(eventCategory.selectedSubCategory);


        data.append('category_id',category_id)
        data.append('subCategory_id',subCategory_id)
        for (const key in eventDetails) {
            data.append(key,eventDetails[key])
        }
        eventImages.map(element=>data.append('images[]',element))
        // const allData = {
        //     ...eventDetails,
        //     category_id,
        //     subCategory_id,
        //     eventImages
        // };
        const url = "http://3d115aa0d4a1.ngrok.io/api/admin/events";
        Axios.post(url, data, {
            crossDomain:true,

            headers: {
                "Access-Control-Allow-Origin": "*",
                "Access-Control-Allow-Methods": "GET, POST, PATCH, PUT, DELETE, OPTIONS",
                "Access-Control-Allow-Headers": "Origin, Content-Type, X-Auth-Token",
                "Content-Type": "multipart/form-data"
            }
        })
            .then(res => {
                console.log(res);
                setserverResponse(res);
            })
            .catch(error => {
                console.log(res);
                setserverResponse(error);
            });

        // console.log(allData);
        // axioPost(allData);
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
        console.log(...data)
        seteventImages(data);
        setcurrentStep(4);
    };

    console.log("currentStep", currentStep);

    return (
        <MainLayout>
            <div className="ScheduleCreate">
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
                    <form
                        className="validate-form"
                        onSubmit={event => event.preventDefault()}
                        method="POST"
                    >
                        {
                            <div className="step-title waves-effect">
                                Event {stepTitles[currentStep - 1]}
                            </div>
                        }
                        <div className="step-content">
                            <div className="form-group row">
                                <div className="col-md-12">
                                <EventImages
                                            onFileChange={data =>
                                                handleEventImages(data)
                                            }
                                        />
                                    {currentStep == 1 && (
                                        <EventCategorySelector
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

                                {currentStep < 4 ||
                                    (serverResponse && (
                                        <button
                                            onClick={() => {
                                                setcurrentStep(currentStep - 1);
                                            }}
                                            className={`waves-effect waves-dark btn next-step `}
                                        >
                                            Previous Step
                                        </button>
                                    ))}
                                {eventDetails &&
                                    eventCategory &&
                                    eventImages != null &&
                                    currentStep === 4 && (
                                        <button
                                            onClick={submitAllData}
                                            className={`waves-effect waves-dark btn next-step  btn-success`}
                                        >
                                            Submit
                                        </button>
                                    )}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </MainLayout>
    );
};

export default ScheduleCreate;
