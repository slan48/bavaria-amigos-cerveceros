<template>
    <DefaultLayout>
        <div class="how-to-participate-page">
            <div class="container flex items-center flex-wrap px-15px lg:px-0">
                <div class="lg:w-7/12 lg:pr-60px w-full pr-0 mt-80px lg:mt-0 mb-30px lg:mb-0">
                    <h6 class="mb-5px text-16px leading-18px text-white text-center tracking-tighter">¿CÓMO PARTICIPAR EN EL  PROGRAMA DE INCENTIVOS AMIGOS CERVECEROS?</h6>
                    <iframe class="w-full border-4 border-gray" src="https://www.youtube.com/embed/e_oQM334j2I" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div class="lg:w-5/12 pt-50px pb-10px pt-56px px-15px bg-white relative lg:ml-auto lg:mr-0 -mx-15px">
                    <h3 class="text-primary text-26px text-center leading-26px font-bold tracking-tighter">¿CÓMO PUEDES PARTICIPAR, APRENDER Y GANAR ESPECTACULARES PREMIOS?,</h3>
                    <p class="text-gray font-bold text-center tracking-tighter text-18px">EN NUESTRA PLATAFORMA INTERACTIVA EN TAN SOLO 3 PASOS</p>
                    <div class="flex items-center border-b border-gray py-10px">
                        <div class="flex">
                            <p class="flex-shrink-0 w-58px text-90px leading-90px text-gray-dark w-2/12 font-bold text-center">1</p>
                            <p class="w-10/12 text-gray-dark tracking-tighter">Consulta con tu representante de ventas Bavaria tus metas y objetivos del mes, si cumples con ellos, ganarás 2 códigos de forma mensual.</p>
                        </div>
                        <img class="w-62px flex-shrink-0" src="/img/icons/icon-goals-red.svg" alt="">
                    </div>
                    <div class="flex items-center border-b border-gray py-10px">
                        <div class="flex">
                            <p class="flex-shrink-0 w-58px text-90px leading-90px text-gray-dark w-2/12 font-bold text-center">2</p>
                            <p class="w-10/12 text-gray-dark tracking-tighter">Podrás ganar 1 código adicional a los anteriores, por comprar al menos 3 cajas en cada una de las variedades de Club Colombia.</p>
                        </div>
                        <img style="width: 189px;" class="flex-shrink-0" src="/img/club-colombia.jpg" alt="">
                    </div>
                    <div class="flex items-center py-10px">
                        <div class="flex">
                            <p class="flex-shrink-0 w-58px text-90px leading-90px text-gray-dark w-2/12 font-bold text-center">3</p>
                            <p class="w-10/12 text-gray-dark tracking-tighter">Estamos comprometidos con la innovación, así que pregúntale a tu representante Bavaria cual es la innovación del mes, compra 10 cajas de dicho producto y así obtendrás 1 código adicional.</p>
                        </div>
                        <img class="w-65px flex-shrink-0" src="/img/icons/icon-ligth-red.svg" alt="">
                    </div>
                    <div class="lg:-mx-25px -mx-15px bg-primary text-white flex py-10px px-35px justify-between">
                        <p class="pr-20px leading-none">
                            En total podrás obtener <span class="text-22px">4 códigos</span><br>
                            <span class="text-15px">mensuales, para participar en nuestra</span><br>
                            <span class="text-24px font-bold">trivia en línea</span>
                            <span class="text-15px">y así poder ganar</span><br>
                            <span class="text-13px">los</span>
                            <span class="text-26px">fabulosos premios</span>
                            <span class="block text-right text-12px">que tenemos para tí.</span>
                        </p>
                        <img src="/img/icons/icon-pc-goals-white.svg" class="block flex-shrink-0" style="width: 160px" alt="">
                    </div>
                    <p class="text-center text-gray-dark text-10px leading-12px pt-10px">Consulta en detalle los Términos y Condiciones del programa, a través de nuestros representantes de ventas Bavaria y en la plataforma www.amigoscerveceros.com</p>
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
