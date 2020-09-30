<template>
    <DefaultLayout>
        Hola mundo, estas logueado: {{ user.name }}
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";
export default {
    components: {
        DefaultLayout
    },
    props: {
        user: Object
    }
}
</script>

<style scoped>

</style>
