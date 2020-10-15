<template>
    <DefaultLayout>
        <div class="login-page">
            <div class="container flex px-15px lg:px-0 flex-wrap justify-center">
                <div class="lg:w-5/12 pt-50px pb-40px lg:ml-65px">
                    <img class="block w-full" src="/img/logo-amigos-cerveceros.svg" alt="">
                    <div class="divider"></div>
                    <p class="text-center text-white text-30px leading-30px font-bold">Felicitaciones ya eres parte de nuestro</p>
                    <p class="text-center tracking-tighter text-white text-24px leading-30px">programa de incentivos AMIGOS CERVECEROS, <br class="lg:hidden">cumple tus metas y podrás ganar fabulosos premios.</p>
                </div>

                <div class="lg:w-6/12 pt-50px pb-10px pt-55px px-10px md:px-30px bg-white relative lg:ml-auto lg:mr-0 -mx-15px">
                    <h3 class="text-primary text-30px text-center leading-30px font-bold">PREMIOS</h3>
                    <ul v-if="awards && awards.length" class="flex flex-wrap">
                        <li v-for="award in awards" class="w-1/2 text-center mb-10px px-5px">
                            <img class="h-40 w-full block object-contain object-center" :src="award.image_path" alt="">
                            <p class="inline-block font-bold rounded-10px px-14px py-5px uppercase text-white bg-primary">Son {{ award.stock }} {{ award.name }}</p>
                        </li>
                    </ul>
                    <p class="text-gray-dark text-center text-12px">*Imagenes de referencia</p>
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
.login-page{
    background-image: url('/img/bg-home.jpg');
    background-size: cover;
    background-position: center;
}

.divider{
    height: 1px;
    background: #fff;
    width: 100%;
    margin-left: 0;

    @screen lg{
        width: 200%;
        margin-top: 30px;
        margin-bottom: 15px;
        margin-right: 0;
        margin-left: -100%;
    }
}

.custom-text-with-shadow p:nth-child(1){
    top: -3px;
    left: -2px;
    pointer-events: none;
}
.custom-text-with-shadow p:nth-child(2){
    top: 1px;
    left: -2px;
    pointer-events: none;
}
.custom-text-with-shadow p:nth-child(3){
    top: -3px;
    left: 2px;
    pointer-events: none;
}
.custom-text-with-shadow p:nth-child(4){
    top: 1px;
    left: 2px;
    pointer-events: none;
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
</style>
