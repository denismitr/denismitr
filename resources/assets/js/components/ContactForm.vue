<template>
    <div class="mx-auto max-w-md">
        <div v-if="success || sent" class="p-4 bg-green-dark text-white mb-4" v-text="successMessage"></div>
        <div v-if="error" class="p-4 bg-red text-white mb-4" v-text="errorMessage"></div>
        <div v-if="submitting" class="py-5">
            <LdsSpinner/>
        </div>
        <form v-if="!sent && !success && !submitting" @submit.prevent="onSubmit" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" v-text="text.name.label"></label>
                <input type="text" v-model="form.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                <div class="text-red p-2 text-sm" v-if="!$v.form.name.minLength">{{ nameError }}</div>
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" v-text="text.email.label"></label>
                <input type="text" v-model="form.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                <div class="text-red p-2 text-sm" v-if="!$v.form.email.email">{{ emailError }}</div>
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" v-text="text.body.label"></label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin" rows="14" v-model="form.body"></textarea>
            </div>
            <hr>
            <div class="mb-4">
                <button class="block w-full bg-red-dark hover:bg-red text-white uppercase text-lg mx-auto p-4 rounded">
                    {{ text.button }}
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    import LdsSpinner from './LdsSpinner';
    import { validationMixin } from 'vuelidate';
    import { required, minLength, email } from 'vuelidate/lib/validators'

    export default {
        name: "contact-form",

        components: { LdsSpinner },

        computed: {
            successMessage() {
                if (this.sent) {
                    return this.lang === 'ru' ? 'Сообщение уже отправлено' : 'Message already sent';
                }

                if (this.success) {
                    return this.lang === 'ru' ? 'Сообщение отправлено' : 'Message sent';
                }

                return '';
            },

            errorMessage() {
                if (this.error) {
                    return this.lang === 'ru' ? 'Ошибка! Некорректные данные.' : 'Error! Bad input.';
                }

                return '';
            },

            text () {
                return this.lang === 'ru' ? {
                    name: {
                        label: 'Ваше имя',
                        placeholder: 'Введите ваше имя'
                    },
                    email: {
                        label: 'Ваш адрес электронной почты',
                        placeholder: 'Ваш email'
                    },
                    body: {
                        label: 'Текст сообщения',
                        placeholder: 'Введите текст сообщения'
                    },
                    button: 'Отправить',
                } : {
                    name: {
                        label: 'Your name',
                        placeholder: 'Type your name'
                    },
                    email: {
                        label: 'Your email',
                        placeholder: 'Type your email'
                    },
                    body: {
                        label: 'Message',
                        placeholder: 'Type your messages'
                    },
                    button: 'Submit',
                };
            },

            nameError() {
                return this.lang === 'ru' ?
                    `Имя должно иметь не менее ${this.$v.form.name.$params.minLength.min} символов` :
                    `Name must contain no less than ${this.$v.form.name.$params.minLength.min} characters`;
            },

            emailError() {
                return this.lang === 'ru' ?
                    `Email имеет неверный формат` :
                    `Email must have a valid format`;
            },
        },

        created() {
            if (this.sent) this.submitting = false;
        },

        data: () => ({
            form: {
                name: '',
                email: '',
                body: '',
            },

            submitting: true,

            success: false,
            error: false,
        }),

        methods: {
            onSubmit() {
                this.$v.$touch();
                return console.log(this.$v);
                if (!this.submitting) {
                    this.submitting = true;

                    axios.post('/api/contacts', this.form).then(response => {
                        this.submitting = false;
                        this.success = true;
                        console.log(response);
                    }).catch(err => {
                        this.submitting = false;
                        this.success = false;
                        this.error = true;
                        console.log(err);
                    })
                }
            }
        },

        mixins: [validationMixin],

        mounted() {
            setTimeout(() => {
                this.submitting = false;
            }, 800);
        },

        props: {
            lang: {
                type: String,
                required: true,
            },

            sent: {
                type: Boolean,
                default: false,
            }
        },

        validations: {
            form: {
                name: { required, minLength: minLength(3) },
                email: { required, email },
                body: { required, minLength: minLength(8) },
            }
        }
    }
</script>

<style scoped>

</style>