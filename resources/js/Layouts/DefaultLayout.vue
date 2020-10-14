<template>
    <div class="default-layout">
        <Header />
        <slot />
        <Footer />

        <!-- Modal Portal -->
        <portal-target name="modal" multiple>
        </portal-target>
    </div>
</template>

<script>
import Header from "../components/Header";
import Footer from "../components/Footer";
export default {
    components: {
        Header,
        Footer
    }
}
</script>

<style scoped>
.default-layout{
    min-height: 100vh;
}
</style>
