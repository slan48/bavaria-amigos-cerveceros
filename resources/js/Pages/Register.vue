<template>
    <DefaultLayout>
        <div class="register-page">
            <div class="container flex">
                <div class="w-4/12 pt-50px pb-30px mx-auto">
                    <form class="text-center" action="#" @submit.prevent="register">
                        <p class="text-30px leading-30px mb-8px text-white uppercase tracking-tighter">Fecha de nacimiento</p>
                        <div class="mb-30px">
                            <div class="flex justify-center">
                                <the-mask mask="##" v-model="day" type="text" class="w-63px rounded-10px text-20px leading-24px py-5px placeholder-gray text-center focus:outline-none" placeholder="DÍA" />
                                <the-mask mask="##" v-model="month" type="text" class="mx-5px w-63px rounded-10px text-20px leading-24px py-5px placeholder-gray text-center focus:outline-none" placeholder="MES" />
                                <the-mask mask="####" v-model="year" type="text" class="w-75px rounded-10px text-20px leading-24px py-5px placeholder-gray text-center focus:outline-none" placeholder="AÑO" />
                            </div>
                            <p class="text-white text-center mt-10px" v-if="$page.errors.birthday">{{ $page.errors.birthday[0] }}</p>
                        </div>

                        <div class="register-form-box">
                            <p class="font-bold text-32px leading-34px text-white uppercase">Regístrate ahora</p>
                            <p class="text-white uppercase text-20px leading-24px mb-25px tracking-tighter">INGRESA TUS DATOS PARA ACCEDER<br>A LA PLATAFORMA</p>
                            <input v-model="form.name" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="NOMBRE">
                            <p class="text-white text-left mt-5px mb-10px" v-if="$page.errors.name">{{ $page.errors.name[0] }}</p>
                            <input v-model="form.dni" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="CÉDULA">
                            <p class="text-white text-left mt-5px mb-10px" v-if="$page.errors.dni">{{ $page.errors.dni[0] }}</p>
                            <input v-model="form.phone" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="TELÉFONO">
                            <p class="text-white text-left mt-5px mb-10px" v-if="$page.errors.phone">{{ $page.errors.phone[0] }}</p>
                            <input v-model="form.email" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="E-MAIL">
                            <p class="text-white text-left mt-5px mb-10px" v-if="$page.errors.email">{{ $page.errors.email[0] }}</p>
                            <input v-model="form.commercial_id" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="ID COMERCIAL">
                            <p class="text-white text-left mt-5px mb-10px" v-if="$page.errors.commercial_id">{{ $page.errors.commercial_id[0] }}</p>
                            <div class="relative">
                                <input v-model="form.username" class="form-control tracking-tighter w-full placeholder-primary mb-10px" type="text" placeholder="NOMBRE DE USUARIO">
                                <span v-show="!form.username.length" class="absolute text-gray-dark text-14px extra-placeholder tracking-tighter">Min 8 caracteres</span>
                            </div>
                            <p class="text-white text-left mt-5px mb-10px" v-if="$page.errors.username">{{ $page.errors.username[0] }}</p>

                            <div class="bavaria-custom-checkbox">
                                <input type="checkbox" name="remember" id="acceptTerms" v-model="form.acceptTerms">
                                <label for="acceptTerms">
                                    <div class="custom-checkbox-box">
                                        <img src="/img/icons/icon-check-white.svg" alt="" class="custom-checkbox-icon">
                                    </div>
                                    <p class="text-white text-18px leading-20px">Aceptar términos y condiciones</p>
                                </label>
                            </div>
                            <p class="text-white text-center mb-10px" v-if="$page.errors.acceptTerms">{{ $page.errors.acceptTerms[0] }}</p>

                            <div class="bavaria-custom-checkbox">
                                <input type="checkbox" name="remember" id="remember" v-model="form.remember">
                                <label for="remember">
                                    <div class="custom-checkbox-box">
                                        <img src="/img/icons/icon-check-white.svg" alt="" class="custom-checkbox-icon">
                                    </div>
                                    <p class="text-white text-18px leading-20px">Recordar mis datos</p>
                                </label>
                            </div>

                            <div class="px-15px pt-15px flex justify-center">
                                <div class="w-1/2 pr-15px">
                                    <button class="focus:outline-none block w-full rounded-10px bg-white font-bold text-xl text-primary uppercase py-3" type="submit">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="w-6/12 pt-50px pb-45px px-90px bg-white relative">
                    <img class="block w-6/12 mx-auto mb-25px" src="/img/logo-amigos-cerveceros.svg" alt="">
                    <h4 class="text-center text-primary uppercase text-20px leading-24px">Términos y condiciones</h4>
                    <div class="terms-box">
                        <p>Válida en Colombia</p>

                        <p>GENERALIDADES DE LA ACTIVIDAD</p>

                        <p>1.1 Antes de participar en la presente promoción denominada “Plataforma Amigos Cerveceros”, se deberá dar lectura íntegra a los siguientes términos y condiciones (las “Bases” o los “Términos y Condiciones”), entenderlos y aceptar cumplir totalmente con los mismos. La participación en la actividad se entiende como aceptación de los términos y condiciones.</p>

                        <p>1.2. Así mismo, el participante acepta haber leído y entendido el Aviso de Privacidad para el tratamiento de datos personales y autoriza el uso de sus datos para efectos de la promoción en los términos que más adelante se indica.</p>

                        <p>1.3. En términos generales la actividad consiste en participar en distintos momentos (fechas). durante la vigencia de la promoción, comprando empaques de las Marcas Participantes y enviando la foto de la factura vacíos por medio de Whatsapp al celular indicado a continuación para ganar recargas de celular:</p>

                        <p>Celular: xxxxxxxxxx</p>

                        <p>1.4. Para participar se requiere ser mayor de edad. Si usted es menor de edad, según las reglas del país correspondiente, absténgase de participar, pues será descalificado.</p>

                        <p>1.5.La participación en la actividad implica la decisión del participante de obligarse por estos Bases y por las decisiones que tome Bavaria , las cuales tendrán carácter definitivo en todos los asuntos relacionados con la actividad.</p>
                    </div>
                    <div class="text-center mt-8">
                        <a class="focus:outline-none inline-block rounded-10px bg-primary font-bold text-xl text-white uppercase px-5 py-3" href="#">
                            Descargar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";
