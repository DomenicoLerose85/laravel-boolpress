<template>
  <div>
    <h1>CIAOO</h1>
    <!-- <app-main /> -->
    <header-component />
    <main-component />
    <footer-component />
  </div>
</template>

<script>
import AppMain from "../components/AppMain.vue";
import HeaderComponent from "../components/HeaderComponent.vue";
import MainComponent from "../components/MainComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";
export default {
  name: "App",
  components: {
    AppMain,
    HeaderComponent,
    MainComponent,
    FooterComponent,
  },
};
</script>
