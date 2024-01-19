<script setup>
import axios from 'axios';
import moment from 'moment';

   const props = defineProps({
    show: Boolean
   });

</script>

<template>
    <Transition name="modal">
      <div v-if="show" class="modal-mask">
        <div class="modal-container">
          <div class="modal-header">
            <slot name="header">default header</slot>
          </div>
  
          <div class="modal-body">
            <div v-if="followers.length" name="body">
              <div v-for="follower in followers">
                <small>{{ moment(follower.pivot.created_at).format('DD.MM.YY HH:MM') }}&nbsp;</small>
                <span>
                  <a v-bind:href="'/profile/' + follower.pivot.user_id" style="text-decoration: none; color: #42b983;;">
                    <b>{{ follower.username }}</b>
                  </a> is now following
                </span>
              </div>
            </div>
            <div v-else><h3>There is nothing for now</h3></div> 
          </div>
  
          <div class="modal-footer">
            <slot name="footer">
             
              <button
                class="modal-default-button"
                @click="$emit('close')"
              >OK</button>
            </slot>
          </div>
        </div>
      </div>
    </Transition>
  </template>

<script>
  export default {
    data(){
      return {
        followers: {},
        moment: moment
      };
    },
    mounted() {
      axios.get('/followers').then(response => {
        this.followers = response.data;
        console.log(response.data);
      }).catch(error => {
        console.log(error);
      })
    }
  }
</script>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  transition: opacity 0.3s ease;
}

.modal-container {
  margin: auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

/* .modal-footer {
  display: flex;
  flex-direction: column;
} */

.modal-default-button {
  /* margin-top: auto; */
  float: right;
}
</style>
