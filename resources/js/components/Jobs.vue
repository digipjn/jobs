<template>
    <a class="btn btn--fixed" :href="`/jobs/create`">Add job</a>
    <h1>Jobs listing</h1>
    <div class="jobs">
        <dl v-for="job in jobs" :key="job.id" class="jobs__item">
            <dt class="jobs__title">
                <a :href="`/jobs/${job.id}`">{{ job.title }}</a>
            </dt>
            <dd class="jobs__description">{{ job.description }}</dd>
        </dl>
    </div>
</template>
<script>
export default {
    methods: {
        getJobs() {
            axios.get('/api/jobs')
                .then(response => {
                    this.jobs = response.data.data
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    data() {
        return {
            jobs: []
        }
    },
    created() {
        this.getJobs()
    }
}
</script>
