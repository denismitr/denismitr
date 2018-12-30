class FormSecurityMath {
    constructor(min = 1, max = 1000, operands = null) {
        this.min = Math.ceil(min);
        this.max = Math.floor(max);
        this.operands = operands || ['+', '*', '-'];

        if (this.min > this.max) {
            throw new Error(`Min number [${this.min}] must be less than max [${this.max}]`);
        }
    }

    createEquation() {
        const operand = this._randomOperand();
        const first = Math.round(this._randomFirst());
        const second = Math.round(this._randomSecond(first));

        return { operand, first, second, answer: '', correct: null };
    }

    validate(equation) {
        if (!equation.first || !equation.second || !equation.operand || !equation.answer) {
            console.error('Incomplete equation passed', equation);
        }

        const { first, second, operand, answer } = equation;

        const correctAnswer = this._getCorrectAnswer(first, second, operand);

        return correctAnswer === parseInt(answer);
    }

    _getCorrectAnswer(first, second, operand) {
        switch (operand) {
            case '+':
                return first + second;
            case '-':
                return first - second;
            case '*':
                return first * second;
            default:
                throw new Error(`Operand ${operand} is not supported.`);
        }
    }

    _randomOperand() {
        return this.operands[Math.floor(Math.random() * this.operands.length)];
    }

    _randomFirst() {
        return Math.random() * (this.max - this.min + 1) + this.min;
    }

    _randomSecond(actualFirst) {
        return Math.random() * (actualFirst - this.min + 1) + this.min;
    }
};

export default FormSecurityMath;