import {TheMask} from 'vue-the-mask'
import moment from 'moment';

export default {
    components: {
        DefaultLayout,
        TheMask
    },
    data(){
        return {
            form: {
                name: '',
                dni: '',
                phone: '',
                email: '',
                commercial_id: '',
                username: '',
                acceptTerms: false,
                remember: false
            },
            day: '',
            month: '',
            year: ''
        }
    },
    computed: {
        birthday(){
            if (this.day.length && this.month.length && this.year.length){
                let day = this.day;
                let month = this.month;
                if (day.length === 1) day = '0' + day;
                if (month.length === 1) month = '0' + month;

                // let isValidDate =  moment(`${this.year}-${month}-${day}`, 'YYYY-MM-DD', true).isValid();

                return `${this.year}-${month}-${day}`;
            }

            return '';
        }
    },
    methods: {
        register(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                this.$inertia.post('/register', {...this.form, birthday: this.birthday})
            });
        }
    }
}
</script>

<style scoped lang="scss">
.register-page{
    background-image: url('/img/bg-register.jpg');
    background-size: cover;
    background-position: center;
}

.register-form-box{
    background: rgba(0, 0, 0, 0.4);
    border-radius: 10px;
    border: 1px solid #fff;
    padding: 30px;
}

.form-control{
    border-radius: 10px;
    display: block;
    font-size: 20px;
    line-height: 24px;
    padding: 5px 7px;

    &:focus{
        outline: none;
    }
}

.bavaria-custom-checkbox{
    display: inline-block;

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

.terms-box{
    width: calc(100% + 60px);
    padding-right: 60px;
    padding-top: 25px;
    height: 265px;
    overflow: auto;

    p{
        margin-bottom: 18px;
        font-size: 14px;
        line-height: 16px;
        @apply text-gray-dark;
    }
}

.extra-placeholder{
    left: 170px;
    bottom: 5px;
}
</style>
