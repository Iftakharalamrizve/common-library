<template>
    <div id="app">
        <div class="container body">
            <div class="main_container">

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
        </div>
    </div>
</template>


<script>
import appHeader from './components/common/Header.vue'
import appFooter from './components/common/Footer.vue'
import appSideBar from "./components/common/Sidebar";
export default {
  name: "app",
  components: {
      appHeader,
      appFooter,
      // eslint-disable-next-line vue/no-unused-components
      appSideBar
  }
};
</script>

<style>

</style>
