<template>
    <DefaultLayout>
        <div class="winners-page-open" v-if="winnersByAward && winnersByAward.length">
            <div class="container py-45px">
                <h2 class="font-bold text-28px text-primary text-center uppercase mb-40px">RANKING DE GANADORES {{ currentMonth }}</h2>

                <div class="flex flex-wrap px-15px lg:px-30px">
                    <div class="w-full lg:w-8/12 lg:pr-15px">
                        <div class="bg-white rounded-10px py-30px px-15px lg:px-60px">
                            <p class="text-center text-18px mb-25px text-gray-dark">Selecciona el premio por el cual estás participando</p>
                            <div class="grid grid-cols-3 gap-x-10px lg:gap-x-30px gap-y-10px">
                                <div @click.prevent="selectAward(index)" :class="{'bg-gray text-black': index === awardSelectedIndex, 'bg-primary text-white': index !== awardSelectedIndex}" v-for="(award, index) in winnersByAward" class="py-5px px-7px text-13px flex items-center justify-center lg:text-16px uppercase rounded-10px tracking-tighter focus:outline-none font-bold text-center cursor-pointer">
                                    {{ award.award.name }}
                                </div>
                            </div>
                            <h3 class="text-center text-18px my-25px uppercase text-gray-dark">Top del ranking de ganadores</h3>
                            <div class="pl-30px overflow-x-auto">
                                <div class="ranking-table" :class="{'no-results': !winnersByAwardParticipationsFiltered.length}">
                                    <div class="ranking-table-header">
                                        <div>Nombre</div>
                                        <div>ID</div>
                                        <div>Regional</div>
                                        <div>Calificación</div>
                                        <div>Tiempo</div>
                                    </div>
                                    <div class="ranking-table-body" v-if="winnersByAwardParticipationsFiltered.length">
                                        <div class="ranking-table-body-row" v-for="participation in winnersByAwardParticipationsFiltered">
                                            <div class="ranking-table-body-row-index">{{ participation.positionNumber }}</div>
                                            <div>{{ participation.user.name }}</div>
                                            <div>{{ participation.user.commercial_id }}</div>
                                            <div>{{ participation.user.zone }}</div>
                                            <div>{{ participation.score }}</div>
                                            <div>{{ moment('00:00', 'mm:ss').add(participation.time_in_seconds, 'seconds').format('mm:ss') }}</div>
                                        </div>
                                    </div>
                                    <div class="ranking-table-body no-results" v-else>
                                        <div class="ranking-table-body-row justify-center">
                                            <p class="py-3 border-l border-b border-r border-primary w-full text-center">No hay resultados para mostrar</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center items-center mt-15px">
                                <p class="text-18px text-gray-dark mr-10px">¿Quieres conocer tu posición en el ranking?</p>
                                <input v-model="idSearch" class="text-center py-5px px-7px bg-gray-light text-gray-dark placeholder-gray uppercase rounded-10px tracking-tighter" placeholder="INGRESA TU ID" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-4/12 lg:pl-15px mt-15px lg:mt-0">
                        <div class="bg-primary rounded-10px p-20px">
                            <p class="font-bold text-28px leading-28px text-white text-center uppercase mb-5px">Premio en juego</p>
                            <p class="text-28px leading-28px text-white text-center uppercase mb-10px">{{ winnersByAward[awardSelectedIndex].award.name }}</p>
                            <div class="bg-white p-10px">
                                <img class="block" :src="winnersByAward[awardSelectedIndex].award.image_path" alt="">
                                <p class="text-24px leading-24px text-primary text-center uppercase mb-5px tracking-tighter">Menor tiempo registrado</p>
                                <p class="text-gray-dark text-center text-100px leading-80px font-bold" v-if="winnersByAward[awardSelectedIndex].participations.length">{{ moment('00:00', 'mm:ss').add(getLowestTimeRegisteredInSeconds(awardSelectedIndex), 'seconds').format('mm:ss') }}</p>
                                <p class="text-gray-dark text-center text-100px leading-80px font-bold" v-else>00:00</p>
                                <p class="text-gray text-26px leading-26px text-center uppercase">{{ getLowestTimeRegisteredInSeconds(awardSelectedIndex) && getLowestTimeRegisteredInSeconds(awardSelectedIndex) > 59 ? 'Minutos' : 'Segundos' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="winners-page-closed" v-else>
            <div class="container flex flex-wrap px-15px lg:px-0">
                <div class="lg:w-5/12 ml-auto pb-40px pt-80px">
                    <div class="lg:pr-25px">
                        <img class="block w-full" src="/img/logo-amigos-cerveceros.svg" alt="">
                    </div>
                    <div class="divider"></div>
                    <div class="custom-text-with-shadow relative">
                        <p class="font-bold text-26px lg:text-35px leading-35px text-white z-0 absolute w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                        <p class="font-bold text-26px lg:text-35px leading-35px text-white z-0 absolute w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                        <p class="font-bold text-26px lg:text-35px leading-35px text-white z-0 absolute w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                        <p class="font-bold text-26px lg:text-35px leading-35px text-white z-0 absolute w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                        <p class="font-bold text-26px lg:text-35px leading-33px text-black relative z-10 w-full text-center">EL JUEGO EN EL QUE APRENDES</p>
                    </div>
                    <p class="text-white text-22px lg:text-26px leading-35px text-center">Y GANAS CON NUESTROS PRODUCTOS</p>
                </div>
                <div class="lg:w-6/12 lg:pl-80px lg:pr-30px lg:py-100px p-30px bg-white relative flex flex-wrap items-center content-center -mx-15px lg:mx-0">
                    <h3 class="text-primary text-30px text-left leading-30px font-bold mb-40px w-full">RANKING DE GANADORES</h3>
                    <p class="text-gray-dark tracking-tighter text-28px w-full mb-35px">Podrás conocer el ranking de ganadores y tu posición dentro de él, al finalizar cada mes.</p>
                    <p class="text-gray-dark tracking-tighter text-28px w-full">Los ganadores de cada premio serán contactados por nuestra torre de control, para indicarles como y cuando recibir su premio.</p>
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
        winnersByAward: Array,
        currentMonth: String
    },
    data(){
        return {
            awardSelectedIndex: 0,
            idSearch: "",
            moment: moment
        }
    },
    computed: {
        winnersByAwardParticipationsFiltered(){
            let participations = this.winnersByAward[this.awardSelectedIndex].participations.map((part, index) => ({...part, positionNumber: index + 1 }))

            if (!this.idSearch){
                return participations;
            }

            return participations.filter(part => part.user.commercial_id.includes(this.idSearch));
        }
    },
    methods: {
        selectAward(awardIndex){
            this.awardSelectedIndex = awardIndex;
        },
        getLowestTimeRegisteredInSeconds(awardIndex){
            if (this.winnersByAward && this.winnersByAward.length && awardIndex){
                if (this.winnersByAward[awardIndex].participations.length){
                    let participations = [...this.winnersByAward[awardIndex].participations];
                    participations.sort((a, b) => {
                        if (a.time_in_seconds > b.time_in_seconds) return 1;
                        if (a.time_in_seconds < b.time_in_seconds) return -1;
                        return 0;
                    })
                    return participations[0].time_in_seconds;
                }
            }

            return null
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

.ranking-table{
    position: relative;
    min-width: 460px;

    &::before{
        content: "";
        display: block;
        position: absolute;
        top: 48px;
        left: -30px;
        width: 30px;
        height: 1px;
        @apply bg-primary;
        z-index: 2;
    }

    &.no-results{
        &::before{
            display: none;
        }
    }

    .ranking-table-header{
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
                width: 30%;
            }

            &:nth-child(2){
                width: 15%;
            }

            &:nth-child(3){
                width: 20%;
            }

            &:nth-child(4){
                width: 20%;
            }

            &:nth-child(5){
                width: 15%;
            }

            &:last-child{
                border-right: 1px solid #BE0811;
            }
        }
    }

    .ranking-table-body{
        border-bottom: 1px solid;
        @apply border-primary;
        position: relative;
        max-height: 171px;
        overflow-y: auto;
        overflow-x: auto;
        width: calc(100% + 30px);
        padding-left: 30px;
        left: -30px;

        &.no-results{
            border: none;
        }

        .ranking-table-body-row{
            position: relative;
            display: flex;
            flex-wrap: wrap;

            &:nth-child(odd){
                background: #F8D9DA;

                .ranking-table-body-row-index{
                    background: #F8D9DA;
                }
            }

            &:nth-child(even){
                background: #fff;
            }

            .ranking-table-body-row-index{
                position: absolute;
                height: 100%;
                width: 30px;
                left: -30px;
                top: 0;
                border-left: 1px solid;
                @apply text-gray-dark font-bold text-center flex justify-center items-center border-primary;

            }

            &:first-child{
                >div:not(.ranking-table-body-row-index){
                    @apply text-primary;
                }
            }

            &:nth-child(2){
                >div:not(.ranking-table-body-row-index){
                    @apply text-primary;
                }
            }

            >div:not(.ranking-table-body-row-index){
                border-left: 1px solid;
                @apply text-gray-dark font-bold px-10px py-5px text-left border-primary;
            }

            >div{
                &:nth-child(2){
                    width: 30%;
                }

                &:nth-child(3){
                    width: 15%;
                    padding-left: 0;
                    padding-right: 0;
                    text-align: center;
                }

                &:nth-child(4){
                    width: 20%;
                }

                &:nth-child(5){
                    width: 20%;
                    text-align: center;
                }

                &:nth-child(6){
                    width: 15%;
                    text-align: center;
                    padding-left: 0;
                    padding-right: 0;
                    border-right: 1px solid;
                    @apply border-primary;
                }
            }
        }
    }
}

.winners-page-closed{
    background-image: url('/img/bg-home.jpg');
    background-size: cover;
    background-position: center;

    .divider{
        height: 1px;
        background: #fff;
        width: 100%;
        margin-top: 30px;
        margin-bottom: 15px;

        @screen lg{
            width: 200%;
            margin-right: 0;
            margin-left: -100%;
        }
    }

    .custom-text-with-shadow p:nth-child(1){
        top: -4px;
        left: -2px;
        pointer-events: none;

        @screen lg{
            top: -3px;
        }
    }
    .custom-text-with-shadow p:nth-child(2){
        top: 1px;
        left: -2px;
        pointer-events: none;

        @screen lg{
            top: 1px;
        }
    }
    .custom-text-with-shadow p:nth-child(3){
        top: -4px;
        left: 2px;
        pointer-events: none;

        @screen lg{
            top: -3px;
        }
    }
    .custom-text-with-shadow p:nth-child(4){
        top: 0;
        left: 2px;
        pointer-events: none;

        @screen lg{
            top: 1px;
        }
    }
}

</style>
