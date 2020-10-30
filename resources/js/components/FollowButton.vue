<template>
    <div>
          <button class="btn btn-primary ml-3 mb-1" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
          props: ['userId', 'follows'], /* de aici luam userId care urmeaza dupa link-ul de follow/ si il punem in methods mai jos */
        mounted() {
            console.log('Component mounted.')
        },

          data: function (){
                return {
                      status: this.follows,
                }
          },

          methods: {
              followUser() {
                    axios.post('/follow/' + this.userId)
                        .then(response => {
                              this.status = ! this.status /* linia asta face refresh la ui altfel nu se actualizeaza butonul de follow */
                              console.log(response.data) /* printam in consola raspunsul primit cand facem request la data */
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
                      return (this.status) ? 'Unfollow' : 'Follow'  /* setam numele butonului, iar in buton am pus v-text = 'numele la functia asta' */
                }
          }
    }
</script>
