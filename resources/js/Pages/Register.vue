<template>
    <DefaultLayout>
        <div class="register-page">
            <div class="container flex flex-wrap px-15px lg:px-0">
                <div class="w-full lg:w-4/12 pt-50px pb-30px mx-auto">
                    <form class="text-center" action="#" @submit.prevent="register">
                        <p class="text-30px leading-30px mb-8px text-white uppercase tracking-tighter">Fecha de nacimiento</p>
                        <div class="mb-30px">
                            <div class="flex justify-center">
                                <the-mask mask="##" v-model="day" type="text" class="w-63px rounded-10px text-20px leading-24px py-5px placeholder-gray text-center focus:outline-none" placeholder="DÍA" />
                                <the-mask mask="##" v-model="month" type="text" class="mx-5px w-63px rounded-10px text-20px leading-24px py-5px placeholder-gray text-center focus:outline-none" placeholder="MES" />
                                <the-mask mask="####" v-model="year" type="text" class="w-75px rounded-10px text-20px leading-24px py-5px placeholder-gray text-center focus:outline-none" placeholder="AÑO" />
                            </div>
                            <p class="text-yellow-300 text-center mt-10px" v-if="$page.errors.birthday">{{ $page.errors.birthday[0] }}</p>
                        </div>

                        <div class="register-form-box">
                            <p class="font-bold text-32px leading-34px text-white uppercase">Regístrate ahora</p>
                            <p class="text-white uppercase text-20px leading-24px mb-25px tracking-tighter">INGRESA TUS DATOS PARA ACCEDER<br>A LA PLATAFORMA</p>

                            <the-mask :tokens="{'S': {pattern: /[a-zA-Z ]/}}" mask="SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS" v-model="form.name" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="NOMBRE" />
                            <p class="text-yellow-300 text-left mt-5px mb-10px" v-if="$page.errors.name">{{ $page.errors.name[0] }}</p>
                            <the-mask mask="##########" v-model="form.dni" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="CÉDULA" />
                            <p class="text-yellow-300 text-left mt-5px mb-10px" v-if="$page.errors.dni">{{ $page.errors.dni[0] }}</p>
                            <input v-model="form.phone" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="TELÉFONO">
                            <p class="text-yellow-300 text-left mt-5px mb-10px" v-if="$page.errors.phone">{{ $page.errors.phone[0] }}</p>
                            <input v-model="form.email" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="E-MAIL">
                            <p class="text-yellow-300 text-left mt-5px mb-10px" v-if="$page.errors.email">{{ $page.errors.email[0] }}</p>
                            <input v-model="form.commercial_id" class="form-control tracking-tighter w-full mb-5px placeholder-primary" type="text" placeholder="ID COMERCIAL">
                            <p class="text-yellow-300 text-left mt-5px mb-10px" v-if="$page.errors.commercial_id">{{ $page.errors.commercial_id[0] }}</p>
                            <div class="relative">
                                <input v-model="form.username" class="form-control tracking-tighter w-full placeholder-primary mb-10px" type="text" placeholder="NOMBRE DE USUARIO">
                                <span v-show="!form.username.length" class="absolute text-gray-dark text-14px extra-placeholder tracking-tighter">Min 8 caracteres</span>
                            </div>
                            <p class="text-yellow-300 text-left mt-5px mb-10px" v-if="$page.errors.username">{{ $page.errors.username[0] }}</p>

                            <div class="bavaria-custom-checkbox">
                                <input type="checkbox" name="remember" id="acceptTerms" v-model="form.acceptTerms">
                                <label for="acceptTerms">
                                    <div class="custom-checkbox-box">
                                        <img src="/img/icons/icon-check-white.svg" alt="" class="custom-checkbox-icon">
                                    </div>
                                    <p class="text-white text-18px leading-20px">Aceptar términos y condiciones</p>
                                </label>
                            </div>
                            <p class="text-yellow-300 text-center mb-10px" v-if="$page.errors.acceptTerms">{{ $page.errors.acceptTerms[0] }}</p>

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

                <div class="lg:w-6/12 pt-50px pb-45px px-30px md:px-90px bg-white relative -mx-15px lg:mx-0">
                    <img class="block w-6/12 mx-auto mb-25px" src="/img/logo-amigos-cerveceros.svg" alt="">
                    <h4 class="text-center text-primary uppercase text-20px leading-24px">Términos y condiciones</h4>
                    <div class="terms-box">
                        <p>Promoción – Amigo Cervecero</p>

                        <p>CUMPLIMIENTO PUBLICIDAD COMERCIAL CON INCENTIVOS – INFORMACIÓN AL CONSUMIDOR</p>

                        <p>I. IDENTIFICACIÓN DE LA MARCA O PRODUCTO</p>

                        <ul>
                            <li>
                                <p>Aplica para la categoría Cervezas de las marcas comercializadas por Kopps y Bavaria</p>
                            </li>
                        </ul>

                        <p>II. IDENTIFICACIÓN DEL INCENTIVO QUE SE OFRECE INDICANDO SU CANTIDAD Y CALIDAD</p>

                        <p>HASTA 4 CODIGOS PARA PARTICIPAR EN LA TRIVIA CERVECERA POR CUMPLIMIENTO DE LAS METAS DE VOLUMEN Y RETOS MAESTRÍA E INNOVACIÓN DEL MES)</p>

                        <p>III. ¿QUIEN PUEDE PARTICIPAR?</p>

                        <p>Representantes legales de clientes activos con Kopps o Bavaria en el marco del programa Amigo Cervecero</p>

                        <p>IV. MECÁNICA GENERAL DE LA ACTIVIDAD:</p>

                        <ul>
                            <li>
                                <p>Cumple con los volúmenes y mix de acuerdo a las metas del Dashboard del programa Amigo
                                    Cervecero, comunicado por tu representante Kopps, por este cumplimiento obtendrás 2 codigos
                                    para participar en la trivia virtual cervecera.</p>
                            </li>

                            <li>
                                <p>Si lograr cumplir con el volumen y dentro de tus compras lograste comprar al menos 3 cajas en
                                    las variedades doradas, roja y negra de Club Colombia, obtendrás un código adicional.</p>
                            </li>

                            <li>
                                <p>Durante el mes se comunicara un producto de Innovacion para fortalecer el portafolio, este será
                                    comunicado por el representante de Kopps , si compras 10 cajas de este producto/Marca,
                                    lograras un código mas</p>
                            </li>
                        </ul>

                        <p>V. SELECCIÓN DE GANADORES Y NOTIFICACIÓN</p>

                        <p>Cada participante del amigo cervecero tendrá códigos asignados según sus cumplimientos
                            del programa que serán redimibles en oportunidades para participar en la trivias virtuales por
                            premios, el participante con mayor cantidad de respuestas correctas en el menor tiempo
                            posible será el ganador del premio.</p>

                        <p>VI. ENTREGA DE PREMIOS</p>

                        <p>Los Premios serán entregados en el mes de a partir del 20 de enero hasta finales de Febrero a nombre
                            del representante legal del cliente participante según nuestro sistema</p>

                        <p>VII. VIGENCIA DE LA ACTIVIDAD</p>

                        <p>Los códigos podrán acumularse por cumplimientos desde el 1 de Julio hasta el 15 de Diciembre</p>

                        <p>VIII. CAUSALES DE EXCLUSIÓN:</p>

                        <p>Al aceptar estos términos y condiciones, el participante declara de manera expresa que su participación
                            en la actividad será de buena fe, que aprueba el uso de sus mensajes y su nombre por parte de
                            BAVARIA & CIA S.C.A. en cualquier comunicación que se realice antes, durante y después de la
                            actividad en mención.</p>

                        <p>Los participantes deberán abstenerse de realizar cualquiera de las acciones descritas a continuación:</p>

                        <ul>
                            <li>Realizar cualquier práctica abusiva, restrictiva, de acoso o amenaza en contra de los demás
                                participantes o terceros.</li>
                            <li>Publicar, transmitir, facilitar la publicación o transmisión de contenidos obscenos,
                                pornográficos, difamatorios, abusivos, ofensivos, profanos o que en forma alguna viole
                                derechos de terceros.</li>
                            <li>Publicar, transmitir, facilitar la publicación o transmisión de palabras soeces, groseras o que
                                puedan difamar o agredir otras poblaciones de nuestro país o sus gentes.</li>
                            <li>Publicar, transmitir, facilitar la publicación o transmisión de contenidos que involucren
                                menores de edad.</li>
                            <li>Utilizar la actividad o la plataforma empleada con fines ilegales.</li>
                            <li>Utilizar la actividad o la plataforma empleada para la obtención de datos o información de
                                terceros.</li>
                            <li>Crear o enviar correo electrónico no deseado (spam) o cualquier URL a otros participantes
                                o usuarios de las redes sociales Twitter o Facebook.</li>
                            <li>Interferir o intentar interferir con el funcionamiento adecuado del sitio de la actividad.</li>
                            <li>Violar leyes de cualquier jurisdicción.</li>
                            <li>Utilizar medios automatizados diferentes a los normalmente utilizados y ya autorizados, para
                                acceder al sitio de la actividad con el fin de defraudar la misma, obtener ventaja sobre otros
                                participantes o cualquier otro fin no legítimo.</li>
                            <li>Interferir o intentar interferir con el funcionamiento adecuado del sitio de la actividad.</li>
                        </ul>

                        <p>Serán excluidos de la participación en la actividad aquellos participantes que realicen cualquiera
                            de las actividades no permitidas y enunciadas anteriormente, o cuando existan reclamaciones de
                            terceros por violación de derechos de autor o propiedad intelectual al respecto de las publicaciones
                            realizadas por el participante.</p>

                        <p>IX. CONDICIONES Y RESTRICCIONES GENERALES</p>

                        <ul>
                            <li>Válido únicamente para mayores de edad, residentes en el territorio de la República de
                                Colombia.</li>

                            <li>Después de la fecha de cierre de la actividad, los sobres que sean depositados en los buzones
                                no serán tenidos en cuenta y no podrán participar en los sorteos</li>

                            <li>Las etiquetas deben venir por lo menos en un 80% completa. En todo caso, no se aceptan
                                fragmentos o retazos de las mismas.</li>

                            <li>Los concursantes deben tener todas las condiciones legales para viajar fuera del país, tener los
                                documentos al día (pasaporte vigente) y cumplir con todas las normas establecidas. En caso de
                                tratarse de ganadores extranjeros, éstos deberán por su cuenta gestionar todos los requisitos
                                que requieran para viajar (pasaporte, visa de ser el caso, y otros documentos que puedan ser
                                exigidos).</li>

                            <li>Los consumidores podrán depositar en los buzones todos los sobres que deseen durante la
                                vigencia de la activación. Entre más sobres, más oportunidades tendrán de ganar.</li>

                            <li>Una persona no podrá salir favorecida más de una vez en todos los sorteos de la actividad.</li>

                            <li>No pueden participar y no son elegibles como ganadores los empleados directos de BAVARIA
                                & CIA S.C.A./ABInBev y de sus sociedades filiales en Colombia, la Fundación Bavaria y los
                                empleados contratados a través de outsourcing para estas mismas compañías o entidades, y
                                en ambos casos, sus cónyuges o compañeras(os) permanentes, sus familiares directos hasta
                                el cuarto grado de consanguinidad, segundo grado de afinidad y único civil.</li>

                            <li>BAVARIA & CIA S.C.A. podrá descalificar a cualquier participante de manera unilateral y sin
                                necesidad de justificar su decisión, cuando considere que aquel ha incumplido la mecánica de
                                participación o que ha alterado y/o falsificado en forma alguna los materiales que hacen parte
                                de la actividad.</li>

                            <li>El premio será entregado únicamente al ganador o a quien éste transfiera el premio, previa
                                verificación del cumplimiento de la mecánica de la activación.</li>

                            <li>El ganador deberá exhibir su cédula de ciudadanía y firmar el acta de recibo del premio</li>

                            <li>Los premios no son canjeables total o parcialmente por dinero en efectivo, sin excepciones.</li>

                            <li>Los premios serán entregados en un plazo máximo cinco (5) días calendario, una vez BAVARIA
                                & CIA S.C.A. haya acordado las condiciones de entrega con el ganador.</li>

                            <li>Las fechas y horarios acordados para la entrega del premio no podrán ser modificados
                                posteriormente por el ganador: De hacerlo, éste deberá asumir los costos adicionales en que
                                incurra la sociedad BAVARIA & CIA S.C.A. por estos hechos.</li>

                            <li>BAVARIA & CIA S.C.A. no se hace responsable por la integridad física o por la propiedad de
                                los participantes o de los ganadores, cuando éstas resulten afectadas con ocasión de la
                                participación en el concurso o en relación con cualquier evento derivado del disfrute de los
                                premios aquí otorgados. Los concursantes reconocen y aceptan lo anterior y, por tanto, liberan
                                a BAVARIA & CIA S.C.A. de cualquier reclamación judicial o extrajudicial que pudiere derivarse
                                de tales hechos.</li>

                            <li>En caso de presentarse un ataque cibernético o indicios del mismo, la plataforma será
                                bloqueada y entrará en un periodo de mantenimiento, la restauración de los datos e información
                                se realizará desde el momento en el que entro en mantenimiento la plataforma, en este periodo
                                de tiempo todas las actividades de la aplicación quedaran suspendidas, por lo que no se
                                recolectará información.</li>

                            <li>Para mayor información sobre la promoción, condiciones y requisitos para la entrega de los
                                premios y cantidad de premios disponibles, ingresar a www.amigocerveceros.com. y revisar los
                                términos y condiciones o comunicarse en Bogotá al 275 5505 y en el resto del país al 018000-
                                526555.</li>
                        </ul>

                        <p>X. PROTECCIÓN DE DATOS PERSONALES</p>

                        <ul>
                            <li>El participante declara que la información suministrada por él, y por sus referidos, incluyendo
                                la relacionada con sus datos personales, es cierta, fidedigna y actualizada.</li>
                            <li>El participante declara y acepta el tratamiento y el uso de sus datos por parte de BAVARIA &
                                CIA S.C.A. conforme a las finalidades descritas en la política de tratamiento de datos
                                personales que rige la presente actividad.</li>
                            <li>En virtud de lo estipulado en la Ley 1581 de 2012, si el usuario desea darse de baja de esta
                                plataforma, solicitar alguna modificación, corrección, actualización o supresión de todos los
                                datos personales que nos ha proporcionado, dejar de recibir información comercial, así como
                                contactarse con nosotros por cualquier otra causa, puede enviar un correo
                                protecciondedatos@ab-inbev.com.</li>
                        </ul>

                        <p>XI. AUTORIZACIÓN DE REGISTRO, FIJACIÓN Y USO DE IMAGEN</p>

                        <ul>
                            <li>El participante declara que conoce a BAVARIA & CIA S.C.A., sus marcas y que los productos
                                que fabrica y/o distribuye son bebidas a base de malta, en especial cervezas.</li>
                            <li>El participante autoriza de manera gratuita e irrevocable a BAVARIA & CIA S.C.A. para que, de
                                forma directa o por intermedio de terceros, registre y fije en medios sonoros, fotográficos y/o
                                audiovisuales aspectos de su imagen, como la representación gráfica de su cara, cuerpo, silueta
                                o cualquier otro tipo de forma o aspecto, que le identifique bajo cualquier medio conocido o por
                                conocer, así como su voz, buen nombre, acreditación, fama, reconocimiento y demás
                                características asociadas al momento de la entrega del premio.</li>
                            <li>El participante autoriza para que BAVARIA & CIA S.C.A. posteriormente difunda las imágenes
                                fotográficas y/o audiovisuales tomadas o grabadas al momento de la entrega del premio y en
                                las que aparezca su imagen, a través de las redes sociales, tales como Facebook, Twitter e
                                Instagram, entre otras.</li>
                            <li>Tomando en cuenta que la difusión de las imágenes fotográficas y/o audiovisuales tomadas o
                                grabadas al momento de la entrega del premio se realizará a través de internet, la autorización
                                otorgada en este documento tiene efectos de manera ilimitada en el territorio nacional
                                colombiano y en el mundo.</li>
                            <li>BAVARIA & CIA S.C.A. podrá utilizar el material fotográfico y/o audiovisual tomado o grabado
                                al momento de la entrega del premio y en el que aparezca la imagen del participante, por el
                                término de dos (2) años desde la toma de las imágenes. No obstante lo anterior, BAVARIA &
                                CIA S.C.A. no se hace responsable de contenidos que queden en redes sociales y/o material
                                impreso que no esté bajo el control de BAVARIA & CIA S.C.A.</li>
                            <li>El participante renuncia expresamente a exigir cualquier tipo de compensación a BAVARIA &
                                CIA S.C.A., sus vinculadas o subsidiarias, por el uso que realicen del material fotográfico y/o
                                audiovisual tomado o grabado al momento de la entrega del premio, siempre y cuando dicho
                                uso se sujete a las condiciones acordadas en este documento.</li>
                            <li>El participante entiende y acepta que, en caso de resultar ganador de cualquier premio de la
                                Promoción como requisito indispensable para recibir el mismo, deberá suscribir el documento
                                de AUTORIZACIÓN DE REGISTRO, FIJACIÓN Y USO DE IMAGEN.</li>
                        </ul>

                        <p class="text-center mt-40px mb-40px">ANEXOS</p>
                    </div>
                    <div class="text-center mt-8">
                        <a class="focus:outline-none inline-block rounded-10px bg-primary font-bold text-xl text-white uppercase px-5 py-3" href="/terminos-y-condiciones-bavaria-amigos-cerveceros.pdf" target="_blank">
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
                this.$inertia.post('/register', {...this.form, name: this.form.name.trim(), birthday: this.birthday})
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

    p, li{
        margin-bottom: 18px;
        font-size: 14px;
        line-height: 16px;
        @apply text-gray-dark;
    }

    ul{
        list-style-type: disc;
        padding-left: 20px;
    }
}

.extra-placeholder{
    left: 170px;
    bottom: 5px;
}
</style>
