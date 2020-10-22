<template>
    <DefaultLayout>
        <div class="game-play-page">
            <div class="container pt-50px pb-25px px-15px xl:px-0">
                <div class="relative xl:w-8/12 mx-auto mb-35px">
                    <div class="title-divider title-divider-left"></div>
                    <h2 class="uppercase text-28px text-white font-bold text-center">Trivia</h2>
                    <div class="title-divider title-divider-right"></div>
                </div>

                <template v-if="!gameFinished && allQuestions && allQuestions.length">
                    <div class="xl:w-6/12 mx-auto mb-30px">
                        <div class="lg:w-5/12 w-11/12 ml-auto">
                            <div class="player-name-box">
                                <img src="/img/avatar-blank.svg" alt="">
                                {{ $page.user.name }}
                            </div>
                        </div>
                        <div class="relative">
                            <div class="clock-container">
                                <img src="/img/bg-clock.svg" alt="">
                                <div class="absolute timer-circle-container hidden lg:block">
                                    <vue-circle
                                        ref="vueCircle"
                                        :progress="questionSecondsLeftPercentage"
                                        :size="200"
                                        :reverse="false"
                                        line-cap="butt"
                                        :fill="{ color: '#BE0811' }"
                                        empty-fill="rgba(0, 0, 0, 0)"
                                        :animation-start-value="0.0"
                                        :start-angle="-1.6"
                                        insert-mode="append"
                                        :thickness="30"
                                        :show-percent="false"
                                    >
                                    </vue-circle>
                                </div>
                                <div class="absolute timer-circle-container lg:hidden">
                                    <vue-circle
                                        ref="vueCircleMobile"
                                        :progress="questionSecondsLeftPercentage"
                                        :size="100"
                                        :reverse="false"
                                        line-cap="butt"
                                        :fill="{ color: '#BE0811' }"
                                        empty-fill="rgba(0, 0, 0, 0)"
                                        :animation-start-value="0.0"
                                        :start-angle="-1.6"
                                        insert-mode="append"
                                        :thickness="30"
                                        :show-percent="false"
                                    >
                                    </vue-circle>
                                </div>
                                <div class="clock-counter">
                                    <template v-if="minutesLeft != 0">
                                        <p>0{{ minutesLeft }}</p>
                                        <span>min</span>
                                    </template>
                                    <template v-else>
                                        <p>{{ questionSecondsLeft }}</p>
                                        <span>seg</span>
                                    </template>
                                </div>
                            </div>

                            <div class="bg-gray pt-25px pb-15px px-15px lg:px-30px rounded-10px w-9/12 md:w-11/12 lg:w-10/12 xl:w-9/12 ml-auto mt-15px">
                                <div class="w-9/12 md:w-10/12 lg:w-9/12 lg:w-8/12 ml-auto">
                                    <p class="font-bold text-center text-22px lg:text-32px leading-22px lg:leading-32px tracking-tighter mb-15px text-gray-dark uppercase">Pregunta {{ activeQuestion + 1 }} / {{ allQuestions.length }}</p>
                                    <div class="rounded-10px overflow-hidden flex flex-wrap h-78px">
                                        <p class="bg-primary text-white h-full w-8/12 flex justify-center items-center uppercase font-bold text-18px lg:text-26px leading-26px tracking-tighter">Calificación</p>
                                        <p class="bg-white text-primary h-full w-4/12 flex justify-center items-center uppercase font-bold text-18px lg:text-30px leading-30px">{{ (activeQuestion + 1) * 100 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="question-and-answers-container lg:w-8/12 mx-auto">
                        <transition name="slide-fade" appear>
                            <div class="question-and-answers-container-inner" :key="allQuestions[activeQuestion].question">
                                <div class="question">
                                    <img src="/img/question-bg.svg" alt="">
                                    <p :class="allQuestions[activeQuestion].question.length > 110 ? 'lg:text-16px text-12px' : 'lg:text-24px text-14px'">{{ allQuestions[activeQuestion].question }}</p>
                                </div>
                                <div class="answers">
                                    <div class="answer" v-for="(answer, index) in allQuestions[activeQuestion].answers" @click="validateAnswerAndSave($event, allQuestions[activeQuestion], answer)">
                                        <img src="/img/answer-bg.svg" alt="">
                                        <img src="/img/answer-selected-bg.svg" alt="">
                                        <p>{{ ['A', 'B', 'C', 'D'][index] }}: {{ answer.answer }}</p>
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>
                </template>

                <div v-else class="bg-white rounded-10px p-30px text-center w-full lg:w-8/12 mx-auto">
                    <h2 class="text-primary text-30px text-center leading-30px font-bold mb-25px">Juego terminado</h2>
                    <p class="text-gray-dark tracking-tighter mb-30px text-26px">¡Muchas gracias por haber participado!</p>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <inertia-link href="/juega-y-gana" class="focus:outline-none block w-full rounded-10px bg-primary font-bold text-xl text-white uppercase py-3">Volver a jugar</inertia-link>
                        </div>
                        <div>
                            <inertia-link href="/ganadores" class="focus:outline-none block w-full rounded-10px bg-primary font-bold text-xl text-white uppercase py-3">Ver ganadores</inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout";
import VueCircle from 'vue2-circle-progress'
import moment from 'moment';

export default {
    components: {
        DefaultLayout,
        VueCircle
    },
    props: {
        questions: Array,
        participation: Object
    },
    data(){
        return {
            questionSecondsLeft: 299,
            gameFinished: false,
            activeQuestion: 0,
            interval: null
        }
    },
    computed: {
        questionSecondsLeftPercentage(){
            return (this.questionSecondsLeft / 299) * 100
        },
        minutesLeft(){
            return (moment.duration(this.questionSecondsLeft, 'seconds').asMinutes() + "").substring(0,1)
        },
        allQuestions(){
            if (!(this.questions && this.questions.length)){
                return []
            }

            return this.questions.map(question => {
                return {
                    ...question,
                    answers: this.shuffleArray([
                        {
                            answer: question.correct_option,
                            correct: true
                        },
                        {
                            answer: question.incorrect_option_1,
                            correct: false
                        },
                        {
                            answer: question.incorrect_option_2,
                            correct: false
                        },
                        {
                            answer: question.incorrect_option_3,
                            correct: false
                        },
                    ])
                }
            })
        },
    },
    methods: {
        finishGame(){
            this.gameFinished = true;
        },
        validateAnswerAndSave(event, answeredQuestion, answer){
            this.stopCounter();
            event.currentTarget.classList.add('active');
            setTimeout(() => {
                axios.patch('/participations', {participation_id: this.participation.id, question_id: answeredQuestion.id, answer_correct: answer.correct})
                    .then(res => {
                        if (!answer.correct){
                            this.finishGame();
                        } else{
                            this.goToNextQuestion();
                        }
                    })
                    .catch(console.log);
            }, 1000);
        },
        goToNextQuestion(){
            if (this.activeQuestion === (this.allQuestions.length - 1)){
                this.finishGame();
            } else{
                // this.questionSecondsLeft = 299;
                this.activeQuestion++;
                this.startCounter();
            }
        },
        shuffleArray(array){
            let arrayToSuffle = [...array];
            for(let i = arrayToSuffle.length - 1; i > 0; i--){
                const j = Math.floor(Math.random() * i)
                const temp = arrayToSuffle[i]
                arrayToSuffle[i] = arrayToSuffle[j]
                arrayToSuffle[j] = temp
            }
            return arrayToSuffle;
        },
        startCounter(){
            this.interval = setInterval(() => {
                this.questionSecondsLeft--;
                this.$refs.vueCircle.updateProgress(this.questionSecondsLeftPercentage);
                this.$refs.vueCircleMobile.updateProgress(this.questionSecondsLeftPercentage);

                if (this.questionSecondsLeft === 0){
                    clearInterval(this.interval);
                    this.finishGame();
                }
            }, 1000)
        },
        stopCounter(){
            clearInterval(this.interval);
        }
    },
    mounted() {
        this.startCounter();
    }
}
</script>

<style scoped lang="scss">
.game-play-page{
    background-image: url('/img/bg-game.jpg');
    background-size: cover;
    background-position: center;
    min-height: calc(100vh - 123.92px);
}

.title-divider{
    width: calc(50% - 50px);
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    height: 1px;
    background: #ffffff;

    &.title-divider-left{
        left: 0;
    }

    &.title-divider-right{
        right: 0;
    }
}

.player-name-box{
    position: relative;
    display: flex;
    background: #F2F2F2;
    @apply font-bold tracking-tighter;
    border-radius: 10px;
    color: #000;
    font-size: 24px;
    line-height: 24px;
    text-transform: uppercase;
    padding: 25px 10px 25px 61px;

    img{
        border-radius: 50%;
        width: 77px;
        height: 77px;
        object-fit: cover;
        position: absolute;
        left: -31.5px;
        top: 0;
    }
}

.clock-container{
    position: absolute;
    top: 0;

    @screen lg{
        top: auto;
        left: -30px;
        bottom: -30px;
        height: 300px;
    }

    img{
        width: 155px;

        @screen lg{
            width: 300px;
        }
    }

    .timer-circle-container{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        height: 100px;

        @screen lg{
            height: 200px;
        }
    }

    .clock-counter{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        @apply bg-gray-dark;
        border-radius: 50%;
        width: 82px;
        height: 82px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        @screen lg{
            width: 148px;
            height: 148px;
        }

        p{
            @apply font-bold;
            display: block;
            font-size: 44px;
            line-height: 53px;
            margin-bottom: 0;
            color: #fff;

            @screen lg{
                font-size: 90px;
                line-height: 80px;
            }
        }

        span{
            display: block;
            font-size: 24px;
            color: #fff;
            line-height: 24px;
            margin-top: -10px;
        }
    }
}

.question-and-answers-container{
    min-height: 241.36px;

    .question{
        position: relative;

        img{
            width: 100%;
        }

        p{
            position: absolute;
            left: 50%;
            text-align: center;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 82%;
            @apply text-primary;
            line-height: 14px;

            @screen lg{
                line-height: 18px;
            }
        }
    }

    .answers{
        display: flex;
        flex-wrap: wrap;

        .answer{
            margin-top: 10px;
            cursor: pointer;
            width: 100%;
            position: relative;

            @screen md{
                margin-bottom: 10px;
                width: 50%;
            }

            img{
                width: 100%;

                &:nth-child(2){
                    display: none;
                }
            }

            &.active{
                img{
                    &:nth-child(1){
                        display: none;
                    }

                    &:nth-child(2){
                        display: block;
                    }
                }
            }

            p{
                position: absolute;
                color: #fff;
                left: 63px;
                text-align: left;
                top: 50%;
                transform: translateY(-50%);
                font-size: 16px;
                line-height: 17px;
                width: 67%;

                @screen lg{
                    line-height: 17px;
                    font-size: 24px;
                }
            }
        }
    }
}

.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}

.slide-fade-enter-active {
    transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-leave-active {
    transition: all .3s ease;
}
.slide-fade-enter
    /* .slide-fade-leave-active below version 2.1.8 */ {
    transform: translateX(10px);
    opacity: 0;
}
.slide-fade-leave
    /* .slide-fade-leave-active below version 2.1.8 */ {
    transform: translateX(-10px);
    opacity: 0;
}
</style>
