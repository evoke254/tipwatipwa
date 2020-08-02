import React,{useState,useEffect} from 'react'
import Axios from 'axios'

const EventFrontMainCategory = (props) => {
    const { match: {params: { categoryID }}} = props
    const [categories, setcategories] = useState(null)
    const [isloaded, setisloaded] = useState(null)
    // const [url, seturl] = useState(initialState)
    console.log(categoryID);
    const url = window.location.href.replace(props.location.pathname,'')


    useEffect(() => {

        if(!isloaded){
        Axios.get(url+'/api/events_and_experiences/')
        .then(res =>{
            setcategories(res.data)
            setisloaded(true)
        })
        .catch(error=>{
            console.log(error.message);
        })
        }
        document.title ="Events and Experiences";

        return () => {

        }
    })
    console.log(categories);

    return (

        <section
            className="MainCategory animated slower wow fadeInUp"
            style={{backgroundColor:'#78845D'}}
        >
            <div className="container-fluid py-3 mt-5">
                <div className="row d-flex justify-content-center align-items-center">
                    <div className="col-md-12 my-4">
                        <h2 className="text-center white-text">
                            All Event Categories
                        </h2>
                    </div>
                    <div className="events-wrapper w-100 row">
                        {categories && categories.map(element => (
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
                                            alt={element.name}
                                        />

                                        <a href={url+"/events_and_experiences/"+element.id}>
                                            <div className="mask rgba-white-slight" />
                                        </a>
                                    </div>
                                    <div className="card-body">
                                        <p className="card-title text-center short-border">
                                            {element.name}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </section>

    )
}

export default EventFrontMainCategory
