<template>
    <div id="app">
        <div class="container body">
            <div class="main_container">

                <div v-if="loggedIn != null">
                    <!--side bar -->
                    <app-side-bar></app-side-bar>
                    <!-- top navigation -->
                    <app-header></app-header>
                    <!-- /top navigation -->

                    <!-- page content -->
                    <div class="right_col" role="main">
                        <router-view></router-view>
                    </div>
                    <!-- /page content -->

                    <!-- footer content -->
                    <app-footer></app-footer>
                    <!-- /footer content -->
                </div>
                <div v-else>
                    <Login></Login>
                </div>
            </div>

        </div>
    </div>
</template>


<script>
import appHeader from './components/common/Header.vue'
import appFooter from './components/common/Footer.vue'
import appSideBar from "./components/common/Sidebar";
import Login from "./components/Login";
export default {
  name: "app",
  components: {
      appHeader,
      appFooter,
      // eslint-disable-next-line vue/no-unused-components
      appSideBar,
      Login
  },
    computed:{
      loggedIn(){
          return this.$store.state.token;
      }
    }

};
</script>

<style>

</style>
