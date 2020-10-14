<template>
    <DefaultLayout>
        <div class="login-page pt-50px pb-80px">
            <div class="container flex items-center flex-wrap px-15px md:px-0">
                <div class="w-full md:w-5/12 ml-auto mb-15px md:mb-0">
                    <img class="block w-full" src="/img/logo-amigos-cerveceros.svg" alt="">
                    <div class="divider"></div>
                    <div class="custom-text-with-shadow relative">
                        <p class="font-bold text-22px leading-22px md:text-35px md:leading-35px text-white z-0 absolute w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                        <p class="font-bold text-22px leading-22px md:text-35px md:leading-35px text-white z-0 absolute w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                        <p class="font-bold text-22px leading-22px md:text-35px md:leading-35px text-white z-0 absolute w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                        <p class="font-bold text-22px leading-22px md:text-35px md:leading-35px text-white z-0 absolute w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                        <p class="font-bold text-22px leading-22px md:text-35px md:leading-33px text-black relative z-10 w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                    </div>
                    <p class="text-white text-22px leading-22px md:text-26px md:leading-35px text-center">Y GANAS CON NUESTROS PRODUCTOS</p>
                </div>

                <div class="w-full md:w-6/12 lg:w-4/12 mx-auto">
                    <div class="login-form-box">
                        <form class="text-center" action="#" @submit.prevent="login">
                            <p class="font-bold text-32px leading-34px text-white uppercase">Ingresa con tu ID</p>
                            <p class="text-white uppercase text-29px leading-34px mb-25px">A la plataforma</p>
                            <input v-model="form.commercial_id" class="form-control mb-5px placeholder-primary" type="text" placeholder="ID COMERCIAL">
                            <input v-model="form.username" class="form-control placeholder-primary mb-10px" type="text" placeholder="NOMBRE DE USUARIO">

                            <ul class="mb-10px">
                                <li class="text-left text-yellow-300" v-for="error in $page.errors">{{ error[0] }}</li>
                            </ul>

                            <div class="bavaria-custom-checkbox">
                                <input type="checkbox" name="remember" id="remember" v-model="form.remember">
                                <label for="remember">
                                    <div class="custom-checkbox-box">
                                        <img src="/img/icons/icon-check-white.svg" alt="" class="custom-checkbox-icon">
                                    </div>
                                    <p class="text-white text-18px leading-20px">Recordar mis datos</p>
                                </label>
                            </div>
                            <div class="md:px-15px pt-30px flex">
                                <div class="w-1/2 pr-15px">
                                    <button class="focus:outline-none block w-full rounded-10px bg-white font-bold text-xl text-primary uppercase py-3" type="submit">Ingresar</button>
                                </div>
                                <div class="w-1/2 pl-15px">
                                    <InertiaLink class="focus:outline-none block w-full rounded-10px bg-white font-bold text-xl text-primary uppercase py-3" href="/registro">Registrarse</InertiaLink>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <portal to="modal">
            <div class="modal" v-if="modalActive">
                <div class="modal-overlay" @click.prevent="modalActive = false"></div>
                <div class="modal-box relative">
                    <h2 class="uppercase text-28px leading-28px md:leading-normal text-white text-center tracking-tighter">¿CÓMO PARTICIPAR EN EL PROGRAMA DE INCENTIVOS AMIGOS CERVECEROS?</h2>
                    <iframe class="relative w-full rounded-10px border-4 border-gray" src="https://www.youtube.com/embed/a3ICNMQW7Ok?autoplay=1&controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <button @click.prevent="modalActive = false" type="button" class="absolute right-20px bottom-20px z-10 focus:outline-none inline-block rounded-10px bg-white font-bold text-xl text-primary uppercase p-3 flex items-center">
                        Saltar video
                        <img class="ml-6px h-6" src="/img/icons/icon-arrow-right-red.svg" alt="">
                    </button>
                </div>
            </div>
        </portal>
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";

export default {
    components: {
        DefaultLayout
    },
    data(){
        return {
            form: {
                commercial_id: '',
                username: '',
                password: 'password',
                remember: false
            },
            modalActive: true
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
.login-page{
    background-image: url('/img/bg-home.jpg');
    background-size: cover;
    background-position: center;
}

.divider{
    height: 1px;
    background: #fff;
    margin-top: 30px;
    margin-bottom: 15px;
    margin-right: 0;
    margin-left: 0;
    width: 100%;

    @screen md{
        width: 200%;
        margin-left: -100%;
    }
}

.custom-text-with-shadow p:nth-child(1){
    top: -2px;
    left: -2px;
    pointer-events: none;
    @screen md{
        top: -3px;
    }
}
.custom-text-with-shadow p:nth-child(2){
    top: 2px;
    left: -2px;
    pointer-events: none;
    @screen md{
        top: 1px;
    }
}
.custom-text-with-shadow p:nth-child(3){
    top: -2px;
    left: 2px;
    pointer-events: none;
    @screen md{
        top: -3px;
    }
}
.custom-text-with-shadow p:nth-child(4){
    top: 2px;
    left: 2px;
    pointer-events: none;
    @screen md{
        top: 1px;
    }
}

.login-form-box{
    background: rgba(0, 0, 0, 0.4);
    border-radius: 10px;
    border: 1px solid #fff;
    padding: 50px 30px 30px;
}

.form-control{
    border-radius: 10px;
    width: 100%;
    display: block;
    font-size: 20px;
    line-height: 24px;
    padding: 5px 30px;

    &:focus{
        outline: none;
    }
}

.bavaria-custom-checkbox{
    input{
        position: absolute;
        visibility: hidden;
    }

    label{
        display: flex;
        align-items: center;
    }

    .custom-checkbox-box{
        width: 18px;
        height: 18px;
        margin-right: 10px;
        border: 1px solid #fff;
        position: relative;
    }

    .custom-checkbox-icon{
        display: none;
        width: 15px;
        position: absolute;
        left: 4px;
        top: -4px;
    }

    input:checked{
        &~label{
            .custom-checkbox-icon{
                display: block;
            }
        }
    }
}

iframe{
    z-index: 5;
    height: 450px;
}

.modal{
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 20;

    .modal-overlay{
        width: 100%;
        height: 100%;
        @apply bg-primary;
        opacity: 0.8;
    }

    .modal-box{
        max-width: 850px;
        width: 90%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
}
</style>
