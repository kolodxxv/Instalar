<script setup>
import { ref } from 'vue';
import axios from 'axios';

const showModal = ref(false);
</script>

<template>
  <!-- Sidenav -->
  <div class="nav-container">
    <nav class="sidebar close">
        <header>
          <div class="image-text">
            <span class="image">
              <img src="/svg/camera-alt-svgrepo-com.svg">
            </span>

            <div class="text header-text">
              <span class="name">Instalar</span>
              <span class="profession">Developer</span>
            </div>
          </div>

          <i class='bx bxs-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
          <div class="menu">
            <li class="search-box">
              <i class="bx bx-search icon" ></i>
                <input type="text" placeholder="Search...">
            </li>
            <ul class="menu-links">
              <li class="nav-link">
                <a href="/">
                  <i class="bx bx-home-alt icon" ></i>
                  <span class="text nav-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-link">
                <a v-bind:href="'/profile/' + apiId">
                  <i class="bx bx-user icon" ></i>
                  <span class="text nav-text">Profile</span>
                </a>
              </li>
              <li class="nav-link" @click="showModal = true">
                <a href="#">
                  <i class="bx bx-bell icon" ></i>
                  <span class="text nav-text">Notifications</span>
                </a>
              </li>
              <li class="nav-link">
                <a href="#">
                  <i class="bx bx-heart icon" ></i>
                  <span class="text nav-text">Likes</span>
                </a>
              </li>
            </ul>
          </div>

          <div class="bottom-content"></div>
            <li class="">
              <a href="/logout">
                <i class="bx bx-log-out icon" ></i>
                <span class="text nav-text">Logout</span>
              </a>
            </li>

            <li class="mode">
              <div class="moon-sun">
                <i class="bx bx-moon icon moon" ></i>
                <i class="bx bx-sun icon sun" ></i>
              </div>
              <span class="mode-text text">Dark Mode</span>

              <div class="toggle-switch">
                <span class="switch"></span>
              </div>
            </li>

          </div>
    </nav>
  </div>
  <!-- Modal window for notifications -->
<modal-notify :show="showModal" @close="showModal= false">
  <template #header>
    <h3>Notifications</h3>
  </template>
</modal-notify>

<!-- CSS scripts -->
  <component :is="'script'">
    const body = document.querySelector("body"),
          sidebar = body.querySelector(".sidebar"),
          toggle = body.querySelector(".toggle"),
          searchBtn = body.querySelector(".search-box"),
          modeSwitch = body.querySelector(".toggle-switch"),
          modeText = body.querySelector(".mode-text"),
          container = body.querySelector(".container");

          toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close"),
            container.classList.toggle("open");
           
          });

          searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
          });

          modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if(body.classList.contains("dark")){
              modeText.innerText = "Light Mode"
            } else {
              modeText.innerText = "Dark Mode"
            }
          });


  </component>
</template>

<!-- Component scripts -->
<script>
  export default {
      props: {user: Number},
      data() {
        return {
          modal: false,
          apiId: null
        };
      },
      mounted() {
        axios.get('/id').then(response => {
          this.apiId = response.data;
          console.log(this.apiId);
        }).catch(error => {
          console.log(error);
        })
      }
    }
</script>

<style>
/* Importing Fonts */
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap');
  
*{
  font-family: 'Poppins', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  /* Colors */
  --body-color: #E4E9F7;
  --sidebar-color: #FFF;
  --primary-color: #695CFE;
  --primary-color-light: #F6F5FF;
  --toggle-color: #DDD;
  --text-color: #333333;

  /* Transition */
  --tran-002: all 0.2s ease;
  --tran-003: all 0.3s ease;
  --tran-004: all 0.4s ease;
  --tran-005: all 0.5s ease;
}

body {
  /* height: 100vh; */
  background: var(--primary-color-light);
  transition: var(--tran-005);
}

body.dark {
  --body-color: #18191A;
  --sidebar-color: #242526;
  --primary-color: #3A3B3C;
  --primary-color-light: #3A3B3C;
  --toggle-color: #FFF;
  --text-color: #CCC;
}

