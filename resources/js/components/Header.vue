<template>
    <header class="z-10 bg-white">
        <div class="container relative h-full">
            <inertia-link href="/" class="logo rounded-full bg-white absolute left-0 top-0 block">
                <img class="w-9/12 block mx-auto mt-5" src="/img/logo-amigos-cerveceros.svg" alt="">
            </inertia-link>
            <nav class="main-menu-container h-full py-15px">
                <ul class="flex justify-center items-center mx-auto h-full">
                    <li>
                        <InertiaLink :class="{ 'active': $page.currentRouteName === 'home' }" class="text-20px leading-24px font-bold uppercase block text-center py-10px px-15px border-l border-gray" href="/">Inicio</InertiaLink>
                    </li>
                    <li>
                        <InertiaLink :class="{ 'active': $page.currentRouteName === 'como-participar' }" class="text-20px leading-24px font-bold uppercase block text-center py-10px px-15px border-l border-gray" href="/como-participar">Cómo participar</InertiaLink>
                    </li>
                    <li>
                        <InertiaLink :class="{ 'active': $page.currentRouteName === 'juega-y-gana' }" class="text-20px leading-24px font-bold uppercase block text-center py-10px px-15px border-l border-gray" href="/juega-y-gana">Juega y gana</InertiaLink>
                    </li>
                    <li>
                        <InertiaLink :class="{ 'active': $page.currentRouteName === 'ganadores' }" class="text-20px leading-24px font-bold uppercase block text-center py-10px px-15px border-l border-r border-gray" href="/ganadores">Ganadores</InertiaLink>
                    </li>
                </ul>
            </nav>
            <div v-if="$page.user" class="user-menu">
                <div class="user-menu-toggle">
                    <img src="/img/avatar-blank.svg" alt="">
                    {{ $page.user.name }}
                </div>
                <ul>
                    <li>
                        <InertiaLink href="/perfil">Mi perfil</InertiaLink>
                    </li>
                    <li>
                        <a href="/cerrar-sesion" @click.prevent="logout">
                            Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    methods: {
        logout(){
            axios.post('/logout').then(response => {
                window.location = '/';
            })
        },
    },
}
</script>

<style scoped lang="scss">
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

    a.active{
        @apply bg-primary text-white;
        margin-top: -15px;
        margin-bottom: -15px;
        height: 74px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}

.user-menu{
    position: absolute;
    right: 0;
    top: 15px;
    z-index: 2;

    .user-menu-toggle{
        display: flex;
        @apply bg-primary font-bold tracking-tighter;
        border-radius: 10px;
        color: #fff;
        font-size: 20px;
        line-height: 24px;
        text-transform: uppercase;
        padding: 8px 10px 8px 39px;

        img{
            border-radius: 50%;
            width: 41px;
            height: 41px;
            object-fit: cover;
            position: absolute;
            left: -10px;
            top: 0;
        }
    }

    ul{
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        display: none;

        li{
            margin-top: 5px;
            @apply bg-gray font-bold text-center tracking-tighter;
            border-radius: 10px;
            color: #fff;
            font-size: 20px;
            line-height: 24px;
            text-transform: uppercase;
            padding: 8px 10px;
        }
    }

    &:hover{
        ul{
            display: block;
        }
    }
}
</style>
