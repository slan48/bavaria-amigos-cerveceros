<template>
    <DefaultLayout>
        <div class="play-and-win-instructions-page">
            <div class="container py-45px">
                <h2 class="font-bold text-24px text-primary text-center uppercase">INGRESA TUS CÓDIGOS, JUEGA Y GANA ESPECTACULARES PREMIOS</h2>
                <p class="text-center text-gray-dark text-18px mb-25px -mt-2">Recuerda que puedes ingresar máximo dos códigos por premio</p>

                <div class="awards-box">
                    <h3 class="bg-primary tracking-tighter text-white uppercase text-27px py-5px text-center rounded-t-10px">Premios octubre</h3>
                    <div class="grid grid-cols-3 gap-5px pt-5px" v-if="awards && awards.length">
                        <div class="bg-white p-10px" v-for="award in awards">
                            <div class="flex flex-wrap items-end">
                                <div class="w-1/4">
                                    <p class="text-90px leading-70px font-bold text-gray-dark">{{ award.stock }}</p>
                                    <span class="text-primary text-16px tracking-tighter uppercase leading-16px block">{{ award.name }}</span>
                                </div>
                                <img class="w-3/4 object-center object-contain" :src="award.image_path" alt="">
                            </div>
                            <div class="grid grid-cols-2 gap-5px mt-10px">
                                <button class="py-5px px-7px bg-gray-light text-gray uppercase rounded-10px tracking-tighter">Ingresa tu código</button>
                                <button class="py-5px px-7px bg-primary text-white uppercase rounded-10px tracking-tighter">Jugar ahora</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";

export default {
    components: {
        DefaultLayout
    },
    props: {
        awards: Array
    },
    data(){
        return {
            form: {
                commercial_id: '',
                username: '',
                password: 'password',
                remember: false
            }
        }
    },
    methods: {
        login(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                this.$inertia.post('/login', this.form)
            });
            console.log(this.$page);
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
