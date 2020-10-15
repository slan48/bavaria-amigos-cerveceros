<template>
    <DefaultLayout>
        <div class="play-and-win-instructions-page">
            <div class="container py-45px">
                <h2 class="font-bold text-24px text-primary text-center uppercase lg:leading-normal leading-none">INGRESA TUS CÓDIGOS, JUEGA Y GANA ESPECTACULARES PREMIOS</h2>
                <p class="text-center text-gray-dark text-18px mb-25px lg:-mt-2">Recuerda que puedes ingresar máximo dos códigos por premio</p>

                <div class="awards-box">
                    <h3 class="bg-primary tracking-tighter text-white uppercase text-27px py-5px text-center rounded-t-10px">Premios octubre</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5px pt-5px" v-if="awards && awards.length">
                        <div class="bg-white p-10px relative" v-for="award in awards">
                            <div class="flex flex-wrap items-end">
                                <div class="w-1/4">
                                    <p class="text-90px leading-70px font-bold text-gray-dark">{{ award.stock }}</p>
                                    <span class="text-primary text-16px tracking-tighter uppercase leading-16px block">{{ award.name }}</span>
                                </div>
                                <img class="w-3/4 object-center object-contain" :src="award.image_path" alt="">
                            </div>
                            <div class="grid grid-cols-2 gap-5px mt-10px">
                                <input v-model="code[award.id]" class="text-center py-5px px-7px bg-gray-light text-gray-dark placeholder-gray uppercase rounded-10px tracking-tighter" placeholder="Ingresa tu código" />
                                <button class="py-5px px-7px bg-primary text-white uppercase rounded-10px tracking-tighter focus:outline-none" @click.prevent="startParticipation(award.id)">Jugar ahora</button>
                            </div>
                            <p class="text-primary" v-if="$page.errors.code && $page.errors.award_id == award.id">{{ $page.errors.code[0] }}</p>
                            <div v-if="!award.available" class="absolute top-0 left-0 w-full h-full z-10 uppercase text-white text-center flex justify-center items-center text-22px leading-22px" style="background: rgba(0,0,0,0.8);">
                                Premio disponible<br>en {{ award.available_month }}
                            </div>
                        </div>
                    </div>
                </div>
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
            }, {preserveScroll: true})
        }
    }
}
</script>

<style scoped lang="scss">
.play-and-win-instructions-page{
    background-image: url('/img/bg-white.jpg');
    background-size: cover;
    background-position: center;
}

img{
    height: 140px;
}
</style>
