<template>
    <DefaultLayout>
        <div class="how-to-participate-page">
            <div class="container flex items-center">
                <div class="w-7/12 pr-60px">
                    <h6 class="mb-5px text-16px leading-18px text-white text-center tracking-tighter">¿CÓMO PARTICIPAR EN EL  PROGRAMA DE INCENTIVOS AMIGOS CERVECEROS?</h6>
                    <iframe class="w-full border-4 border-gray" src="https://www.youtube.com/embed/a3ICNMQW7Ok" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div class="w-5/12 pt-50px pb-100px pt-95px px-30px bg-white relative ml-auto">
                    <h3 class="text-primary text-30px text-center leading-30px font-bold mb-40px">CÓMO PARTICIPAR</h3>
                    <div class="flex mb-60px">
                        <p class="text-90px leading-90px text-gray-dark w-2/12 font-bold text-center">1</p>
                        <p class="w-10/12 text-gray-dark tracking-tighter">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                    </div>
                    <div class="flex mb-60px">
                        <p class="text-90px leading-90px text-gray-dark w-2/12 font-bold text-center">2</p>
                        <p class="w-10/12 text-gray-dark tracking-tighter">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                    </div>
                    <div class="flex">
                        <p class="text-90px leading-90px text-gray-dark w-2/12 font-bold text-center">3</p>
                        <p class="w-10/12 text-gray-dark tracking-tighter">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
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
.how-to-participate-page{
    background-image: url('/img/bg-home.jpg');
    background-size: cover;
    background-position: center;
}

iframe{
    height: 350px;
}
</style>
