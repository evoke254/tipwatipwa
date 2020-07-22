import React from 'react';
import './App.scss';
import { Switch, Route } from 'react-router-dom';
import HomePage from './components/homepage/Homepage.component';
import BlogRead from './components/blog/view.component';
import BlogCreate from './components/blog/create.component';
import GalleryRead from './components/gallery/read.component';
import GalleryCreate from './components/gallery/create.component';
import QuestionsRead from './components/questions/read.component';
import QuestionsCreate from './components/questions/create.component';
import MailConfig from './components/mail/mailconfig.component';
import SchedulesRead from './components/schedule/read.component';
import ScheduleCreate from './components/schedule/create.component';
import EventRead from './components/events/read.component';
import EventView from './components/events/view.component';

function App() {
  return (
    <Switch>
        {/* <Route exact path='/admin/' component={HomePage}/>
        <Route exact path='/admin/blog' component={BlogRead}/>
        <Route exact path='/admin/blog/create' component={BlogCreate}/>
        <Route exact path='/admin/gallery' component={GalleryRead}/>
        <Route exact path='/admin/gallery/create' component={GalleryCreate}/>
        <Route exact path='/admin/questions' component={QuestionsRead}/>
        <Route exact path='/admin/questions/create' component={QuestionsCreate}/>
        <Route exact path='/admin/mailconfig' component={MailConfig}/> */}
        {/* <Route exact path='/admin/schedule' component={SchedulesRead}/> */}
        <Route exact path='/admin/schedule/create' component={ScheduleCreate}/>
        <Route exact path='/eventlist' component={EventRead}/>
        <Route exact path='/eventview/:eventId' component={EventView}/>
    </Switch>
  );
}

export default App;
