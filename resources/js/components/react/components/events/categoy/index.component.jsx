import React, { useState, useEffect } from "react";
import "./index.styles.scss";
import Axios from "axios";
import { LoadingAnimation, EventImages } from "../../schedule/create.component";
import SweetAlert from "react-bootstrap-sweetalert";

export const CreateEventSubCategory = ({ eventCategories, onSubmit }) => {
    const [name, setname] = useState("");
    const [parent, setparent] = useState("");
    const [nameIsValid, setnameIsValid] = useState(false);
    const [subCategoryPic, setSubCategoryPic] = useState(null);
    const [parentIsValid, setparentIsValid] = useState(false);
    const handleSubmit = () => {
        onSubmit({ category_id: parent, name, subCategoryPic });
        console.log("parent", parent, "name", name);
    };

    return (
        <div className="CreateEventSubCategory">
            <h4 className="text-center">Create new event sub category </h4>

            <div className="form-group">
                <label htmlFor="parent"> Parent Category</label>
                <select
                    onChange={event => {
                        setparent(event.target.value);
                        setparentIsValid(true);
                    }}
                    defaultValue='place-holder'
                    name="parent"
                    className="form-control"
                    id="parent"
                >
                    <option value="place-holder">Select Category</option>
                    {eventCategories.map(element => (
                        <option key={element.id} value={element.id}>
                            {element.name}
                        </option>
                    ))}
                </select>
            </div>
            {parentIsValid && (
                <div className={`form-group`}>
                    <label htmlFor="subcategory_name">Subcategory Name</label>
                    <input
                        id="subcategory_name"
                        value={name}
                        onChange={event => setname(event.target.value)}
                        onBlur={() => {
                            console.log("onblur called");
                            if (name.length < 4) {
                                setnameIsValid(false);
                            } else {
                                setnameIsValid(true);
                            }
                        }}
                        type="text"
                        className={`form-control `}
                    />
                    {!nameIsValid && name.length < 4 && (
                        <span className="text-danger form-control-feedback">
                            Input cannot be less than 3 characters
                        </span>
                    )}
                </div>
            )}
            <div className="form-group">
                {nameIsValid && parentIsValid && (
                    <EventImages
                        onFileChange={data => setSubCategoryPic(data)}
                    />
                )}
            </div>
            <div className="form-group">
                {nameIsValid && parentIsValid && subCategoryPic && (
                    <button onClick={handleSubmit} className="btn btn-success">
                        Create Sub Category
                    </button>
                )}
            </div>
        </div>
    );
};

