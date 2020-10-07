<template>
    <DefaultLayout>
        <div class="winners-page-open">
            <div class="container py-45px">
                <h2 class="font-bold text-28px text-primary text-center uppercase mb-40px">MI PERFIL</h2>

                <div class="flex flex-wrap">
                    <div class="w-4/12 mx-auto">
                        <div class="bg-primary pt-20px px-30px pb-10px rounded-t-10px">
                            <div class="avatar-container">
                                <img :src="user.profile_photo_path ? user.profile_photo_path : '/img/avatar-blank.svg'" alt="">
                            </div>
                            <div class="mb-7px text-left py-4px px-7px bg-white uppercase rounded-10px tracking-tighter flex flex-wrap items-center">
                                <div class="w-5/12 uppercase text-gray-dark py-2px border-r border-gray text-center font-bold">Nombre</div>
                                <div class="w-7/12 uppercase text-primary py-2px text-left pl-15px">{{ user.name }}</div>
                            </div>
                            <div class="text-left py-4px px-7px bg-white uppercase rounded-10px tracking-tighter flex flex-wrap items-center">
                                <div class="w-5/12 uppercase text-gray-dark py-2px border-r border-gray text-center font-bold">Id Comercial</div>
                                <div class="w-7/12 uppercase text-primary py-2px text-left pl-15px">{{ user.commercial_id }}</div>
                            </div>
                        </div>
                        <div class="bg-gray py-10px px-20px grid grid-cols-2 gap-x-15px">
                            <div>
                                <p class="uppercase text-white font-bold text-center">Calificación</p>
                                <div class="rounded-10px bg-white py-20px text-center w-full">
                                    <p class="text-gray-dark font-bold text-70px leading-70px tracking-tighter">{{ participations && participations.length ? participations[0].score : 0 }}</p>
                                </div>
                            </div>
                            <div>
                                <p class="uppercase text-white font-bold text-center">Tiempo</p>
                                <div class="rounded-10px bg-white py-20px text-center w-full relative">
                                    <p class="uppercase tracking-tighter leading-12px text-12px text-gray-dark absolute top-3 left-0 w-full text-center">Mi menor tiempo registrado</p>
                                    <p class="text-gray-dark font-bold text-70px leading-70px tracking-tighter">{{ lowestTimeRegisteredInSeconds ? moment('00:00', 'mm:ss').add(lowestTimeRegisteredInSeconds, 'seconds').format('mm:ss') : '00:00' }}</p>
                                    <p class="uppercase tracking-tighter leading-12px text-12px text-gray-dark absolute bottom-3 left-0 w-full text-center">{{ lowestTimeRegisteredInSeconds && lowestTimeRegisteredInSeconds > 59 ? 'Minutos' : 'Segundos' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-primary py-15px rounded-b-10px"></div>
                    </div>
                    <div class="w-6/12 mx-auto" v-if="awardsWithParticipations && awardsWithParticipations.length">
                        <div v-for="award in awardsWithParticipations" class="mb-15px">
                            <div class="rounded-t-10px bg-primary p-5px text-center text-white text-30px tracking-tighter leading-30px uppercase">{{ award.award.name }}</div>
                            <div class="bg-white py-10px px-20px grid grid-cols-3">
                                <div class="col-span-2">
                                    <p class="text-gray text-center mb-5px">Códigos ingresados y jugados</p>
                                    <div class="played-games">
                                        <div class="played-games-header">
                                            <div>Cant.</div>
                                            <div>Fecha</div>
                                            <div>Código</div>
                                            <div>Calif.</div>
                                            <div>Tiempo</div>
                                        </div>
                                        <div class="played-games-body" v-if="award.participations.length">
                                            <div class="played-games-body-row" v-for="(participation, index) in award.participations">
                                                <div>{{ index + 1 }}</div>
                                                <div>{{ moment(participation.created_at, 'YYYY-MM-DD hh:mm:ss').format('DD/MM/YYYY') }}</div>
                                                <div>{{ participation.code.code }}</div>
                                                <div>{{ participation.score }}</div>
                                                <div>{{ moment('00:00', 'mm:ss').add(participation.time_in_seconds, 'seconds').format('mm:ss') }}</div>
                                            </div>
                                        </div>
                                        <div class="played-games-body no-results" v-else>
                                            <div class="played-games-body-row justify-center">
                                                <p class="py-3 border-l border-b border-r border-primary w-full text-center">No hay resultados para mostrar</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-5px mt-10px">
                                        <input v-model="code[award.award.id]" class="text-center py-5px px-7px bg-gray-light text-gray-dark placeholder-gray uppercase rounded-10px tracking-tighter" placeholder="Ingresa tu código" />
                                        <button class="py-5px px-7px bg-primary text-white uppercase rounded-10px tracking-tighter focus:outline-none" @click.prevent="startParticipation(award.award.id)">Jugar ahora</button>
                                    </div>
                                    <p class="text-primary" v-if="$page.errors.code && $page.errors.award_id == award.award.id">{{ $page.errors.code[0] }}</p>
                                </div>
                                <div class="pl-15px flex items-center">
                                    <img :src="award.award.image_path" alt="">
                                </div>
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
import moment from 'moment';

export default {
    components: {
        DefaultLayout
    },
    props: {
        user: Object,
        awardsWithParticipations: Array,
        participations: Array
    },
    data(){
        return {
            moment: moment,
            code: {}
        }
    },
    computed: {
        lowestTimeRegisteredInSeconds(){
            if (this.participations && this.participations.length){
                let participations = [...this.participations];
                participations.sort((a, b) => {
                    if (a.time_in_seconds > b.time_in_seconds) return 1;
                    if (a.time_in_seconds < b.time_in_seconds) return -1;
                    return 0;
                })
                return participations[0].time_in_seconds;
            }

            return null
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
.winners-page-open{
    background-image: url('/img/bg-white.jpg');
    background-size: cover;
    background-position: center;
}

.played-games{
    position: relative;

    .played-games-header{
        display: flex;
        flex-wrap: wrap;

        >div{
            width: 20%;
            border-left: 1px solid #BE0811;
            border-top: 1px solid #BE0811;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            @apply text-gray-dark py-10px;

            &:nth-child(1){
                width: 14%;
            }

            &:nth-child(2){
                width: 26%;
            }

            &:nth-child(3){
                width: 23%;
            }

            &:nth-child(4){
                width: 17%;
            }

            &:nth-child(5){
                width: 20%;
            }

            &:last-child{
                border-right: 1px solid #BE0811;
            }
        }
    }

    .played-games-body{
        border-bottom: 1px solid;
        @apply border-primary;
        position: relative;
        max-height: 171px;
        overflow-y: auto;
        overflow-x: auto;

        &.no-results{
            border: none;
        }

        .played-games-body-row{
            position: relative;
            display: flex;
            flex-wrap: wrap;

            &:nth-child(odd){
                background: #F8D9DA;

                .played-games-body-row-index{
                    background: #F8D9DA;
                }
            }

            &:nth-child(even){
                background: #fff;
            }

            .played-games-body-row-index{
                position: absolute;
                height: 100%;
                width: 30px;
                left: -30px;
                top: 0;
                border-left: 1px solid;
                @apply text-gray-dark font-bold text-center flex justify-center items-center border-primary;

            }

            >div{
                border-left: 1px solid;
                @apply text-gray-dark font-bold px-0 py-5px text-left border-primary text-center;
            }

            >div{
                &:nth-child(1){
                    width: 14%;
                }

                &:nth-child(2){
                    width: 26%;
                }

                &:nth-child(3){
                    width: 23%;
                }

                &:nth-child(4){
                    width: 17%;
                }

                &:nth-child(5){
                    width: 20%;
                    border-right: 1px solid;
                    @apply border-primary;
                }
            }
        }
    }
}

.avatar-container{
    width: 160px;
    height: 160px;
    border-radius: 50%;
    border: 5px solid;
    margin: 0 auto 10px;
    @apply border-gray-light;
}
</style>
