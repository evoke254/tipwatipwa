import React,{useState,useEffect} from 'react'
import Axios from 'axios'

const EventSubCategoryView = (props) => {
    const { match: {params: { categoryID }}} =props
    const [subCategories, setSubCategories] = useState(null)
    const [isloaded, setisloaded] = useState(null)
    console.log(categoryID);

    useEffect(() => {
        if(!isloaded){
            const url = window.location.href.replace(props.location.pathname,'')
        Axios.get(url+'/api/events_and_experiences/'+categoryID)
        .then(res =>{
            setSubCategories(res.data)
            setisloaded(true)
            console.log(res.data);
            document.title =subCategories && subCategories.name;

        })
        .catch(error=>{
            console.log(error.message);
        })
        }

        return () => {

        }
    })
    return (

        <section
            className="MainCategory animated slower wow fadeInUp"
            style={{backgroundColor:'#78845D'}}
        >
            <div className="container-fluid py-3 mt-5">
                <div className="row d-flex justify-content-center align-items-center">
                    <div className="col-md-12 my-4">
                        <h2 className="text-center white-text">
                            {subCategories && subCategories.name}
                        </h2>
                    </div>
                    <div className="events-wrapper w-100 row">
                        {subCategories && subCategories.sub_categories.map(element => (
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

                                        <a href={"http://127.0.0.1:8000/events_and_experiences/"+categoryID+'/'+element.id}>
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

export default EventSubCategoryView
