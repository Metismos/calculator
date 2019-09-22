<template>
  <div id="app">
    <div class="container">
      <div class="calculator">
        <div class="answer">{{ answer }}</div>
        <div class="display">{{ logList + current }}</div>
        <div @click="clear" id="clear" class="btn operator">C</div>
        <div @click="and" id="and" class="btn operator">AND</div>
        <div @click="or"  id="or" class="btn operator">OR</div>
        <div @click="divide" id="divide" class="btn operator">/</div>
        <div @click="append('7')" id="n7" class="btn">7</div>
        <div @click="append('8')" id="n8" class="btn">8</div>
        <div @click="append('9')" id="n9" class="btn">9</div>
        <div @click="times" id="times" class="btn operator">*</div>
        <div @click="append('4')" id="n4" class="btn">4</div>
        <div @click="append('5')" id="n5" class="btn">5</div>
        <div @click="append('6')" id="n6" class="btn">6</div>
        <div @click="minus" id="minus" class="btn operator">-</div>
        <div @click="append('1')" id="n1" class="btn">1</div>
        <div @click="append('2')" id="n2" class="btn">2</div>
        <div @click="append('3')" id="n3" class="btn">3</div>
        <div @click="plus" id="plus" class="btn operator">+</div>
        <div @click="append('0')" id="n0" class="zero">0</div>
        <div @click="dot" id="dot" class="btn">.</div>
        <div @click="equal" id="equal" class="btn operator">=</div>
      </div>
    </div>
  </div>
</template>

<script>

import { calculate } from '@/services/api';

export default {
  name: "Calculator",
  props: {
    
  },
  data() {
    return {
      logList: "",
      current: "",
      answer: "",
      firstOperand: 0,
      secondOperand: 0,
      operatorClicked: true,
      operatorSet: false,
      operator: '',
      operationType: ''
    };
  },
  methods: {
    append(number) {

      if (this.answer != "") {
        return;
      }

      if (this.operatorClicked) {
        this.current = "";
        this.operatorClicked = false;
      }
      this.current = `${this.current}${number}`;
    },
    addtoLog(operator) {

      if (this.answer != "") {
        return;
      }

      if (this.operatorClicked == false) {
        this.logList += `${this.current} ${operator} `;

        if (!this.operatorSet) {
          this.firstOperand = this.current;
        }

        this.current = "";
        this.operatorSet = true;
        this.operatorClicked = true;
      }
    },
    clear() {
      this.current = "";
      this.answer = "";
      this.logList = "";
      this.firstOperand = 0;
      this.secondOperand = 0;
      this.operationType = "";
      this.operatorClicked = false;
      this.operatorSet = false;
    },
    dot() {
      if (this.current.indexOf(".") === -1) {
        this.append(".");
      }
    },
    divide() {
      this.addtoLog("/");
      this.operationType = 'Division';
    },
    times() {
      this.addtoLog("*");
      this.operationType = 'Multiplication';
    },
    minus() {
      this.addtoLog("-");
      this.operationType = 'Subtraction';
    },
    plus() {
      this.addtoLog("+");
      this.operationType = 'Addition';
    },
    and() {
      this.addtoLog("&");
      this.operationType = 'BitwiseAnd';
    },
    or() {
      this.addtoLog("|");
      this.operationType = 'BitwiseOr';
    },
    equal() {
      this.secondOperand = this.current;
      calculate({
        firstOperand : this.firstOperand,
        secondOperand : this.secondOperand,
        operationType : this.operationType
        }).then(data => {
        this.answer = data.toFixed(5);
      })
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Poppins:300,500&display=swap");

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

::selection {
  background: none;
}

body {
	background-color: #3fa9fc;
}

#app {
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100vh;
	width: 100vw;
}

.calculator {
	display: grid;
	grid-template-rows: repeat(7, minmax(60px, auto));
	grid-template-columns: repeat(4, 60px);
	grid-gap: 12px;
	padding: 35px;
	font-family: "Poppins";
	font-weight: 300;
  font-size: 18px;
	background-color: #ffffff;
	border-radius: 10px;
	box-shadow: 0px 3px 80px -30px rgba(13, 81, 134, 1);
}

.btn,
.zero {
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	outline: none;
	color: #484848;
	background-color: #f4faff;
	border-radius: 5px;
}

.display,
.answer {
	grid-column: 1 / 5;
	display: flex;
	align-items: center;
}

.display {
	color: #a3a3a3;
	border-bottom: 1px solid #e1e1e1;
	margin-bottom: 15px;
	overflow: hidden;
	text-overflow: clip;
}  

.answer {
	font-weight: 500;
	color: #146080;
	font-size: 55px;
	height: 65px;
}

.zero {
	grid-column: 1 / 3;
}

.operator {
	background-color: #d9efff;
	color: #3fa9fc;
}

</style>
