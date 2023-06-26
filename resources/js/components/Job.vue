<template>
    <a class="btn btn--fixed" :href="`/jobs`">Back to jobs</a>
    <h1>Job details</h1>
    <div class="job">
        <dl v-if="job" class="job__item">
            <dt class="job__title">
                <a :href="`/jobs/${job.id}`">{{ job.title }}</a>
            </dt>
            <dd class="job__description" v-html="job.description"></dd>
            <dd class="job__date">Posted: {{ job.created_at }}</dd>
        </dl>
    </div>
</template>
<script>
import moment from "moment";

export default {
    props: ['id'],
    methods: {
        getJob(id) {
            axios.get('/api/jobs/' + id)
                .then(response => {
                    this.job = response.data
                    this.job.created_at = moment(this.job.created_at).format('Do MMMM YYYY')
                    this.job.description = this.job.description.replace(/\n/g, '<br>').split('.').map(function (paragraph) {
                        if (paragraph.length > 0) {
                            return '<p>' + paragraph + '.</p>'
                        }
                    }).join('');
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    data() {
        return {
            job: null
        }
    },
    created() {
        this.getJob(this.id)
    }
}
</script>
