import React, { useState } from "react";
import MainLayout from "../main/MainLayout.component";
import "./create.styles.scss";
import ImageUploader from "react-images-uploader";
import "react-images-uploader/styles.css";
import "react-images-uploader/font.css";
import ReactQuill from "react-quill";
import "react-quill/dist/quill.snow.css";
import Axios from "axios";

export const axioPost = (data) => {
  Axios.post("http://localhost:8000/api/admin/events", data)
    .then((res) => {
      console.log(res);
    })
    .catch((exception) => console.log(exception));
};

export const EventDetails = ({ category, subCategory, onFormSubmit }) => {
  const [title, settitle] = useState(null);
  const [location, setLocation] = useState(null);
  const [startTime, setStartTime] = useState(null);
  const [description, setDescription] = useState(null);
  const [startDate, setStartDate] = useState(null);
  const [endDate, setEndDate] = useState(null);
  const [endTime, setEndTime] = useState(null);

  const handleResponse = event=>{
      event.preventDefault()
      const formData = {
          title,
          location,
          startTime,
          endTime,
          startDate,
          endDate,
          description
      }
      onFormSubmit(formData)
  }
  return (
    <div  className="container-fluid">
      <div className="row d-flex justify-content-center">
        <div className="col-md-8">
          <form
            onSubmit={(event) => handleResponse(event)}
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
                  onChange={(event) => settitle(event.target.value)}
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
                  onChange={(event) => setLocation(event.target.value)}
                  required
                />
              </div>
              <div className="col-md-8">
                <div className="row">
                  <div className="col-md-6 form-group">
                    <label htmlFor="start"> Start date</label>
                    <input
                      type="date"
                      className="form-control"
                      id="startDate"
                      name="startDate"
                      value={startDate}
                      onChange={(event) => setStartDate(event.target.value)}
                      required
                    />
                  </div>

                  <div className="col-md-6 form-group">
                    <label htmlFor="endDate"> End date</label>
                    <input
                      type="date"
                      className="form-control"
                      id="endDate"
                      name="endDate"
                      value={endDate}
                      onChange={(event) => setEndDate(event.target.value)}
                      required
                    />
                  </div>
                </div>
              </div>

              <div className="col-md-8">
                <div className="row">
                  <div className="col-md-6 form-group">
                    <label htmlFor="starttime">Start Time</label>
                    <input
                      type="time"
                      className="form-control"
                      id="startTime"
                      name="startTime"
                      value={startTime}
                      onChange={(event) => setStartTime(event.target.value)}
                      required
                    />
                  </div>
                  <div className="col-md-6 form-group">
                    <label htmlFor="endTime">End Time</label>
                    <input
                      type="time"
                      className="form-control"
                      id="endTime"
                      name="endTime"
                      value={endTime}
                      onChange={(event) => setEndTime(event.target.value)}
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
                  Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};
export const EventImages = (props) => {
  const [pictures, setPictures] = useState([]);

  const onDrop = (picture) => {
    setPictures([...pictures, picture]);
  };
  return (
    <ImageUploader
      {...props}
      withIcon={true}
      onChange={onDrop}
      imgExtension={[".jpg", ".gif", ".png", ".gif"]}
      maxFileSize={5242880}
    />
  );
};

const ScheduleCreate = () => {
  const categories = [
    {
      id: 1,
      name: "fitness for all",
      subCategories: [
        {
          id: 2,
          name: "fi subcategory name",
        },
      ],
    },
    {
      id: 3,
      name: "explore and discover",
      subCategories: [
        {
          id: 4,
          name: "f2 subcategory name",
        },
      ],
    },
    {
      id: 5,
      name: "train and motivate",
      subCategories: [
        {
          id: 5,
          name: "f3subcategory name",
        },
      ],
    },
  ];
  const [currentStep, setCurrentStep] = useState(0);
  const stepTitles = ["Category", "Sub Category", "Details", "Images"];
  const [selectedCategory, setSelectedCategory] = useState(null);
  const [selectedSubCategory, setSelectedSubCategory] = useState(null);
  const [eventDetails, seteventDetails] = useState(null);
  const submitAllData =data =>{
      const category_id = parseInt(selectedCategory);
      const subCategory_id = parseInt(selectedSubCategory);
      const allData ={...data,category_id,subCategory_id}
      console.log(allData);
      axioPost(allData);
  }

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
            onSubmit={(event) => event.preventDefault()}
            method="POST"
          >
            {currentStep < 2 ? (
              <div className="step-title waves-effect">
                Select {stepTitles[currentStep]}
              </div>
            ) : (
              <div className="step-title waves-effect">
                Event {stepTitles[currentStep]}
              </div>
            )}
            <div className="step-content">
              <div className="form-group row">
                <div className="col-md-12">
                  {currentStep === 0 && (
                    <select
                      name="category"
                      id="category"
                      className="form-control"
                      onChange={(event) =>
                        setSelectedCategory(event.target.value)
                      }
                    >
                      <option value={0} selected="selected" disabled>
                        Event Category
                      </option>
                      {categories.map((element) => (
                        <option value={element.id}>{element.name}</option>
                      ))}
                    </select>
                  )}
                  {currentStep === 1 && selectedCategory && (
                    <select
                      name="category"
                      id="category"
                      className="form-control"
                      onChange={(event) =>
                        setSelectedSubCategory(event.target.value)
                      }
                    >
                      <option value={0} selected="selected" disabled>
                        Event Sub Category
                      </option>
                      {categories
                        .filter(
                          (category) => (category.id = selectedCategory)
                        )[0]
                        .subCategories.map((element) => (
                          <option value={element.id}>{element.name}</option>
                        ))}
                    </select>
                  )}
                  {selectedSubCategory &&
                    selectedCategory &&
                    currentStep === 2 && (
                      <EventDetails
                        category={selectedCategory}
                        subCategory={selectedSubCategory}
                        onFormSubmit={data=>submitAllData(data)}
                      />
                    )}
                  {currentStep === 3 && <EventImages />}
                </div>
              </div>
              <div className="step-actions">
                {/* Here goes your actions buttons */}

                {selectedCategory && currentStep > 0 && (
                  <button
                    onClick={() => setCurrentStep(currentStep - 1)}
                    className="waves-effect waves-dark btn next-step"
                  >
                    Previous Step
                  </button>
                )}

                <button
                  onClick={() => {
                    selectedCategory && setCurrentStep(currentStep + 1);
                  }}
                  className={`waves-effect waves-dark btn next-step ${
                    currentStep === 3 && "btn-success"
                  }`}
                >
                  {currentStep < 3 ? "Next Step" : "Finish"}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </MainLayout>
  );
};

export default ScheduleCreate;
