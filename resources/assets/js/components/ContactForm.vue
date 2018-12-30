<template>
    <div class="mx-auto max-w-md">
        <div v-if="success || sent" class="p-4 bg-green-dark text-white mb-4" v-text="successMessage"></div>
        <div v-if="error" class="p-4 bg-red text-white mb-4" v-text="errorMessage"></div>
        <div v-if="submitting" class="py-5">
            <LdsSpinner/>
        </div>
        <form v-if="!sent && !success && !submitting" @submit.prevent="onSubmit" class="bg-white border border-red-dark rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" v-text="text.name.label"></label>
                <input type="text" v-model="form.name" class="shadow-inner appearance-none border rounded w-full py-4 px-3 text-grey-darker leading-tight focus:outline-none focus:border-blue-dark">
                <div class="text-red p-2 text-sm" v-if="!$v.form.name.minLength">{{ text.name.error }}</div>
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" v-text="text.email.label"></label>
                <input type="text" v-model="form.email" class="shadow-inner appearance-none border rounded w-full py-4 px-3 text-grey-darker leading-tight focus:outline-none focus:border-blue-dark">
                <div class="text-red p-2 text-sm" v-if="!$v.form.email.email">{{ text.email.error }}</div>
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" v-text="text.body.label"></label>
                <textarea class="shadow-inner appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:border-blue-dark" rows="14" v-model="form.body"></textarea>
                <div class="text-red p-2 text-sm" v-if="!$v.form.body.minLength">{{ text.body.error }}</div>
            </div>
            <div v-if="equation.first && equation.second" class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2">{{ noRobotLabel }}</label>
                <input type="text" v-model="equation.answer" placeholder="Type your answer" class="shadow-inner appearance-none border rounded w-full py-4 px-3 text-grey-darker leading-tight focus:outline-none focus:border-blue-dark" name="age" required>
                <div class="text-primary p-2">{{ noRobotQuestion }}</div>
                <div class="text-red p-2 text-sm" v-if="equation.lastError">{{ noRobotIncorrect }}</div>
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
    import { required, minLength, email } from 'vuelidate/lib/validators';
    import FormSecurityMath from './../services/FormSecurityMath';

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

            noRobotLabel() {
                return this.lang === 'ru' ? 'Я не робот' : "I'm no robot";
            },

            noRobotQuestion() {
                if (!this.equation) {
                    console.error("Equation has not been initialized.");
                    return '';
                }

                return this.lang === 'ru' ?
                    `Решите задачку: ${this.equation.first} ${this.equation.operand} ${this.equation.second} = ?. Можете взять калькулятор.` :
                    `Solve an equation: ${this.equation.first} ${this.equation.operand} ${this.equation.second} = ?. You can use a calculator`;
            },

            noRobotIncorrect() {
                return this.lang === 'ru' ? 'Неправильно!' : 'Incorrect!';
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
                        placeholder: 'Введите ваше имя',
                        error: `Имя должно иметь не менее ${this.$v.form.name.$params.minLength.min} символов`,
                    },
                    email: {
                        label: 'Ваш адрес электронной почты',
                        placeholder: 'Ваш email',
                        error: 'Email имеет неверный формат',
                    },
                    body: {
                        label: 'Текст сообщения',
                        placeholder: 'Введите текст сообщения',
                        error: `Сообщение должно иметь не менее ${this.$v.form.body.$params.minLength.min} символов`,
                    },
                    button: 'Отправить',
                } : {
                    name: {
                        label: 'Your name',
                        placeholder: 'Type your name',
                        error: `Name must contain no less than ${this.$v.form.name.$params.minLength.min} characters`,
                    },
                    email: {
                        label: 'Your email',
                        placeholder: 'Type your email',
                        error: `Email must have a valid format`,
                    },
                    body: {
                        label: 'Message',
                        placeholder: 'Type your messages',
                        error: `Body must contain no less than ${this.$v.form.body.$params.minLength.min} characters`,
                    },
                    button: 'Submit',
                };
            },
        },

        created() {
            if (this.sent) this.submitting = false;

            this.mathService = new FormSecurityMath(10, 50);
        },

        data: () => ({
            form: {
                name: '',
                email: '',
                body: '',
            },

            equation: {
                first: null,
                second: null,
                answer: '',
                correct: null,
                lastError: false,
            },

            mathService: null,

            submitting: true,

            success: false,
            error: false,
        }),

        methods: {
            validateInput() {
                this.$v.$touch();
                this.error = this.$v.$invalid;
            },

            onSubmit() {
                this.validateInput();

                if (!this.submitting && !this.error) {
                    this.equationCheck();

                    if (this.equation.correct) {
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
                        });
                    }
                }
            },

            createEquation() {
                const {first, second, operand, answer, correct } =  this.mathService.createEquation();

                this.equation.first = first;
                this.equation.second = second;
                this.equation.operand = operand;
                this.equation.answer = answer;
                this.equation.correct = correct;
            },

            equationCheck() {
                if (this.equation.first === null) {
                    this.createEquation();
                    return;
                }

                if (this.equation.correct !== true) {
                    this.equation.correct = this.mathService.validate(this.equation);

                    if (!this.equation.correct) {
                        console.error("Invalid answer:", this.equation.answer);
                        this.equation.lastError = true;
                        this.createEquation();
                    }
                }
            },
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