import React, { useState, useEffect } from "react";
import "./index.styles.scss";
import Axios from "axios";

export const CreateEventSubCategory = ({ eventCategories, onSubmit }) => {

    const [name, setname] = useState('')
    const [parent, setparent] = useState('')
    const [nameIsValid, setnameIsValid] = useState(false)
    const [parentIsValid, setparentIsValid] = useState(false)
    const handleSubmit = () => {
    onSubmit({category_id:parent,name})
    console.log('parent',parent,'name',name)

    };

    return (
        <div className="CreateEventSubCategory">
            <h4 className="text-center">Create new event sub category </h4>

            <div className="form-group">
                <label htmlFor="parent"> Parent Category</label>
                <select
                    onChange={event =>  {
                        setparent(event.target.value);
                        setparentIsValid(true);}
                    }
                    defaultValue={parent}
                    name="parent"
                    className="form-control"
                    id="parent"
                >
                    {eventCategories.map(element => (
                        <option key={element.id} value={element.id}>
                            {element.name}
                        </option>
                    ))}
                </select>
            </div>
                        {parentIsValid &&
                        <div className={`form-group`}>
                        <label htmlFor="subcategory_name">Subcategory Name</label>
                        <input
                            id="subcategory_name"
                            value={name}
                            onChange={event =>
                                setname(event.target.value)
                            }
                            onBlur={()=>{
                                console.log('onblur called');
                                if (name.length<4) {
                                    setnameIsValid(false)

                                }else{
                                    setnameIsValid(true)
                                }
                            }}
                            type="text"
                            className={`form-control `}
                        />
                      {!nameIsValid && name.length<4 &&
                      <span className="text-danger form-control-feedback">Input cannot be less than 3 characters</span>

                      }
                    </div>

                        }
            <div className="form-group">
              {nameIsValid && parentIsValid &&  <button onClick={handleSubmit} className="btn">
                    Create Sub Category
                </button>}
            </div>
        </div>
    );
};

const EventCategory = () => {
    const [formEventCategory, setformEventCategory] = useState("");
    const [eventCategoryIsLoaded, seteventCategoryIsLoaded] = useState(false);
    const [eventCategories, setEventCategories] = useState([]);
    const [eventSubCategoryPostSuccess, seteventSubCategoryPostSuccess] = useState(false)
    useEffect(() => {
        if (!eventCategoryIsLoaded) {
            Axios.get("http://127.0.0.1:8000/api/admin/event/category")
                .then(res => {
                    setEventCategories(res.data);
                    console.log("categories", res.data);
                    seteventCategoryIsLoaded(true);
                })
                .catch(error => {
                    console.log("error", error);
                });
        }
    });


    const handleEventCategoryPost = () => {
        if (formEventCategory) {
            const data = new FormData();
            data.append("name", formEventCategory);
            Axios.post(
                "http://3d115aa0d4a1.ngrok.io/api/admin/event/category",
                data,
                {
                    crossDomain: true,

                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Access-Control-Allow-Methods":
                            "GET, POST, PATCH, PUT, DELETE, OPTIONS",
                        "Access-Control-Allow-Headers":
                            "Origin, Content-Type, X-Auth-Token",
                        "Content-Type": "multipart/form-data"
                    }
                }
            )
                .then(res => {
                    console.log(res.data);
                })
                .catch(error => {
                    console.log("error", error);
                });
        }
    };
    const handleEventSubcategoryPost = data => {
        seteventSubCategoryPostSuccess(false);
        const form = new FormData();
        form.append('name',data.name)
        form.append('category_id',data.category_id)
        Axios.post('http://127.0.0.1:8000/api/admin/event/subcategory',form,{crossDomain:true})
        .then(res=>{
            seteventSubCategoryPostSuccess(true)

        }).catch(error=>{
            console.log(error.message)
        })
    };

    return (
        <div className="EventCatgory">
            <div
                className="container mt-4"
                data-animation="true"
                data-animation-type="fadeInUp"
            >
                <h1 className="text-center">Event Grouping</h1>
                <div className="form-wrapper">
                    <div className="row">
                        <div className="col-md-6">
                            <h4 className="text-center">
                                Create new event category
                            </h4>
                            <div className="form-group">
                                <label htmlFor="category_name">
                                    Category Name
                                </label>
                                <input
                                    id="category_name"
                                    value={formEventCategory}
                                    onChange={event =>
                                        setformEventCategory(event.target.value)
                                    }
                                    type="text"
                                    className="form-control"
                                />
                            </div>
                            <div className="form-group">
                                {formEventCategory.length > 4 && (
                                    <button
                                        onClick={handleEventCategoryPost}
                                        className="btn"
                                    >
                                        Create Category
                                    </button>
                                )}
                            </div>
                        </div>
                        <div className="col-md-6">
                            {eventCategories.length > 0 && (
                                <CreateEventSubCategory
                                    onSubmit={formdata =>
                                        handleEventSubcategoryPost(formdata)
                                    }
                                    eventCategories={eventCategories}
                                />
                            )}
                            {eventSubCategoryPostSuccess && <div className='well'>
                                <h2 className="text-success">Subcategory Created successfully</h2>
                                </div>}
                        </div>
                    </div>
                </div>
            </div>
        <div className="p-4"/>


        </div>
    );
};

export default EventCategory;
