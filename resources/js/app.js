require('./bootstrap');

import {createApp} from 'vue'
import Jobs from './components/Jobs'
import Job from "./components/Job";
import JobCreate from "./components/JobCreate";

const app = createApp({})

app.component('jobs', Jobs)
app.component('job', Job)
app.component('job-create', JobCreate)

app.mount('#app')
