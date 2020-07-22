import React, { useState } from 'react'
import './index.styles.scss'

const EventCategory = () => {
    const [eventCategory, seteventCategory] = useState('');
    const [eventSubCategory, seteventSubCategory] = useState('')
    return (
        <div className='EventCatgory'>
               <div
                    className="container mt-4"
                    data-animation="true"
                    data-animation-type="fadeInUp"
                >
                    <h1 className='text-center'>Event Category</h1>
                    <div className="form-wrapper">
                        <div className="row">
                            <div className="col-md-6">
                                <div className="form-group">
                                    <label htmlFor="category_name">Category Name</label>
                                    <input id='category_name' value={eventCategory} onChange={event=>seteventCategory(event.target.value)} type="text" className="form-control"/>
                                </div>
                                <div className="form-group">
                                <button className='btn'>Create Category</button>

                                </div>
                            </div>
                            <div className="col-md-6">
                                <div className="form-group">
                                    <label htmlFor="subcategory_name">Subcategory Name</label>
                                    <input id="subcategory_name" value={eventSubCategory} onChange={event=>seteventSubCategory(event.target.value)} type="text" className="form-control"/>
                                </div>
                                <div className="form-group">
                                <button className='btn'>Create Sub Category</button>

                                </div>
                            </div>
                        </div>
                    </div>
                     </div>


        </div>
    )
}

export default EventCategory
