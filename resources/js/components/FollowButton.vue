<template>
    <div>
        <button class="btn btn-primary follow-btn" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows' ],

        data: function() {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;

                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }

    }
</script>

<style>
    .follow-btn {
        background: linear-gradient(to left, #695CFE, #d35cfe);
        border-radius: 8px;
        border: none;
        width: 110px;
    }

    .follow-btn:hover {
        background: linear-gradient(to left, #8c84ef, #fe5cc8)
    }

    


</style>
