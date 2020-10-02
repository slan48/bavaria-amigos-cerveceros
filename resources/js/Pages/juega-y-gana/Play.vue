<template>
    <DefaultLayout>
        <div class="game-play-page">
            <div class="container py-45px">
                Estas en la página del juego y has registrado tu participacion, no puedes recargar la pagina
            </div>
        </div>
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";

export default {
    components: {
        DefaultLayout
    },
    props: {
        awards: Array
    },
    data(){
        return {
            code: {}
        }
    },
    methods: {
        startParticipation(award_id){
            this.$inertia.post('/participations', {
                award_id: award_id,
                user_id: this.$page.user.id,
                code: this.code[award_id]
            })
        }
    }
}
</script>

<style scoped lang="scss">
.game-play-page{
    background-image: url('/img/bg-white.jpg');
    background-size: cover;
    background-position: center;
}

img{
    height: 140px;
}
</style>
