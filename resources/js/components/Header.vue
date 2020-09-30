<template>
    <header class="z-10 bg-white">
        <div class="container relative h-full">
            <div class="logo rounded-full bg-white absolute left-0 top-0">
                <img class="w-9/12 block mx-auto mt-5" src="/img/logo-amigos-cerveceros.svg" alt="">
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
    width: 170px;
    height: 160px;
//box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.5)
}

.main-menu-container li{
    text-align: center;
    min-width: 160px;
}
</style>
