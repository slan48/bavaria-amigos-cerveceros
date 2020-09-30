<template>
    <div>
        <header class="z-10 bg-white">
            <div class="container relative h-full">
                <div class="logo rounded-full bg-white absolute left-0 top-0">
                    <img class="w-9/12 block mx-auto mt-3" src="/img/logo-amigos-cerveceros.svg" alt="">
                </div>
                <nav class="main-menu-container h-full py-15px">
                    <ul class="flex justify-center items-center mx-auto h-full">
                        <li>
                            <a class="text-20px leading-24px font-bold uppercase block text-center py-10px px-15px border-l border-gray" href="#">Inicio</a>
                        </li>
                        <li>
                            <a class="text-20px leading-24px font-bold uppercase block text-center py-10px px-15px border-l border-gray" href="#">Cómo participar</a>
                        </li>
                        <li>
                            <a class="text-20px leading-24px font-bold uppercase block text-center py-10px px-15px border-l border-gray" href="#">Juega y gana</a>
                        </li>
                        <li>
                            <a class="text-20px leading-24px font-bold uppercase block text-center py-10px px-15px border-l border-r border-gray" href="#">Ganadores</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <slot />
        <footer class="bg-gray text-primary mt-60px">
            <div class="container px-30px flex justify-between items-center py-8px">
                <div class="w-6/12 flex items-center">
                    <div class="border-r border-primary mr-10px pr-10px w-50px">
                        <img class="block w-full" src="/img/icons/icon-bavaria-red.svg" alt="">
                    </div>
                    <div class="flex items-center">
                        <p class="text-12px leading-12px font-bold mr-15px">Orgullosamente<br>parte de A-BInBev</p>
                        <p class="text-27px leading-32px font-bold">TAP INTO YOUR BEER</p>
                    </div>
                </div>
                <div class="w-6/12 flex items-center justify-end">
                    <p class="uppercase font-bold text-14px leading-17px">Síguenos</p>
                    <a class="block w-72px px-24px border-r border-primary" href="#">
                        <img class="w-full block h-24px" src="/img/icons/icon-instagram-red.svg" alt="">
                    </a>
                    <a class="block w-72px px-24px border-r border-primary" href="#">
                        <img class="w-full block h-24px" src="/img/icons/icon-facebook-red.svg" alt="">
                    </a>
                    <a class="block w-72px px-24px border-r border-primary" href="#">
                        <img class="w-full block h-24px" src="/img/icons/icon-pinterest-red.svg" alt="">
                    </a>
                    <a class="block w-72px px-24px" href="#">
                        <img class="w-full block h-24px" src="/img/icons/icon-message-red.svg" alt="">
                    </a>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
header{
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.5)
}

.logo{
    width: 194px;
    height: 160px;
    //box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.5)
}

.main-menu-container li{
    text-align: center;
    min-width: 160px;
}
</style>
