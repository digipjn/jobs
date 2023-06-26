<template>
    <a class="btn btn--fixed" :href="`/jobs`">Back to jobs</a>
    <h1>Add job</h1>
    <div v-if="errors" class="errors">
        <div v-for="error in errors" class="error">{{ error[0] }}</div>
    </div>
    <form @submit.prevent="createJob" class="form">
        <div class="form__group">
            <label for="title">Title</label>
            <input  type="text" id="title" v-model="title">
        </div>
        <div class="form__group">
            <label for="description">Description</label>
            <textarea  id="description" v-model="description"></textarea>
        </div>
        <div class="form__group">
            <button type="submit" class="btn">Add job</button>
        </div>
    </form>
</template>
<script>
export default {
    methods: {
        createJob() {
            axios.post('/api/jobs/', {
                title: this.title,
                description: this.description
            })
                .then(response => {
                    location.href = '/jobs/' + response.data.id
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                    console.log("ERRORs: %o", error.response.data)
                })
        }
    },
    data() {
        return {
            errors: [],
            title: '',
            description: ''
        }
    }
}
</script>