ol, ul {
  padding-left: 0px;
}

/* SIDEBAR */
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 250px;
  padding: 10px 14px;
  background: var(--sidebar-color);
  transition: var(--tran-005);
  z-index: 100;
}

.sidebar.close {
  width: 88px;
}

/* REUSABLE */
.sidebar .text {
  font-size: 16px;
  font-weight: 500; 
  color: var(--text-color);
}

.sidebar .image {
  min-width: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sidebar.close .text{
  opacity: 0;
}

.sidebar li {
  height: 50px;
  margin-top: 10px;
  list-style: none;
  display: flex;
  align-items: center;
}

.sidebar li .icon {
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 60px;
  font-size: 20px;
}

.sidebar li .icon,
.sidebar li .text {
  color: var(--text-color);
  transition: var(--tran-002);
}

.sidebar header {
  position: relative;
}

.sidebar .image-text img{
  width: 40px;
  border-radius: 6px;
}

.sidebar header .image-text {
  display: flex;
  align-items: center;
}

header .image-text .header-text {
  display: flex;
  flex-direction: column;
}

.header-text .name {
  font-weight: 600;
}
.header-text .profession {
  margin-top: -2px;
}

.sidebar header .toggle {
  position: absolute;
  top: 50%;
  right: -25px;
  transform: translateY(-50%) rotate(180deg);
  height: 25px;
  width: 25px;
  background: var(--primary-color);
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  color: var(--sidebar-color);
  font-size: 22px;
  transition: var(--tran-003);
}

.sidebar.close header .toggle {
  transform: translateY(-50%);
}

body.dark .sidebar header .toggle {
  color: var(--text-color);
}

.sidebar .menu {
  margin-top: 35px;
}

.sidebar .search-box {
  background: var(--primary-color-light);
  border-radius: 6px;
  transition: var(--tran-005);
}

.search-box input {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 500;
  background-color: var(--primary-color-light);
  transition: var(--tran-005);
  
}

.sidebar li a {
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  border-radius: 6px;
  transition: var(--tran-004);
}

.sidebar li a:hover {
  background: var(--primary-color);
}

.sidebar li a:hover .icon,
.sidebar li a:hover .text {
  color: var(--sidebar-color);
}

body.dark .sidebar li a:hover .icon,
body.dark .sidebar li a:hover .text {
  color: var(--text-color);
}

.sidebar .menu-bar {
  height: calc(100% - 50px);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.menu-bar .mode {
  position: relative;
  border-radius: 6px;
  background: var(--primary-color-light);
}

.menu-bar .mode .moon-sun {
  height: 50px;
  width: 60px;
  display: flex;
  align-items: center;
 
}

.menu-bar .mode i {
  position: absolute;
  transition: var(--tran-003);
}

.menu-bar .mode i.sun {
  opacity: 0;
}

body.dark .menu-bar .mode i.sun {
  opacity: 1;
}

body.dark .menu-bar .mode i.moon {
  opacity: 0;
}

.menu-bar .mode .toggle-switch {
  position: absolute;
  right: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  min-width: 60px;
  cursor: pointer;
  border-radius: 6px;
  background: var(--primary-color-light);
}

.toggle-switch .switch {
  position: relative;
  height: 22px;
  width: 44px;
  border-radius: 25px;
  background: var(--toggle-color);
}

.switch::before {
  content: '';
  position: absolute;
  height: 15px;
  width: 15px;
  border-radius: 50%;
  top: 50%;
  left: 5px;
  transform: translateY(-50%);
  background: var(--sidebar-color);
  transition: var(--tran-003);
}

body.dark .switch::before  {
  left: 24px;
}

.container {
  transition: all 1.5s ease;
}

.container.open {
  position: relative;
  left: 100px;
  height: 100vh;
  width: calc(90% - 250px);
  /* background: var(--body-color); */
  transition: var(--tran-003);
}

/* .home .text {
  font-size: 30px;
  font-weight: 500;
  color: var(--text-color);
  padding: 8px 40px;
} */


body.sidebar.close ~ .container{
  left: 88px;
  width: calc(100% - 88px);
}  

</style>