const EventCategory = props => {
    const [formEventCategory, setformEventCategory] = useState("");
    const [categoryPic, setCategoryPic] = useState(null);
    const [eventCategoryIsLoaded, seteventCategoryIsLoaded] = useState(false);
    const [eventCategories, setEventCategories] = useState([]);
    const [
        eventSubCategoryPostSuccess,
        seteventSubCategoryPostSuccess
    ] = useState(false);
    const [isSubmitting, setisSubmitting] = useState(false);
    const [submitSuccess, setsubmitSuccess] = useState(false);
    const [errorMessage, seterrorMessage] = useState(null);
    const url = window.location.href.replace(props.location.pathname, "");
    useEffect(() => {
        if (!eventCategoryIsLoaded) {
            setisSubmitting(true);
            seterrorMessage(null);
            Axios.get(url + "/api/admin/event/category")
                .then(res => {
                    setEventCategories(res.data);
                    setisSubmitting(false);
                    // console.log("categories", res.data);
                    seteventCategoryIsLoaded(true);
                })
                .catch(error => {
                    seteventCategoryIsLoaded(true);

                    seterrorMessage(error.message);
                    console.log("error", error.message);
                });
        }
    });

    const handleEventCategoryPost = () => {
        if (formEventCategory) {
            setisSubmitting(true);
            seterrorMessage(null);
            const data = new FormData();
            data.append("name", formEventCategory);
            categoryPic.map(image => data.append("images[]", image));
            Axios.post(url + "/api/admin/event/category", data, {
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
                    setisSubmitting(false);
                    setsubmitSuccess(true);
                    console.log(res.data);
                })
                .catch(error => {
                    setisSubmitting(false);
                    seterrorMessage(error.message);
                    console.log("error", error);
                });
        }
    };
    const handleEventSubcategoryPost = data => {
        seteventSubCategoryPostSuccess(false);
        seterrorMessage(null);
        setisSubmitting(true);
        setsubmitSuccess(false);
        const form = new FormData();
        form.append("name", data.name);
        form.append("category_id", data.category_id);
        data.subCategoryPic.map(image => form.append("images[]", image));
        Axios.post(url + "/api/admin/event/subcategory", form, {
            crossDomain: true,
            headers: {
                "Content-Type": "multipart/form-data"
            }
        })
            .then(res => {
                setisSubmitting(false);
                setsubmitSuccess(true);
                seteventSubCategoryPostSuccess(true);
            })
            .catch(error => {
                setisSubmitting(false);
                seterrorMessage(error.message);
                console.log(error.message);
            });
    };
    // const handleDelete =(type,id)=>{
    //     const newURL = type=='cat'?
    //     Axios.delete(url)
    // }

    return (
        <div className="EventCatgory">
            {submitSuccess && (
                <SweetAlert
                    onConfirm={() => {
                        setsubmitSuccess(null);
                    }}
                    success
                    title="Action successfully completed"
                />
            )}
            {errorMessage && (
                <SweetAlert
                    onConfirm={() => {
                        setisSubmitting(false);
                        seterrorMessage(null);
                    }}
                    danger
                    title="An error occured during submission"
                >
                    {errorMessage}
                </SweetAlert>
            )}
            <div
                className="container mt-4"
                data-animation="true"
                data-animation-type="fadeInUp"
            >
                <h1 className="text-center">Event Grouping</h1>
                {isSubmitting && <LoadingAnimation />}
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
                            {formEventCategory.length > 4 && (
                                <div className="form-group">
                                    <EventImages
                                        onFileChange={data =>
                                            setCategoryPic(data)
                                        }
                                    />
                                </div>
                            )}

                            <div className="form-group">
                                {formEventCategory.length > 4 && categoryPic && (
                                    <button
                                        onClick={handleEventCategoryPost}
                                        className="btn btn-success"
                                    >
                                        Create Category
                                    </button>
                                )}
                            </div>
                        </div>
                        <div className="col-md-6">
                            {eventCategories && eventCategories.length > 0 && (
                                <CreateEventSubCategory
                                    onSubmit={formdata =>
                                        handleEventSubcategoryPost(formdata)
                                    }
                                    eventCategories={eventCategories}
                                />
                            )}
                        </div>
                    </div>
                </div>
            </div>
            <div className="p-4" />
            <h2 className="title">Main Category</h2>
            <section className="w-100 table-responsive">
                <table
                    id="kahakidt"
                    className="table table-striped table-hover"
                >
                    <thead>
                        <tr>
                            <th className="text-nowrap" scope="col">
                                Image
                            </th>
                            <th className="text-nowrap" scope="col">
                                Name
                            </th>
                            <th>Edit</th>
                            <th className="text-danger">Delete</th>
                        </tr>
                    </thead>

                    <tbody className="table-striped">
                        {eventCategories.categories &&
                            eventCategories.categories.map(element => (
                                <tr>
                                    <td>
                                        <img
                                            src={element.image_url}
                                            className="img-responsive img-fluid rounded"
                                            style={{ height: 75 }}
                                        />
                                    </td>
                                    <td>{element.name}</td>
                                    <td>
                                        <button className="btn btn-sm btn-warning">
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button className="btn btn-danger px-2 btn-sm">
                                            <i
                                                className="fas fa-trash"
                                                aria-hidden="true"
                                            />
                                        </button>
                                    </td>
                                </tr>
                            ))}
                    </tbody>
                </table>
            </section>
            <h2 className="title">Sub Categories</h2>
            <section className="w-100 table-responsive">
                <table
                    id="kahakidt"
                    className="table table-striped table-hover"
                >
                    <thead>
                        <tr>
                            <th className="text-nowrap" scope="col">
                                Image
                            </th>
                            <th className="text-nowrap" scope="col">
                                Name
                            </th>
                            <th className="text-nowrap" scope="col">
                                Category
                            </th>
                            <th>Edit</th>
                            <th className="text-danger">Delete</th>
                        </tr>
                    </thead>

                    <tbody className="table-striped">
                        {eventCategories.sub_categories &&
                            eventCategories.sub_categories.map(element => (
                                <tr key={element.id}>
                                    <td>
                                        <img
                                            src={element.image_url}
                                            className="img-responsive img-fluid rounded"
                                            style={{ height: 75 }}
                                        />
                                    </td>
                                    <td>{element.name}</td>
                            <td>{element.category.name}</td>

                                    <td>
                                        <button className="btn btn-sm btn-warning">
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button className="btn btn-danger px-2 btn-sm">
                                            <i
                                                className="fas fa-trash"
                                                aria-hidden="true"
                                            />
                                        </button>
                                    </td>
                                </tr>
                            ))}
                    </tbody>
                </table>
            </section>
        </div>
    );
};

export default EventCategory;
