import React from 'react';
import './App.scss';
import { Switch, Route } from 'react-router-dom';
import ScheduleCreate from './components/schedule/create.component';
import EventRead from './components/events/read.component';
import EventView from './components/events/view.component';
import EventCategory from './components/events/categoy/index.component';
import EventFrontMainCategory from './components/events/categoy/Front/MainCategory.component';
import EventSubCategoryView from './components/events/categoy/Front/SubCategory.component';

function App() {
  return (
    <Switch>
        <Route exact path='/admin/schedule/create' component={ScheduleCreate}/>
        <Route exact path='/admin/event/category' component={EventCategory}/>
        <Route exact path='/events_and_experiences' component={EventFrontMainCategory}/>
        <Route exact path='/events_and_experiences/:categoryID' component={EventSubCategoryView}/>
        <Route exact path='/events_and_experiences/:categoryID/:subCategoryID' component={EventRead}/>
        <Route exact path='/events_and_experiences/:categoryID/:subCategoryID/:eventId' component={EventView}/>
    </Switch>
  );
}

export default App;
